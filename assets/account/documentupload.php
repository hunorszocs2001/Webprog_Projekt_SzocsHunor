<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/documentupload.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<body>
<?php
include("../../DBhandler.php");
$dbh = new DBhandler();
session_start();
$id = $_SESSION['userID'];
?>


<header class="flex-navbar">
    <h1 class="title">Document registry</h1>
    <ul class="items items-right">
        <li class="item" id="doc"><a href="mainpage.php">MY DOCUMENTS</a></li>
        <li class="item" id="add"><a href="documentupload.php">ADD</a></li>
        <li class="item" id="logout"><a href="../../loginpage.php">LOG OUT</a></li>

    </ul>
</header>

<div id="form" class="form">
    <form method="POST" enctype="multipart/form-data" action="documentupload.php">
        <div class="input">
            <h1>Add document</h1>

        </div>
        <label class="drop-container">
            <span class="drop-title">Drop files here</span>

            <div>
                <input type="file" name="file" accept=".pdf" class="document-insert" >
            </div>
            <div>
                <input type="submit" name="submit" value="Upload file" class=submit>
            </div>
        </label>
    </form>
</div>
<?php

if (isset($_POST["submit"])) {
    $targer_dir = "uploads/" . $id . "/";
    $filename = basename($_FILES["file"]["name"]);
    $file_type = $_FILES["file"]["type"];
    date_default_timezone_set('Europe/Bucharest');
    $date = getdate();
    $today = date("Y.m.d - H:i:s");
    $targetFilePath = $targer_dir . $filename;
    create_dir($id);

    if (!file_exists("uploads/" . $id)) {
        mkdir("uploads/" . $id);
    }
    if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {


        $dbh->documentinsert($filename, $file_type, $today, $id);
    }
}

function create_dir($id)
{
    if (!file_exists("uploads/" . $id . "/")) {
        mkdir("uploads/" . $id . "/");
    }
}

?>
</body>
</html>