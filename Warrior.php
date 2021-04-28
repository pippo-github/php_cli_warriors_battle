<?php

namespace batleSimulator;

abstract class Warrior{

    protected $typeCombat = "generic warior";
    protected $speed = 111;
    protected $health = 0;
    protected $strength;
    protected $defence;
    protected $luck = 0.0;

    private $specialAttackSwordMan = 0;
    private $specialAttackBrute    = 0;
    private $specialAttackGrappler = 0;
    private $stopOneTurn = false;

    public function getSpecialAttackGrappler()  { return  $this->specialAttackGrappler; }
    public function getSpecialAttackSwordMan()  { return  $this->specialAttackSwordMan; }
    public function getSpecialAttackBrute()     { return  $this->specialAttackBrute; }
    public function getStopOneTurn() { return  $this->stopOneTurn; }
    public function getLucky() { return  $this->luck; }

    public function setSpecialAttackGrappler($newVal)  {   $this->specialAttackGrappler = $newVal; }
    public function setSpecialAttackSwordMan($newVal)  {   $this->specialAttackSwordMan = $newVal; }
    public function setSpecialAttackBrute($newVal)     {   $this->specialAttackBrute = $newVal; }
    public function setStopOneTurn($newVal)  {   $this->stopOneTurn = $newVal; }

    public function setLucky($warrior, $newLucky)     { $this->luck = $newLucky; }
    abstract public function specialsKills(Worrior $enemy);
    abstract public function getName();
    abstract public function setInitalVal();
    public function getHealth(){ return $this->health; }
    public function getStrength(){ return $this->strength; }

    public function valutateProbability($numCycles, $percentageCalculation) : float { 
        $probability = ($numCycles / $percentageCalculation);
        return $probability;
   }
    public function setHealth($num){ $this->health = (int)$num; }
    public function getVelocity(){ return $this->speed; }
    public function getDefence(){ return $this->defence; }
    public function createRandomVal($min, $max){ return rand($min, $max); }

    public function warriorIsLucky($warrior){

        if($warrior->getLucky() >= 1){
            return true;
        }
        else
        return false;
    }

    public function superPower($warrios){

        $longProbability = rand(1,200);

        if($longProbability == 11){
            return true;
        }
        else
        return false;
    }

}


?>