<?
require_once('Caze.class.php');
require_once('Grille.class.php');
require_once('Partie.class.php');
require_once ('Joueur.class.php');
session_start();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/custom.css">
        <script src="./js/jquery.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.min.js"></script>
        <title></title>
    </head>
    <body>
        <div id="wrap">
            <div class="container">
                <div class="page-header">
                    <h1>Tic Tac Toe (PHP OO)</h1>
                </div><?if(!isset($_SESSION['partie'])&&!empty($_SESSION['partie'])){?>
                <p class="lead">Enregistrez-vous ci-dessous pour commencer le jeu</p>
                <?}?>
                <p>
                    <?
                    //unset($_SESSION['partie']);
                    if (isset($_GET['page']) && !empty($_GET['page'])) {
                        $page = $_GET['page'];
                    } else {
                        $page = 'enregistrement';
                    }
                    if (in_array($page, array('enregistrement', 'jeu'))) {
                        require_once($page . '.php');
                    } else {
                        require_once('404.php');
                    }
                    ?>
                </p>

            </div>
        </div>
        
        <div id="footer">
            <div class="container">
                <p class="text-muted credit">Adina Ionescu-Muscel</p>
            </div>
        </div>
    </body>
</html>

