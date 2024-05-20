<?php
if(!empty($_POST)) {
    $postTitle = $_POST['postTitle'];
    $postDescription = $_POST['postDescription'];

    $targetDirectory = "img/";
    //$fileName = $_FILES['file']['name'];

    $fileName = hash('sha256', $_FILES['file']['name'].microtime() );

    $fileString = file_get_contents($_FILES['file']['tmp_name']);
    //move_uploaded_file($_FILES['file']['tmp_name'], $targetDirectory.$fileName);

    $gdImage = imagecreatefromstring($fileString);
    $finalUrl = "http://localhost/cms/".$fileName.".webp";
    $internalUrl = "img/".$fileName."webp";

    imagewebp($gdImage, $internalUrl );

    




    $authorID = 1;
 

    $db = new mysqli('localhost', 'root', '', 'cms');
    $q = $db->prepare("INSERT INTO post (author, imgUrl, title) VALUES (?, ?, ?)");
    $q->bind_param("iss", $authorID, $imageURL, $postTitle);
    $q->execute();
}
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dodaj nowy post</title>
</head>
<body>
    <div id="upload" style="border: 1px solid #ccc; padding: 20px; text-align: center;">

    
<header >
    <h1>Dodaj nowy post</h1>
</header>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="postTitleInput">Tytuł posta: </label>
        <input type="text" name="postTitle" id="postTitleInput" style="margin-top: 10px;">
        <br>

        <label for="postDescriptionInput">Opis posta:</label>
        <input type="text" name="postDescription" id="postDescriptionInput" style="margin-top: 10px;">
        <br>
        <label for="fileInput">Obrazek: </label>
        <input type="file" name="file" id="fileInput" style="margin-top: 10px;"> 
        <br>
        <input type="submit" value="Wyślij!" style="margin-top: 10px;">
    </form>
    </div>
</body>
</html>