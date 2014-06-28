<?
$signesJeu = array("x", "o");
// traitement du formulaire d'enregistrement
if (!isset($_SESSION['partie']) || empty($_SESSION['partie'])) {
    if (isset($_POST['joueur1']) && !empty($_POST['joueur1']) && isset($_POST['joueur2']) && !empty($_POST['joueur2'])) {
        if (isset($_POST['case_joueur1']) && !empty($_POST['case_joueur1']) && isset($_POST['case_joueur2']) && !empty($_POST['case_joueur2'])) {
            if (in_array(strtolower($_POST['case_joueur1']), $signesJeu, true) && in_array(strtolower($_POST['case_joueur2']), $signesJeu, true)) {
                $_SESSION['partie'] = new Partie($_POST['joueur1'], strtolower($_POST['case_joueur1']), $_POST['joueur2'], strtolower($_POST['case_joueur2']));
                $partie = $_SESSION['partie'];
            } else {
                echo 'Vous n\'avez le choix que pour "X" ou "O". Le chiffre 0 n\'est pas accepté.';
            }
        } else {
            echo 'Il est indispensable de choisir entre les lettres "X" ou "O" pour chaque joueur.';
        }
    } else {
        echo 'Il est indispensable de préciser un pseudo pour chaque joueur';
    }
} else {
    $partie = $_SESSION['partie'];
}

$joueurGagnant = false;
//traitement de l'action 'jouer'
if (isset($_POST['case'])) {
    $case = new Caze($partie->getJoueurCourant()->getSigne(), $_POST['case']);

    $resultat = $partie->jouer($case);
    switch ($resultat) {
        case(1): echo 'Bravo ' . $partie->getJoueurCourant()->getPseudo() . ' c\'est gagné';
            break;
        case(2): echo 'Match null.';
            break;
        case(3): echo 'La case est prise. Placez votre choix dans une case vide.';
            break;
    }
}
if (isset($_SESSION['partie']) && !empty($_SESSION['partie'])) {
    echo '<p>Le tour de ' . $partie->getJoueurCourant()->getPseudo() . ' de jouer.</p>';
    require_once 'grilleView.php';
}
?>
<div>
    <a id="reset" class="btn-link" href="">Recommencer la partie</a>
</div>
<script type='text/javascript'>
    $(document).ready(function() {
        $('#reset').on('click', function(e) {
            e.preventDefault();
            $.ajax({
                url: 'destroysession.php',
                type: 'POST',
                data: '',
                success: redirect()
            });
        });
        function redirect() {
            var currentLocation= window.location.href;
            var redirLocation=currentLocation.substr(0, currentLocation.indexOf("page")-1)
            window.location = redirLocation;
        }
    });
</script>

