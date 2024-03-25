<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie użytkownika</title>
</head>
<body>

<div class="container">
        
        <div class="row mt-5">
            <div class="col-6 offset-3">
                <h1 class="text-center">Zaloguj się</h1>


<form action="logowanie.php" method="post">
<label for="emailInput">Email:</label>
<input type="email" name="email" id="emailInput" required>
<label for="passwordInput">Hasło:</label>
<input type="password" name="password" id="passwordInput" required>
<input type="submit" value="Zaloguj">
<input type="hidden" name="action" value="login">

</form>
</div>
        </div>
        
    </div>

</body>
</html>