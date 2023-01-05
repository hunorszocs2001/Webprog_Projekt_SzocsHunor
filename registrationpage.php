<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/css/registrationpage.css">
</head>

<body>


<div class="bg-img">
    <div class="content">
        <header>Registration Form</header>
        <form action="registrationpage.php" method="POST">
            <div class="container">

                <div id="status">
                    <p> </p>
                </div>
                <div class="fname-input">
                    <input name="firstname" type="text" placeholder="First Name">
                </div>
                <div class="lname-input">
                    <input name="lastname" type="text" placeholder="Last Name">
                </div>

                <div class="email-input">
                    <input name="email" type="text" required placeholder="Email">
                </div>
                <div class="password-input">
                    <input name="password" type="password" required placeholder="Password">
                </div>
                <div class="cpassword-input">
                    <input name="confirm_pass"type="password" required placeholder="Confirm Password">
                </div>

                <div class="field">
                    <input name="submit" type="submit" value="REGISTER">
                </div>

            </div>
        </form>

        <div class="signup">
            Already have an account?
            <a href="loginpage.php">Login Now</a>
        </div>
    </div>
</div>

<?php
include('DBhandler.php');
$server=new DBhandler();
if(isset($_POST['submit'])){
    $msg;
    $dbh = new PDO("mysql:host=localhost;dbname=webprojekt","root","");
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $name=$firstname ." ". $lastname;
    $email=$_POST['email'];
    $password=$_POST['password'];
    $confirm_pass=$_POST['confirm_pass'];



    $number = preg_match('@[0-9]@', $password);
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $specialChars = preg_match('@[^\w]@', $password);

    function checkEmail($email) {
        $dbh = new PDO("mysql:host=localhost;dbname=webprojekt","root","");
        $stmt = $dbh->prepare("SELECT * from user WHERE email='$email'");
        $stmt -> execute();
        $count = $stmt -> rowCount();

        if ($count==0)
            return true;
        else
            return false;
    }


    if (empty($firstname) ||
        empty($lastname) ||
        empty($email) ||
        empty($password) ||
        empty($confirm_pass)){
        echo "
        <script>document.getElementById('status').innerHTML='All fields required'</script>
        ";
        die();
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "
            <script>document.getElementById('status').innerHTML='Valid email required'</script>
        ";
        die();
    }

    if(!checkEmail($email)){
        echo "
        <script>document.getElementById('status').innerHTML='Email already used'</script>
        ";
        die();
    }

    if(strlen($password) < 8 || !$number || !$uppercase || !$lowercase || !$specialChars) {
        echo "
            
            <script>
            document.getElementById('status').style.fontSize='15px'
            document.getElementById('status').innerHTML='Password must be at least 8 characters in length and must contain at least one number, one upper case letter, one lower case letter and one special character.'</script>
        ";
        die();
    }

    if($password!=$confirm_pass){
        echo "
        <script>
        document.getElementById('status').innerHTML='Confirm password dont match'

        </script>
        ";
        die();
    }

    echo "
            
            <script>
            document.getElementById('status').style.color='green'
            document.getElementById('status').innerHTML='Succes'</script>
        ";
    $server->register($password,$email,$name);




}
?>

</body>

</html>