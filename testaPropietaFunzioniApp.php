<?php

// ordina i guerrieri in base alla velocita e alla difesa qualora la prima risultasse uguale


 class Guerriero{

   protected $velocita;
   protected $difesa;

 }

 class GuerrieroUno extends Guerriero{

   protected $velocita;
   protected $difesa;


   public function getVelocity(){
    return $this->velocita;
  }

  public function getDefence(){
    return $this->difesa;
  }


   public function __construct($vel, $def){
     $this->velocita = $vel;
     $this->difesa   =  $def;
   }

 }

 class GuerrieroDue extends Guerriero{

   protected $velocita;
   protected $difesa;


   public function getVelocity(){
     return $this->velocita;
   }

   public function getDefence(){
     return $this->difesa;
   }


   public function __construct($vel, $def){
    $this->velocita = $vel;
    $this->difesa   =  $def;
  }

 }



 class testaPriorita {

  /**
   * 
   *  @param GuerrieroUno, @param  GuerrieroDue 
   *  @return array
   * 
  */


  
  public function valutatePronbability($numCycles, $percentageCalculation) : float {
    
         $probability = ($numCycles / $percentageCalculation);

      return $probability;
    }

    public function setWarriorsOrder(Guerriero $WarriorUno, Guerriero $WarriorDue) : array{

      if($WarriorUno->getVelocity() > $WarriorDue->getVelocity()){

        echo "warriorOne more faster, attack starts from here \n";
        return array($WarriorUno, $WarriorDue);
      }
      elseif($WarriorDue->getVelocity() > $WarriorUno->getVelocity() ){
        echo "warriorTwo more faster, attack starts from here \n";
        return array($WarriorDue, $WarriorUno);
      }
      else{
        if($WarriorUno->getDefence() > $WarriorDue->getDefence()){
          echo "warriorOne more defendence, attack starts from here \n";
          return array($WarriorUno, $WarriorDue);
        }
        else{
          if($WarriorDue->getDefence() > $WarriorUno->getDefence()){
            echo "warriorTwo more defendence, attack starts from here \n";
            return array($WarriorDue, $WarriorUno);
          }
        }
      }

      return [];
    }

 }

$warriorOne = new GuerrieroUno(2, 22);
$warriorTwo = new GuerrieroDue(2, 44);

$testProprity = new testaPriorita();

// $arrayGuerrieriOrdinati = array();

// $arrayGuerrieriOrdinati = $testProprity->setWarriorsOrder($warriorOne, $warriorTwo);


// var_dump($arrayGuerrieriOrdinati);

// echo $testProprity->valutatePronbability(30, 5);

$decUno = 0.9;
$decDue = 0.35;

$addVal = (float)0.11;

echo "\$addVal: " . ($addVal) . "\n";

echo "\$decUno + \$addVal: " . ($decUno + $addVal) . "\n";
echo "\$decDue + \$addVal: " . ($decDue + $addVal) . "\n";


?>