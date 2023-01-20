
<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <title>
            LOGIN PAGE
        </title>
    </head>
    <h1>
        LOGIN HERE WITH UR CREDENTIALS
    </h1>
    <body bgcolor="4863A0">
        
        <form action="verify_user.php" method="POST">
            <label for='username'>UserName:</label>
            <input type='text' name="username" id="username" required/> <br> <br>

            <label for='password'>Password:</label>
            <input type='password' name="password" id="password" required/> <br> <br>

            
            <input type='submit' name="submit" id="submit" />
        </form>
    </body>
</html>