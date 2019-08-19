<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="/main.css">
    <title><?= $title ?></title>
</head>
<body class="<?= $body ?>">
    <header>
        <nav>
            <div class="logo"><img src="/asset/images/logo.png"/></div>
            <ul>
                <li class="hamburger"></li>
                <li><a href="/accueil">Accueil</a></li>
                <li><a href="/about">A propos de l'auteur</a></li>
                <li><a href="/blog">Blog</a></li>
                <li><a href="/contact">Contact</a></li>
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
    <script src="/asset/js/main.js"></script>
</body>
</html>