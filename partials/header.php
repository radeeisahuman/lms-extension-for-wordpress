<?php
include_once 'config.php';
session_start();
$db = Database::getInstance()->getConnection();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Learn</title>
</head>
<body>