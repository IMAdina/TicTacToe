<?php

class Partie {
    
    private $_joueurs;
    private $_joueurCourant;
    private $_grille;

    public function __construct($pseudoJoueur1, $signeJoueur1, $pseudoJoueur2, $signeJoueur2) {
        $joueur1 = new Joueur($pseudoJoueur1, $signeJoueur1);
        $joueur2 = new Joueur($pseudoJoueur2, $signeJoueur2);
        $this->_joueurs=array($joueur1, $joueur2);
        $this->_grille = new Grille();
        $this->_joueurs = array($joueur1, $joueur2);
        if ($joueur1->getSigne() == strtolower('x')) {
            $this->_joueurCourant = $joueur1;
        } else {
            $this->_joueurCourant = $joueur2;
        }
    }

    /**
     * @return les codes se trouvent explicités dans jeu.php
     */
    public function jouer($case) {
            if($this->_grille->getPositionedCase($case)->getType()!=""){
            $this->_grille->getPositionedCase($case)->setType($case->getType());
            }else{
                return 3;
            }
            if($this->verifierGagnant()){
                return 1;
            }
            if($this->verifierMatchNull()){
                return 2;
            }
            $this->changerJoueurCourant();
    }

    // dit si la partie est gagnante ou en cours
    public function verifierGagnant() {
        if ($this->_grille->verifierGrille()) {
            return true;
        } else {
            return false;
        }
    }
    
    //dit si la partie est match nul
    public function verifierMatchNull(){
        if($this->_grille->grilleRemplie()){
            return true;
        }else{
            return false;
        }
    } 
    
    public function changerJoueurCourant() {
        if ($this->_joueurCourant == $this->getJoueur(1)) {
            $this->_joueurCourant = $this->getJoueur(2);
        } else {
            $this->_joueurCourant = $this->getJoueur(1);
        }
    }

    /**
     * @param $numero vaut 1 (= joueur 1) ou 2 (= joueur 2)
     */
    public function getJoueur($numero) {
        return $this->_joueurs[$numero - 1];
    }

    public function getJoueurCourant() {
        return $this->_joueurCourant;
    }

    public function getGrille() {
        return $this->_grille;
    }

}

?>
