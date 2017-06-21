<?php 
require './admin/config.php';
if (!isset($_SESSION))
{
session_start();

}

include './templates/header.php';
include 'menu.php';
include 'main.php';
include './templates/foot.php';