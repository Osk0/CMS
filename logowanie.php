<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logowanie użytkownika</title>
</head>
<body>


<div class="container">
        
        <div class="row mt-5" style="border: 1px solid #ccc; padding: 20px; text-align: center;">
            <div class="col-6 offset-3">
                <h1 class="text-center">Zaloguj się</h1>


<form action="logowanie.php" method="post">
<label for="emailInput">Email:</label>
<input type="email" name="email" id="emailInput"  style="margin-top: 10px;" required> <br>
<label for="passwordInput">Hasło:</label>
<input type="password" name="password" id="passwordInput" style="margin-top: 10px;" required> <br>
<input type="submit" value="Zaloguj" style="padding: 5px; font-size: 1em; margin-top: 10px;">
<input type="hidden" name="action" value="login" style="margin-top: 10px; margin-bottom: 10px;"> 
<div class="form-group">
    <label for="register">Nie masz konta? </label>
    <a href="rejestracja.php" class="btn-link" >Zarejestruj się</a>
</div>

</form>
</div>
        </div>
        
    </div>
   
</body>
</html>