<?php
$insertBefore = $insertBefore ?? "";
$insertAfter = $insertAfter ?? "";

// Getting current active page
$active = explode("/", $_SERVER["REQUEST_URI"])[1];
if ($active == "") {
    $active = "home";
}

// Некоторые важные переменные
require_once "config.php";
$theme = $_COOKIE["theme"] ?? _defaultTheme;

$start = '
    <nav class="navbar navbar-expand-lg navbar-' . ($theme == "light_monochrome" ? "light" : "dark") . ' menubar fixed-top" style="z-index: 10">
        <a class="navbar-brand" href="/" style="padding: 0; font-weight: 600">
            <img src="/images/' . ($theme == "light_monochrome" ? "logoDark.png" : "logoLight.png") . '" style="max-height: 40px">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">';
$right = '  </ul>
            <ul class="nav navbar-nav ml-auto">';
$theme = '      <li class="nav-item dropdown ' . ($active == "theme" ? "active" : "") . '">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-palette" aria-hidden="true"></i> Тема
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                            <a class="dropdown-item" href="/theme/dark">Фиолетовая</a>
                            <a class="dropdown-item" href="/theme/dark_monochrome">Тёмная</a>
                            <a class="dropdown-item" href="/theme/light">Навести суету</a>
                            <a class="dropdown-item" href="/theme/light_monochrome">Светлая</a>
                        </div>
                    </li> ';
$end = '    </ul>
        </div>
    </nav>';

$footer = '<div style="margin: 1rem; text-align: center; font-size: small;">Версия сайта: ' . _siteVersion . '</div>';

$insertBefore = $start . $right . $theme . $end . $insertBefore;
$insertAfter = $insertAfter . $footer;
require "application/views/view_template_header.php";
