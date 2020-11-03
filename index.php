<?php
    // IS RECEIVED SHORTCUT ?
    if(isset($_GET['q]'])) {
        // Variable
        $shortcut = htmlspecialchars($_GET['q']);

        //Is a shortcut ?
        $bdd = new PDO('mysql:host=localhost;dbname=url;chasret=utf8','root','');
        $req = $bdd->prepare('SELECT COUNT(*) AS x FROM links WHERE shortcut = ?');
        $req->execute(array($shortcut));

        while($result = $req->fetch()) {
            if($result['x'] != 1) {
                header('location: ../?error=true&message=Unknow URL');
                exit();
            }
        }

        // Redirection
        $req = $bdd->prepare('SELECT * FROM link WHERE shortcut = ?');
        $req->execute(array($shortcut));

        while($result = $req->fetch()) {

            header('location: '.$result['url']);
            exit();
        }
    }


    if(isset($_POST['url'])) {

        // Our variables
        $url = $_POST['url'];

        // Verification
        if(!filter_var($url, FILTER_VALIDATE_URL)) {
            // If it's not a link
            header('location: ../?error=true&message=URL not valid');
            exit();
        }

        // SHORTCUT
        $shortcut = crypt($url, rand());

        // Already send?
        $req = $bdd->prepare('SELECT COUNT(*) AS x FROM links WHERE url = ?');
        $req->execute(array($url));

        while($result = $req->fetch()){
            if($result['x'] != 0) {
                header('location: ../error=true?message=Link already shorten');
            }
        }

        // Sending
        $req = $bdd->prepare('INSERT INTO links(url, shortcut) VALUES(?, ?)');
        $req->execute(array($url, $shortcut));

        header('location: ../?short='.$shortcut);
        exit();
    }

    require('indexView.php');