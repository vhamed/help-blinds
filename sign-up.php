<?php 
require_once 'helperModal.php';
if( isset( $_POST['signup']) ){
    // verify each input
    $name = $_POST['name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $typeOfHelper = $_POST['type'];
    $helper = new Helper($name, $email, $phone, $password, $typeOfHelper);
    $helper->showHelperInfo();

    return ;
}
?>
<form action="sign-up.php" method="post">
    <input type="text" name="name" placeholder="Enter your name" required=true>
    <br></br>
    <input type="password" name="password" placeholder="Enter your password">
    <br></br>
    <input type="text" name="phone" placeholder="Enter your phone number" required=true>
    <br></br>
    <input type="email" name="email" placeholder="Enter your email " required=true>
    <br></br>
    <select name="type">
        <option>Agent</option>
        <option>Cousin</option>
    </select>
    <br></br>
    <input type="submit" name="signup" value="Sign up">
</form>
