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


        <div class="row mt-5">
        <div class="col-6 offset-4">
        <h1 class="text-center">Zarejestruj się </h1>
    
<form action="rejestracja.php" method="post">
<label class="form-label mt-3" for="emailInput">Email:</label>
<input type="email" name="email" id="emailInput">
<label class="form-label mt-3" for="passwordInput">Hasło:</label>
<input  type="password" name="password" id="passwordInput">
<label class="form-label mt-3" for="passwordRepeat">Powtórz Hasło:</label>
<input type="password" name="passwordRepeat" id="passwordRepeatInput">
<input type="submit" value="Zarejestruj się">
<input type="hidden" name="action" value="register">

</form>
</div>
</div>
<?php endif; ?>
        </div>

</body>
</html>
