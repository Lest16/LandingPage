<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <title>Bazinger</title>

    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/js/slick/slick.css"/>
    <link rel="stylesheet" type="text/css" href="assets/js/slick/slick-theme.css"/>
    <link rel="stylesheet" href="assets/js/dist/jquery.fancybox.css" type="text/css" media="screen" />
    <link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
<header class="site-header">
    <div class="container flex-container">
        <div class="site-header__logo">
            <a href="#"><img src="assets/img/logo.png" alt=""/></a>
        </div>
        <nav class="site-header__menu main-menu">
            <ul>
                <li><a href="index.php?page=home">Home</a></li>
                <li><a href="index.php?page=features">Features</a></li>
                <li><a href="index.php?page=gallery">Gallery</a></li>
                <li><a href="index.php?page=video">Video</a></li>
                <li><a href="index.php?page=prices">Prices</a></li>
                <li><a href="index.php?page=testimonials">Testimonials</a></li>
                <li><a href="index.php?page=download">Download</a></li>
                <li><a href="index.php?page=contact">Contact</a></li>

            </ul>
        </nav>
    </div>
</header>

<div class="home-first-screen">
    <div class="container">
        <div class="home-first-screen-content">
            <!--FIXME: Начало слайда -->
            <div class="slick-container slick-home">
                <div>
                    <div class="div-derma">
                        <div class="content-text">
                            <span class="content-head">Simple, Beautiful <span class="content-head__bold">and Amazing</span></span>
                            <span class="content-description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eget nunc vitae tellus luctus
                            ullamcorper. Nam porttitor ullamcorper felis at convallis. Aenean ornare vestibulum nisi
                            fringilla lacinia. Nullam pulvinar sollicitudin velit id laoreet. Quisque non rhoncus sem.</span>
                        </div>
                        <div class="home-first-screen-button">
                            <a class="btn-download" href="#">
                                <!-- FIXME: убрать тег button -->
                                <span>Download</span>
                            </a>
                            <a class="btn-learn-more" href="#">
                                <!-- FIXME: убрать тег button -->
                                <span>Learn More</span>
                            </a>
                        </div>
                        <div class="home-content-available">
                            <span>Available on :</span>

                            <!-- FIXME: сделать ссылками -->
                            <a href="#" class="mobile-icon"><img src="assets/img/apple.png"></a>
                            <a href="#" class="mobile-icon"><img src="assets/img/android.png"></a>
                        </div>
                    </div>

                </div>
                <div>
                    <div class="div-derma">
                        <div class="content-text">

                            <span class="content-head">Simple, Beautiful <span class="content-head__bold">and Amazing</span></span>
                            <span class="content-description">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc eget nunc vitae tellus luctus
                            ullamcorper. Nam porttitor ullamcorper felis at convallis. Aenean ornare vestibulum nisi
                            fringilla lacinia. Nullam pulvinar sollicitudin velit id laoreet. Quisque non rhoncus sem.</span>
                        </div>
                        <div class="home-first-screen-button">
                            <a class="btn-download" href="#">
                                <!-- FIXME: убрать тег button -->
                                <span>Download</span>
                            </a>
                            <a class="btn-learn-more" href="#">
                                <!-- FIXME: убрать тег button -->
                                <span>Learn More</span>
                            </a>
                        </div>
                        <div class="home-content-available">
                            <span>Available on :</span>

                            <!-- FIXME: сделать ссылками -->
                            <a href="#" class="mobile-icon"><img src="assets/img/apple.png"></a>
                            <a href="#" class="mobile-icon"><img src="assets/img/android.png"></a>
                        </div>
                    </div>

                </div>
            </div>
            <!--FIXME: конец слайда -->
        </div>
    </div>

</div>

<?php
include_once 'pdoConnector.php';

if ($_GET['page'] == 'features') {
    //include_once 'pages/features.php';
    $stmt = $pdo->prepare('SELECT * FROM pages where name = ?');
    $stmt->execute(array("features"));
    foreach ($stmt as $row)
    {
        echo $row['content'];
    }

} else if ($_GET['page'] == 'gallery') {
    //include_once 'pages/gallery.php';
    $stmt = $pdo->prepare('SELECT * FROM pages where name = ?');
    $stmt->execute(array("gallery"));
    foreach ($stmt as $row)
    {
        echo $row['content'];
    }

} else if ($_GET['page'] == 'video') {
    //include_once 'pages/video.php';
    $stmt = $pdo->prepare('SELECT * FROM pages where name = ?');
    $stmt->execute(array("video"));
    foreach ($stmt as $row)
    {
        echo $row['content'];
    }

} else if ($_GET['page'] == 'prices') {
    //include_once 'pages/prices.php';
    $stmt = $pdo->prepare('SELECT * FROM pages where name = ?');
    $stmt->execute(array("prices"));
    foreach ($stmt as $row)
    {
        echo $row['content'];
    }

} else if ($_GET['page'] == 'testimonials') {
    //include_once 'pages/testimonials.php';
    $stmt = $pdo->prepare('SELECT * FROM pages where name = ?');
    $stmt->execute(array("testimonials"));
    foreach ($stmt as $row)
    {
        echo $row['content'];
    }

} else if ($_GET['page'] == 'download') {
    //include_once 'pages/download.php';
    $stmt = $pdo->prepare('SELECT * FROM pages where name = ?');
    $stmt->execute(array("download"));
    foreach ($stmt as $row)
    {
        echo $row['content'];
    }

} else if($_GET['page'] == 'contact'){
    //include_once 'pages/contact.php';
    $stmt = $pdo->prepare('SELECT * FROM pages where name = ?');
    $stmt->execute(array("contact"));
    foreach ($stmt as $row)
    {
        echo $row['content'];
    }
} else{
    include_once 'pages/home.php';
}
?>

<footer class="footer">
    <div class="container">
        <div class="footer-content">
            <span>Copyright &#169 2013 |BAZINGER| All Rights Reserved</span>
            <!-- FIXME: сделать ссылками "Terms of Service|policy"-->
            <a href="#"> <span>Terms of Service|policy</span> </a>
        </div>
    </div>
</footer>

<script src="assets/js/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="assets/js/slick/slick.min.js"></script>
<script type="text/javascript" src="assets/js/dist/jquery.fancybox.js"></script>
<script src="//api-maps.yandex.ru/2.1/?lang=ru_RU" type="text/javascript"></script>
<script src="assets/js/scripts.js"></script>
</body>
</html>