<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CMS</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
<header>
    <h1>Nagłówek Strony</h1>
</header>
    <div id="container">

    <?php 
    $db = new mysqli('localhost', 'root', '', 'cms');
    $q = $db->prepare("SELECT post.id, post.imgUrl, post.title, post.timestamp, user.login FROM `post` INNER JOIN user ON post.author = user.ID;");
    $q->execute();
    $result = $q->get_result();
    while($row = $result->fetch_assoc()) {
        echo '<div class="post-block">';
        echo '<h2 class="post-title">'.$row['title'].'</h3>';
        echo '<h3 class="post-author">'.$row['login'].'</h6>';
        echo '<img src="'.$row['imgUrl'].'" alt="obrazek posta" class="post-image">';
        echo '<p class="post-description">TODO: Opis posta</p>';
        echo '<div class="post-footer">
            <span class="post-meta">'.$row['timestamp'].'</span>
            <span class="post-score">TODO: punkty</span>
            </div>';
        echo '</div>';
    }
  
        
    

    
    ?>
   


         <!--<div class="post-block">
            <h2>Post title</h2>
            <h3 class="post-author">Autor</h3>
            <img src="https://picsum.photos/800/600" alt="obrazek posta" class="post-image">
            <span class="post-description">Opis posta</span>
            <div class="post-footer">
            <span class="post-meta">Data i czas</span>
            <span class="post-score">+ i -</span>
        </div>

        </div>
        -->
    </div>
</body>
</html>