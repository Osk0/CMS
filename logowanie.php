<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie użytkownika</title>
</head>
<body>
<?php 
    if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'login') {
        $email = $_REQUEST['email'];
        $password = $_REQUEST['password'];
    
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    
        $db = new mysqli('localhost', 'root', '', 'cms');
        $q = $db->prepare("SELECT FROM user WHERE email = ? LIMIT 1");
        $q->bind_param("s", $email);
        $q->execute();
        $result = $q->get_result();
    
        $userRow = $result->fetch_assoc();
        if($userRow == null) {
            echo "Błędny login lub hasło <br>";
        } else {
            if(password_verify($password, $userRow['password'])) {
                echo "Zalogowano poprawnie <br>";
            } else {
                echo "Błędny login lub hasło <br>";
            }
        }
    
        var_dump($userRow);
    }
    if(isset($_REQUEST['action']) && $_REQUEST['action'] == 'login') {
        $db = new mysqli('localhost', 'root', '', 'cms');
        $nick = $_REQUEST['nick'];
        $email = $_REQUEST['email'];
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);
        $password = $_REQUEST['password'];
        $passwordRepeat = $_REQUEST['passwordRepeat'];

        if($password == $passwordRepeat) {
            $q = $db->prepare("INSERT INTO user VALUES (NULL, ?, ?, ?)");
            $q->bind_param("ss", $nick, $email, $password);
            $q->execute();
            if($result) {
                echo "Konto utworzono poprawnie";
            } else {
                echo "Nie można utworzyć konta";
            }
        } else {
            echo "Hasła nie są takie same";
        }
        
    

    }

?>
<h2>Zaloguj się </h2>
<form action="index.php" method="post">
<label for="emailInput">Email:</label>
<input type="email" name="email" id="emailInput">
<label for="passwordInput">Hasło:</label>
<input type="password" name="password" id="passwordInput">
<input type="submit" value="Zaloguj">
<input type="hidden" name="action" value="login">

</form>
<h2>Zarejestruj się </h2>
<form action="index.php" method="post">
<label for="nickInput">Wpisz swój nick:</label>
<input type="nick" name="nick" id="nickInput">
<label for="emailInput">Email:</label>
<input type="email" name="email" id="emailInput">
<label for="passwordInput">Hasło:</label>
<input type="password" name="password" id="passwordInput">
<label for="passwordRepeat">Powtórz Hasło:</label>
<input type="password" name="passwordRepeat" id="passwordRepeatInput">
<input type="submit" value="Zarejestruj się">
<input type="hidden" name="action" value="register">
</body>
</html>