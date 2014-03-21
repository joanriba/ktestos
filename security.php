<?php
session_start();
if(!isset($_SESSION['s_email'])){
header("Location: /");
} ?>