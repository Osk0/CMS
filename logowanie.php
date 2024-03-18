<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie użytkownika</title>
</head>
<body>
<?php 

    $email = $_REQUEST{'email'};

    //$db = new mysqli('localhost', 'root', '', 'cms');
    //$q = $db->prepare("SELECT post.id, post.imgUrl, post.title, post.timestamp, user.login FROM `post` INNER JOIN user ON post.author = user.ID;");
    //$q->execute();
    //$result = $q->get_result();
?>
<form action="index.php" method="get">
<label for="emailInput">Email:</label>
<input type="email" name="email" id="emailInput">
<label for="passwordInput">Hasło:</label>
<input type="password" name="password" id="passwordInput">
<input type="submit" value="Zaloguj">

</form>
    
</body>
</html>