<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/mainpage.css">
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
<div class="list">
    <?php
    $dbh->getdocuments($id);
    ?>
</div>


</body>
</html>
