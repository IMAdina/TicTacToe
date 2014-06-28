<?php

class Grille {
    //$_grille = array(3,3);
    // les cases sont numérotées de 1 à 9 = leurs identifiants
    private $_grille;
    private $_lignesV;
    private $_diagonales;

    public function __construct() {
        $k = 0;
        $l=0;
        $ligneH = array();
        $ligneV = array();
        $diagonale1 = array();
        $diagonale2 = array();
        for ($i = 1; $i <= 9; $i++) {
            $case[] = new Caze('', $i);
        }
        for ($i = 0; $i < 3; $i++) {
            for ($j = 0; $j < 3; $j++) {
                $this->_grille[$i][$j] = $case[$k++];
                $this->_lignesV[$l++][] = $this->_grille[$i][$j];
                if ($j == $i) {
                    $diagonale1[] = $this->_grille[$i][$j];
                }
                if ($j + $i == 2) {
                    $diagonale2[] = $this->_grille[$i][$j];
                }
            }
            $l=0;
            $this->_diagonales[0] = $diagonale1;
            $this->_diagonales[1] = $diagonale2;
        }
    }

    public function grilleRemplie() {
        foreach ($this->_grille as $ligne) {
            foreach ($ligne as $case) {
                if (empty($case->getType())) {
                    return false;
                }
            }
        }
        return true;
    }

    public function getPositionedCase($case) {
        foreach ($this->_grille as $ligne) {
            foreach ($ligne as $caseGrille) {
                if ($caseGrille->equalsPos($case)) {
                    return $caseGrille;
                }
            }
        }
    }
    public function getCase($position){
        foreach($this->_grille as $ligne){
            foreach($ligne as $case){
                if($case->getIdentifiant()==$position){
                    return $case;
                }
            }
        }
    }
    //vérifie si toutes les cases de toutes les lignes verticales sont égales
    function verifierLignesVerticales() {
        foreach ($this->_lignesV as $ligne) {
            if ($ligne[0]->equals($ligne[1]) && $ligne[1]->equals($ligne[2])) {
                return true;
            }
        }
        return false;
    }

    //vérifie si toutes les cases de toutes les lignes horizontales sont égales
    function verifierLignesHorizontales() {
        foreach ($this->_grille as $ligne) {
            if ($ligne[0]->equals($ligne[1]) && $ligne[1]->equals($ligne[2])) {
                return true;
            }
        }
        return false;
    }

    //vérifie si les cases des deux diagonales sont égales
    public function verifierDiagonales() {
        foreach ($this->_diagonales as $ligne) {
            if ($ligne[0]->equals($ligne[1]) && $ligne[1]->equals($ligne[2])) {
                return true;
            }
        }
        return false;
    }

    function verifierGrille() {
        if ($this->verifierDiagonales() || $this->verifierLignesHorizontales() || $this->verifierLignesVerticales()) {
            return true;
        } else {
            return false;
        }
    }

}

?>
