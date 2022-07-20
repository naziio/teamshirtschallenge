<?php
class Knight {

    public $name;
    protected $lifePoints = 10;

    CONST KNIGHTS_QUANTITY = 5; // quantity of knights in the game

    function __construct($name, $lifePoints) {
        $this->name = $name;
        $this->lifePoints = $lifePoints;
    }
    public function setLifePoints($lifePoints){
        $this->lifePoints = $lifePoints;
    }
    public function getLifePoints(){
        return $this->lifePoints;
    }
    public function getName(){
        return $this->name;
    }
    public function attack(Knight $atacker,$quantityDamage){
        return $atacker->setLifePoints($atacker->getLifePoints()-$quantityDamage);  
    }
    public function isDead() {
        return $this->getLifePoints() <= 0;
    }
    public function createKnights($elementsArray){
        for($i= 1; $i<=Knight::KNIGHTS_QUANTITY; $i++){
            $name = 'Knight'.$i;
            $elementsArray[$i] = new Knight($name, 10);
        }
        return $elementsArray;
    }
}
?>