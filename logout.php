<?php
session_start();
$_SESSION['Logged'] = false;
header("Location: index.html");
