<?php 
session_start();
require("./class/user.class.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rejestracja</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <?php if(isset($_REQUEST['email'])) : ?>

        <?php
        $result = User::Register($_REQUEST['email'], $_REQUEST['password']);
        ?>
    <div class="row mt-5">
    <div class="col-6 offset-4">
    <h1 class="text-center">
        <?php 
        if($result) 
        echo "Udało się założyć konto";
    else 
        echo "Nastąpił błąd";
    
    
        ?>
    </h1>
    <div class="text-center">
        <a href="index.php">Powrót do strony</a>
    </div>
        <a href="rejestracja.php">
    </div>
    </div>

        <?php else : ?>


        <div class="row mt-5" style="border: 1px solid #ccc; padding: 20px; text-align: center;">
        <div class="col-6 offset-4">
        <h1 class="text-center">Zarejestruj się </h1>
    
<form action="rejestracja.php" method="post">
<label class="form-label mt-3" for="emailInput">Email:</label> 
<input type="email" name="email" id="emailInput" style="margin-top: 10px;"> <br>
<label class="form-label mt-3" for="passwordInput">Hasło:</label> 
<input  type="password" name="password" id="passwordInput" style="margin-top: 10px;"> <br>
<label class="form-label mt-3" for="passwordRepeat">Powtórz Hasło:</label> 
<input type="password" name="passwordRepeat" id="passwordRepeatInput"  style="margin-top: 10px;"> <br> 
<input type="submit" value="Zarejestruj się" style="padding: 5px; font-size: 1em; margin-top: 10px;">
<input type="hidden" name="action" value="register"> <br>
<div class="form-group">
    <label for="login">Masz już konto?</label>
    <a href="logowanie.php" class="btn-link">Zaloguj się</a>
</div>

</form>
</div>
</div>
<?php endif; ?>
        </div>

</body>
</html>
