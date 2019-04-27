<!DOCTYPE html>
<html>
    <?php require_once 'includes/header.php'; ?>
    <link rel="stylesheet" href="css/login.css">
    </head>
    <body>
        <?php 
            session_start();
            if( isset( $_SESSION['type'])){
                if( $_SESSION['type'] == 'admin'){
                    header("Location: dashboard.php");
                }
                if( $_SESSION['type'] == 'helper'){
                    header("Location: helper.php");
                }
            }
            if( isset( $_POST['submit'])){
                if( $_POST['username'] == "helper" && $_POST['password'] == "helper"){
                    // the helper area
                    $_SESSION['type'] = "helper";
                    header ("Location: helper.php");
                }
                if( $_POST['username'] == "admin" && $_POST['password'] == "admin"){
                    // the admin area
                    $_SESSION['type'] = "admin";
                    header ("Location: dashboard.php");
                }
                echo "<h4 style='color: red'>Password Incorrect</h4>";
            }
        ?>
        <h3>Login Page</h3>
        <form action="login.php" method="post">
            <label for="">Username</label><input type="text" name="username" value="" required=true>
            <br></br>
            <label for="Password">Password</label><input type="password" name="password" value="" required=true>
            <br></br>
            <input type="submit" name="submit" value="Login">
            <button><a href="sign-up.php">Sign up</a></button>
            <br></br>
        </form>
    </body>
</html>
