<!doctype html>
<html lang="fr">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="style.css" />
    <title><?= $titre ?></title> <!-- Élément spécifique -->
  </head>
  <body>
    <div id="global">
      <header>
        <h1 id="titreBlog"><a href="index.php">Mon Blog</a></h1>
        <p>Je vous souhaite la bienvenue sur ce modeste blog.</p>
      </header>
      <div id="contenu">
          <?= $contenu ?> <!-- Élément spécifique -->
      </div>
      <footer id="piedBlog"> Blog réalisé avec PHP, HTML5 et CSS. </footer>
    </div> <!-- #global -->
  </body>
</html>