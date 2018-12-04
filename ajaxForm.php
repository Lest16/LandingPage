<?
include_once 'config.php';
include_once 'pdoConnector.php';
include_once 'mailer.php';
header("Content-Type: text/html; charset=UTF-8");
$name = htmlentities($_POST['contactName']);
$message = htmlentities($_POST['message']);
$serverName = $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
$subject = htmlentities($_POST['subject']);
$emailTo = htmlentities($_POST['contactEmail']);
$phone = htmlentities($_POST['contactPhone']);

$errorArray = array();

if(!validField($name, "([А-ЯЁ]{1}[а-яё]{1,29}|[A-Z]{1}[a-z]{1,29})")){
    $errorArray['contactName'] = "Неправильно введено имя";
}

if(!validField($emailTo, "/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix")){
    $errorArray['contactEmail'] = "Неправильно введен email";
}

if(!validField($phone, "/^\+?[78][-\(]?\d{3}\)?-?\d{3}-?\d{2}-?\d{2}$/")){
    $errorArray['contactPhone'] = "Неправильно введен телефон";
}

$dateOpenForm = htmlentities($_POST['dateOpenForm']);
$dateOpenFormClass = new DateTime($dateOpenForm);
$dateSendForm = date('Y-m-d H:i:s');
$dateSendFormClass = new DateTime($dateSendForm);
$diffDate = $dateOpenFormClass->diff($dateSendFormClass);
$diffDateFormat = $diffDate->format("%H:%I:%S");

if(empty($errorArray)){
    /*
    mail($emailTo, "Вам пришло письмо с сайта $serverName",
        "Ваше имя: $name
    \nТема: $subject
    \nВаше сообщение: $message
    \nВремя открытия формы: $dateOpenForm
    \nВремя отправки данных с формы: $dateSendForm
    \nВремя заполения формы: " . $diffDateFormat,
        "From: $emailFrom \r\n");*/
    Mailer()->init($config);

    $messageText = "Ваше имя: $name
    <br>Тема: $subject
    <br>Ваше сообщение: $message
    <br>Ваш телефон: $phone
    <br>Время открытия формы: $dateOpenForm
    <br>Время отправки данных с формы: $dateSendForm
    <br>Время заполения формы: " . $diffDateFormat;
    $messageMailer = Mailer()->newHtmlMessage();
    $messageMailer->setSubject("Вам пришло письмо с сайта $serverName");
    $messageMailer->setSenderEmail($emailFrom);
    $messageMailer->addRecipient($emailTo);
    $messageMailer->addContent($messageText);
    Mailer()->sendMessage($messageMailer);
    echo json_encode(array('result' => 'success'));

}else{
    echo json_encode(array('result' => 'error', 'fieldError' => $errorArray));
}

$stmt = $pdo->prepare('INSERT INTO contacts (name, email, phone, subject, message, date_open_form, date_send_form, diff_date) 
                      VALUES (?, ?, ?, ?, ? ,? ,? ,?)');
$stmt->execute(array($name, $emailTo, $phone, $subject, $message, $dateOpenForm,
    $dateSendForm, $diffDateFormat));

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

function validField($field, $regex) {
    return (!preg_match($regex, $field)) ? FALSE : TRUE;
}
?>