<?php

require("vendor/autoload.php");
$loader = new \Twig\Loader\FileSystemLoader("./templates");
$twig = new \Twig\Environment($loader);
