<?
include_once 'config.php';
header("Content-Type: text/html; charset=UTF-8");
$name = htmlentities($_POST['contactName']);
$message = htmlentities($_POST['message']);
$serverName = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$subject = htmlentities($_POST['subject']);
$emailTo = htmlentities($_POST['contactEmail']);
$phone = htmlentities($_POST['contactPhone']);

$errorArray = array();

if(!validName($name)){
    $errorArray['contactName'] = "Неправильно введено имя";
}

if(!validEmail($emailTo)){
    $errorArray['contactEmail'] = "Неправильно введен email";
}

if(!validPhone($phone)){
    $errorArray['contactPhone'] = "Неправильно введен телефон";
}

$dateOpenForm = htmlentities($_POST['dateOpenForm']);
$dateOpenFormClass = new DateTime($dateOpenForm);
$dateSendForm = date('Y-m-d H:i:s');
$dateSendFormClass = new DateTime($dateSendForm);
$diffDate = $dateOpenFormClass->diff($dateSendFormClass);

if (mail($emailTo, "Вам пришло письмо с сайта $serverName",
    "Ваше имя: $name
    \nТема: $subject
    \nВаше сообщение: $message
    \nВремя открытия формы: $dateOpenForm
    \nВремя отправки данных с формы: $dateSendForm
    \nВремя заполения формы: " . $diffDate->format("%H:%I:%S"),
    "From: $emailFrom \r\n")) {
}
else {
    $errorArray['error'] = 'Письмо не удалось отправить, повторите попытку';
}

if(empty($errorArray)){
    echo json_encode(array('result' => 'success'));
}else{
    echo json_encode(array('result' => 'error', 'fieldError' => $errorArray));
}

$dsn = "mysql:host=$db_host;port=$db_port;dbname=$db_base;charset=$charset;";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

$pdo = new PDO($dsn, $db_user, $db_password, $opt);

$stmt = $pdo->prepare('INSERT INTO contacts (name, email, subject, message, date_open_form, date_send_form, diff_date) 
                      VALUES (?, ?, ?, ? ,? ,? ,?)');
$stmt->execute(array($name, $emailTo, $subject, $message, $dateOpenForm,
    $dateSendForm, $diffDate->format("%H:%I:%S")));

$stmt = $pdo->query('SELECT * FROM contacts');

/*while ($row = $stmt->fetch())
{
    echo $row["id"] . ' 
' . $row["name"] . ' 
' . $row["email"] . ' 
' . $row["subject"] . ' 
' . $row["message"] . ' 
' . $row["date_open_form"] . ' 
' . $row["date_send_form"] . ' 
' . $row["diff_date"] . ' <br />';
}*/

function validEmail($str) {
    return (!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $str)) ? FALSE : TRUE;
}

function validName($str) {
    return (!preg_match("([А-ЯЁ]{1}[а-яё]{1,29}|[A-Z]{1}[a-z]{1,29})", $str)) ? FALSE : TRUE;
}

function validPhone($str) {
    return (!preg_match("/^\+?[78][-\(]?\d{3}\)?-?\d{3}-?\d{2}-?\d{2}$/", $str)) ? FALSE : TRUE;
}
?>