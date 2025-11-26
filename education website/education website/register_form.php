<?php
@include 'config.php'; 

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);

   
    $select = "SELECT * FROM user_form WHERE email='$email' && password='$pass'";
    $result = mysqli_query($conn, $select);
    if(mysqli_num_rows($result)>0){
        $error[]='user already exist!';
    }else{
        if($pass!=$cpass){
            $error[] = 'password not matched!';
        }else{
            $insert= "INSERT INTO user_form(name, email, password) VALUES('$name', '$email','$pass')";
            mysqli_query($conn, $insert);
            header('location:registrationn_success.php'); 
        }
    }
   
};
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="form-container">
        <form action="" method="post" id="register-form">
            <h3>Register now</h3>
            <?php
         
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' .$error. '</span>';
                };
            };
            ?>
            <input type="text" name="name" required placeholder="Enter your name"><br><br>
            <input type="email" name="email" required placeholder="Enter your email"><br><br>
            <input type="password" name="password" required placeholder="Enter your password"><br><br>
            <input type="password" name="cpassword" required placeholder="Confirm your password"><br>
            <input type="submit" name="submit" value="Register now" class="form-btn">
            <p>Already have an account? <a href="login_form.php">Login now</a></p>
        </form>
    </div>
</body>
</html>
