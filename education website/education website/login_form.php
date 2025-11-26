<?php
@include 'config.php'; 

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);

   
    $select = "SELECT * FROM user_form WHERE email='$email' && password='$pass'";
    $result = mysqli_query($conn, $select);
    if (mysqli_num_rows($result) > 0) {
    
        header('Location: http://localhost:3000');
        exit();
    } else {
        
        $error[] = 'Invalid email or password!';
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
            <h3>Login now</h3>
            <?php
         
            if (isset($error)) {
                foreach ($error as $error) {
                    echo '<span class="error-msg">' .$error. '</span>';
                };
            };
            ?>
            <input type="email" name="email" required placeholder="Enter your email"><br><br>
            <input type="password" name="password" required placeholder="Enter your password"><br><br>
            <input type="submit" name="submit" value="Login now" class="form-btn">
            <p>Don't have an account? <a href="login_form.php">Register now</a></p>
        </form>
    </div>
</body>
</html>
