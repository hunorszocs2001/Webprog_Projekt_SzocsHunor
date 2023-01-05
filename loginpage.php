<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/loginpage.css">
</head>
<body>
<div class="bg-img">
    <div class="content">
        <header>Login Form</header>
        <form action="loginpage.php" method="POST">
            <div class="container">

                <div id="status">
                    <p></p>
                </div>
                <div class="inputs">
                    <div class="email-input">
                        <input name="email" type="text" required placeholder="Email">
                    </div>
                    <div class="password-input">
                        <input name="password" type="password" required placeholder="Password">
                    </div>
                </div>
                <div class="field">
                    <input name="submit" type="submit" value="LOGIN">
                </div>

            </div>
        </form>

        <div class="signup">
            Don't have account?
            <a href="registrationpage.php">Signup Now</a>
        </div>
    </div>
</div>
<?php
if (isset($_POST['submit'])) {
    include('DBhandler.php');
    $dbh = new DBhandler();
    $password = $_POST['password'];
    $email = $_POST['email'];

    if ($dbh->login($email, $password)) {
        $id = $dbh->getID($email, $password);
        echo $id;
        session_start();
        $_SESSION['userID'] = $id;
        header("Location: assets/account/mainpage.php");
        exit();
    } else {
        echo "
            <script>
            document.getElementById('status').style.color='red'
            document.getElementById('status').style.fontSize='15px'
            document.getElementById('status').innerHTML='Wrong password or email!'

            </script>
        ";
        die();
    }


}
?>
</body>

</html>
