<?php

class Caze {

     private $_type;
     private $_identifiant;
     
     public function __construct($type, $identifiant){
         $this->_type=$type;
         $this->_identifiant=$identifiant;
     }
     
     public function getType(){
         return $this->_type;
     }
     
     public function getIdentifiant(){
         return $this->_identifiant;
     }
     
     public function setIdentifiant($i){
         return $this->_identifiant=$i;
     }
     public function setType($type){
         return $this->_type=$type;
     }
     public function equalsPos($case){
         if($this->_identifiant==$case->getIdentifiant()){
             return true;
         }else{
             return false;
         }
     }
     public function equals($case){
         if($this->_type==$case->getType()&&($case->getType()!="")){
             return true;
         }else{
             return false;
         }
     }
}
?>

