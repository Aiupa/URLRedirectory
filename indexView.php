<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>URL Shortener</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/favico.png" type="image/x-icon">
</head>

<body>
    <section id="main">
        <div class="container">
            <header>
                <img id="logo" src="images/logo.png" alt="Our logo">
            </header>

            <h1>Make your links smaller</h1>
            <h2>"C'est pas faux."</h2>

            <form method="POST" action="index.php">
                <input type="url" name="url" placeholder="Paste your link here.">
                <button class="btn" type="submit">Shorten</button>
            </form>

            <?php 
                if(isset($_GET['error']) && isset($_GET['message'])) {
                ?> 
                    <div class="center">
                        <div id="result">
                            <b><?php  echo htmlspecialchars(($_GET['message'])); ?></b>
                        </div>
                    </div>
                <?php } else if(isset($_GET['short'])) { ?>
                    <div class="center">
                        <div id="result">
                            <b>URL :</b> http://localhost/?q=<?php echo htmlspecialchars($_GET['short']); ?>
                        </div>
                    </div>
                <?php } ?>

        </div>
    </section>

    <section id="brands">
        <div class="container">
            <h3>These guys trust me.</h3>
            <img src="images/perceval&karadoc.jpg" alt="" class="picture">
        </div>
    </section>

    <footer>
        <img src="images/logo2.png" alt="Our logo footer" id="logo">
        <p>2020 ©</p>
        <a href="#">Contact</a> - <a href="#">A propos</a>
    </footer>
</body>

</html>