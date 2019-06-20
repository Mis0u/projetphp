<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="style.css" rel="stylesheet">
    <title><?= $title ?></title>
</head>
<body class="<?= $body ?>">
    <header>
        <nav>
            <div class="logo"><img src="lib/images/logo.png"/></div>
            <ul>
                <li class="hamburger"></li>
                <li><a href="#">Accueil</a></li>
                <li><a href="#">A propos de l'auteur</a></li>
                <li><a href="#">Blog</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </nav> 
        <div class="bg"></div>            
    </header>
    <section>
        <article>
            <?= $content ?>
        </article>
    </section>
    <footer>
    <p>2019 - Jean Forteroche</p>
    </footer>
    <script src="lib/js/main.js"></script>
</body>
</html>