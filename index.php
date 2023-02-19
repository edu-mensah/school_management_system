<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="system/images/icons/logo.png" type="image/x-icon">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IPC porptal | Login</title>
    <!-- custom css -->
    <link rel="stylesheet" href="system/css/index.css?v=<?= time();?>">
    <!-- fontawesome -->
    <link rel="stylesheet" href="/system/fontawesome/css/all.css">
</head>
<body>
    <div class="main-wrapper">
        <div class="form-wrapper">
        <div class="logo"><img src="system/images/uploads/male_avatar.svg" alt="logo"></div>
        <h3 class="login-text-header"> PORTAL LOGIN</h3>
        <form action="system/includes_/login_config.php" method="post">


            <div class="form-item ">
                <span><i class = "fas fa-envelope "></i></span>
                <input type="text" name="email" id="email" placeholder="example@example.com" autocomplete="off" />
            </div>

            <div class="form-item">
                <span><i class = "fas fa-lock" ></i></span>
                <input type="password" name="password" id="password" /> 
            </div>

            <div class="remember-me ">
                <input type="checkbox" name="remember_me" /> 
                <span>Remember me</span>
            </div>

                <p><a href="#">Forget password</a></p>

             <div class="form-submit">
                <input type="submit" name="submit" value="LOGIN" />
            </div>

        </form>
        </div>
    </div>
    

    <script src="./system/fontawesome/js/all.js"></script>
    <script src="./system/js/login.js"></script>
</body>
</html>