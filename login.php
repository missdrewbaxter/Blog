<?php
$pass = 'PASSWORD';
$password = password_hash($pass, PASSWORD_DEFAULT);

session_start();
if (!isset($_SESSION['loggedIn'])) {
    $_SESSION['loggedIn'] = false;
}

if (isset($_POST['password'])) {
    if (password_verify($_POST['password'],$password)) {
        $_SESSION['loggedIn'] = true;
    }
    else {
        die ('Incorrect password');
    }
} 

if (!$_SESSION['loggedIn']): ?>

<h1>Log in</h1>

    <form method="post">
      Password: <input type="password" name="password"> <br />
      <input type="submit" name="submit" value="Login">
    </form>

<?php
exit();
endif;
?>