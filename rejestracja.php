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
        $email = $_REQUEST['email'];
        if($_REQUEST['password'] != $_REQUEST['passwordRepeat'])
        die("Hasła niezgodne");
        $passwd = $_REQUEST['password'];
        $passwordHash = password_hash($passwd, PASSWORD_ARGON2I);
       
      
        $db = new mysqli("localhost", "root", "", "cms");
        $sql = "INSERT INTO user (email, password) VALUES (?, ?)";
        $q = $db->prepare($sql);
        $q->bind_param("ss", $email, $passwordHash);
        $success = $q->execute();
        if(!$success)
        die("Błąd przy próbie założenia konta");
        ?>
    <div class="row mt-5">
    <div class="col-6 offset-4">
    <h1 class="text-center">Konto założone</h1>
    <div class="text-center">
        <a href="index.php">Powrót do strony</a>
    </div>

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
