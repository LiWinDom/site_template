<?php
$insertBefore = $insertBefore ?? "";
$insertAfter = $insertAfter ?? "";

// Некоторые важные переменные
require_once "config.php";
$title = isset($data["_title"]) ? $data["_title"] . " | " . _siteName : _siteName;
$theme = $_COOKIE["theme"] ?? _defaultTheme;
?>
 
<!--Всё здесь работает на честном слове... Если увидишь что-то странное - это нужно-->
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <script defer src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
    <script defer src="/js/navbar_hide.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/fontawesome/css/all.min.css">
    <link rel="stylesheet" href="/css/themes/main.css">
    <link rel="stylesheet" href="/css/themes/<?= $theme; ?>.css">
    <!-- Some info -->
    <title><?= $title; ?></title>
    <link rel="icon" href="/images/logo.png">
    <!-- Metas -->
    <meta name="application-name" content="<?= _siteName ?>">
    <meta name="author" content="LiWinDom">
    <meta name="description" content="">
    <meta name="keywords" content="<?= _siteName ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
</head>
<body>
	<?php
    echo $insertBefore;
    require 'application/views/' . $content_view;
    echo $insertAfter;
    ?>
</body>
</html>