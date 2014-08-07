<?
class Joueur {

    private $_pseudo;
    private $_signe;

    public function __construct($pseudo, $signe) {
        $this->_pseudo = $pseudo;
        $this->_signe = $signe;
    }

    public function getPseudo() {
        return $this->_pseudo;
    }

    public function getSigne() {
        return $this->_signe;
    }

    public function setPseudo($pseudo) {
        return $this->_pseudo = $pseudo;
    }

    public function setSigne($signe) {
        return $this->_caze = $signe;
    }
}
?>