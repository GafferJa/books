<?php
session_start();
require_once "../connection.php";
if (isset($_POST['user']) || $_SESSION['is_login'] != true) {
    header("location: ../login.php");
    exit();
}
$loginuser = $_SESSION['user'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
</head>

<body>
    <div class="container">
        <div class="row mt-2 mb-4">
            <div class="col-md-4">
                <h1>Dashboard</h1>
            </div>
            <div class="col-md-8">
                <h1 class="float-end">Welcome: <?= $loginuser['name'] ?>
                    <a href="../login.php" class="btn btn-danger">Logout</a>
                </h1>
            </div>
            <div class="col-md-12">
                <a href="users.php">Show users</a> &ensp;&ensp;
                <a href="../category.php">Manage Category</a> &ensp;&ensp;
                <a href="addbook.php">Add Book</a> &ensp;&ensp;
                <a href="showbook.php">Show Books</a> &ensp;&ensp;
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">