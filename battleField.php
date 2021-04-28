<?php 

namespace batleSimulator;

require_once (__DIR__ . "\Grappler.php");
require_once (__DIR__ . "\Swordman.php");
require_once (__DIR__ . "\Brute.php");

?>

<?php

class BattleField{

    protected $userName         = array(1);
    protected $randObjWarriors  = array(1);
    protected $sortedAttackers  = array(1);

    protected const NUM_PLAYERS  = 2;
    protected const MAX_NAME_LEN = 30;
    protected const MIN_NAME_LEN = 1;
    protected const NUM_ROUND    = self::MAX_NAME_LEN;

    public function __construct() {
        if (! defined('STDIN') ) 
            die("You not use the CLI, the application will be closed");
    }

    /**
     *  @param string
     *  @return string
     * 
     *  */ 
    // return the user name of player
    public function retUserName($idx) : string {
        return  $this->userName[$idx];
    }

    /**
     *  @param void
     *  @return array
     *  */ 
    // return a random Warrior object in array
    public function RandWarriors() : array {
        $rndWarriosOne = rand(0,2);
        $rndWarriosTwo = rand(0,2);

        $arrayWorriors[] = "batleSimulator\\Grappler";
        $arrayWorriors[] = "batleSimulator\\Swordman";
        $arrayWorriors[] = "batleSimulator\\Brute";

        $RandomWarriors[] = $arrayWorriors[$rndWarriosOne]; 
        $RandomWarriors[] = $arrayWorriors[$rndWarriosTwo]; 

        return $RandomWarriors;
    }

/**
 * @param string
 * @return void
 *  */  
// check player name lenght 
    public function checkNameLen($nameToCheck) : void {
            if(strlen($nameToCheck) <= self::MIN_NAME_LEN)
                die("palyer name too short, minimum required 1");
            elseif(strlen($nameToCheck) >= self::MAX_NAME_LEN)
                die("palyer name too big, maximum required 30");

    }

/**
 *  @param int
 *  @return bool
 * 
*/  
// check if round has reached the limit
    public function finishedEven($round) : bool {
        if($round == 30) {
            return true;
        }
        else
        return false;    
    }

    /**
     *  @param void
     *  @return void
     * 
    */ 
    
    // save the name of the players into array of this class
    public function getTheUserPlayer() : void {
        for($i=0; $i<self::NUM_PLAYERS; $i++) {
            echo "Type the user name for the player #" . ($i+1) . ": ";
            $this->userName[$i]=(string) fgets(STDIN);
            $this->userName[$i]=trim($this->userName[$i]);
            $this->checkNameLen($this->userName[$i]);
        }
    }

    /**
     * @param string
     * @return void
     * 
    */ 
    // print a message to STDOUT
    public function printMessage($str) : void {
        fputs(STDOUT,"${str}\n");
    }

    /**
     * @param Warrios
     * @param Warrios
     * 
     * @return array
    */ 
    // set order of warriors
    public function setWarriorsOrder(Warrior $WarriorOne, Warrior $WarriorTwo) : array {

        if($WarriorOne->getVelocity() > $WarriorTwo->getVelocity()){
          echo "\nWarriorOne: " . $WarriorOne->getName() . " is faster, attack starts from him \n";
          return array($WarriorOne, $WarriorTwo);
        }
        elseif($WarriorTwo->getVelocity() > $WarriorOne->getVelocity() ){
          echo "\nWarriorTwo: " . $WarriorTwo->getName() . " is faster, attack starts from him \n";
          return array($WarriorTwo, $WarriorOne);
        }
        else{
          if($WarriorOne->getDefence() > $WarriorTwo->getDefence()){
            echo "\nWarriorOne: " . $WarriorOne->getName() . " more defensive, attack starts from him \n";
            return array($WarriorOne, $WarriorTwo);
          }
          else{
            if($WarriorTwo->getDefence() > $WarriorOne->getDefence()){
              echo "\nWarriorTwo: " . $WarriorTwo->getName() . " more defensive, attack starts from him \n";
              return array($WarriorTwo, $WarriorOne);
            }
          }
        }
  
        return array($WarriorOne, $WarriorTwo);
      }

    /**
     * 
     * @param Array
     * @return void
     * 
    */ 
    // perform the attack form a Warrior to Warrior      
    public function performAttack($arrayWarriors) : void {
    
        $luckyWarriosOne = 0.00;
        $luckyWarriosTwo = 0.00;
        $warriorOneIsLucky = false;
        $warriorTwoIsLucky = false;

        for($i=0; $i<=self::NUM_ROUND; $i++) {

                if($arrayWarriors[0]->superPower($arrayWarriors[0])){
                    $this->printMessage("The Warrior: " . $arrayWarriors[0]->getName() . " use his super power, the battle is end.");
                    $arrayWarriors[0]->setHealth(0);
                }

                if($arrayWarriors[1]->superPower($arrayWarriors[1])){
                    $this->printMessage("The Warrior: " . $arrayWarriors[1]->getName() . " use his super power, the battle is end.");
                    $arrayWarriors[1]->setHealth(0);
                }

                $luckyWarriosOne = (float)($arrayWarriors[0]->getLucky() + 0.11);
                $luckyWarriosTwo = (float)($arrayWarriors[1]->getLucky() + 0.11);
        
                $arrayWarriors[0]->setLucky($arrayWarriors[0], $luckyWarriosOne);
                $arrayWarriors[1]->setLucky($arrayWarriors[1], $luckyWarriosTwo);


                if($arrayWarriors[0]->warriorIsLucky($arrayWarriors[0])) {
                    $warriorOneIsLucky = true;
                    $arrayWarriors[0]->setStopOneTurn(1);
                    $arrayWarriors[0]->setLucky($arrayWarriors[0], 0.00);
                }

                if($arrayWarriors[1]->warriorIsLucky($arrayWarriors[1])) {
                    $warriorTwoIsLucky = true;
                    $arrayWarriors[1]->setStopOneTurn(1);
                    $arrayWarriors[1]->setLucky($arrayWarriors[1], 0.00);
                }



            if($this->finishedEven($i)) {
                $this->printMessage("\n~~~~~~~~~~~~~~~~~~~~~~~~");
                $this->printMessage("Fight is ended in a draw");
                $this->printMessage("~~~~~~~~~~~~~~~~~~~~~~~~");
                $this->endBattleMsg();
                break;
            }
            
            $this->checkWinner($arrayWarriors);

            $this->printMessage("-------------------------");
            $this->printMessage("Round: #" . ($i+1));
            $this->printMessage("-------------------------");


            if($arrayWarriors[0]->specialsKills($arrayWarriors[1]) || $arrayWarriors[1]->specialsKills($arrayWarriors[0])) {

                if($arrayWarriors[0]->specialsKills($arrayWarriors[1])) {
                    $arrayWarriors[0]->specialsKills($arrayWarriors[1]);
                 }

                if($arrayWarriors[1]->specialsKills($arrayWarriors[0])) {
                    $arrayWarriors[1]->specialsKills($arrayWarriors[0]);
                 }

            }

            else{

                $damge        = 0;
                $newHealth    = 0;
                $curHealth    = 0;
                $wOneStrenght = 0;
                $wTwoDefence  = 0;
    
                $wOneStrenght = (int)$arrayWarriors[0]->getStrength();
                $wTwoDefence  = (int)$arrayWarriors[1]->getDefence();
                $damge = (int)($wOneStrenght - $wTwoDefence); 
    
                $newHealth = (int)($arrayWarriors[1]->getHealth() - $damge);
                // $newHealth = (int)($arrayWarriors[1]->getHealth() - 1);
    
                $curHealth = $arrayWarriors[1]->getHealth();
                $arrayWarriors[1]->setHealth($newHealth);
    
                if($arrayWarriors[1]->getHealth() < 0) {  $arrayWarriors[1]->setHealth(0); }

                if($arrayWarriors[1]->getStopOneTurn()) {
                    if($warriorOneIsLucky){
                        echo "Warrior Two " . $arrayWarriors[1]->getName() . " is lucky, him jump his turn\n";
                        $arrayWarriors[1]->setStopOneTurn(0);
                    }
                    else
                    echo "Warrior two: " . $arrayWarriors[1]->getName() . " jump for a turn, anybody can touch him\n";
                    $arrayWarriors[1]->setHealth($curHealth);
                    $arrayWarriors[1]->setStopOneTurn(0);
                }
                else
                $this->printMessage("AAA The warrior: " . $arrayWarriors[1]->getName() . " has a damage of: " . $damge . " his health is: " . $arrayWarriors[1]->getHealth());
    
                
                $damge        = 0;
                $newHealth    = 0;
                $curHealth    = 0;
                $wOneStrenght = 0;
                $wTwoDefence  = 0;
                
                $wTwoStrenght = (int)$arrayWarriors[1]->getStrength();
                $wOneDefence  = (int)$arrayWarriors[0]->getDefence();
                
                $damge = (int)($wTwoStrenght - $wOneDefence); 
                $newHealth = (int)($arrayWarriors[0]->getHealth() - $damge);
                // $newHealth = (int)($arrayWarriors[1]->getHealth() - 1);
                
                $curHealth = $arrayWarriors[0]->getHealth();
                $arrayWarriors[0]->setHealth($newHealth);
                
                if($arrayWarriors[0]->getHealth() < 0) {  $arrayWarriors[0]->setHealth(0); }

                if($arrayWarriors[0]->getStopOneTurn()) {
                    if($warriorOneIsLucky){
                        echo "Warrior One " . $arrayWarriors[0]->getName() . " is lucky, him jump his turn\n";
                        $arrayWarriors[0]->setStopOneTurn(0);

                    }
                    else
                    echo "Warrior one: " . $arrayWarriors[0]->getName() . " jump for a turn, anybody can touch him\n";
                    $arrayWarriors[0]->setHealth($curHealth);
                    $arrayWarriors[0]->setStopOneTurn(0);
                }
                else
                $this->printMessage("BBB The warrior: " . $arrayWarriors[0]->getName() . " has a damage of: " . $damge . " his health is: " . $arrayWarriors[0]->getHealth());
            }
   
        }

    }

    /**
     * 
     * @param Array
     * @return void
     * 
     */
    // check the winner of the battle
    public function checkWinner($arrayWarriors) : void
    {


        if($arrayWarriors[0]->getHealth() == 0) {
            $this->printMessage("\n****************************************");
            echo "The winner is: " . $this->retUserName(1) . "\n" ;
            $this->printMessage("****************************************");
            $this->endBattleMsg();

            exit(0);
        }
        elseif ($arrayWarriors[1]->getHealth() == 0) {
            $this->printMessage("\n****************************************");
            echo "The winner is: " . $this->retUserName(0) . "\n";
            $this->printMessage("****************************************");
            $this->endBattleMsg();

            exit(0);
        }

    }

    /**
     * 
     * @param void
     * @return string
    */
    // print welcome message
    public function welcomeToTheBattle() : string {

    $wlkMsg = <<<endMsg
________________________________________________________
Welcome to the battle that everyone has been waiting for
--------------------------------------------------------\n
endMsg;

        return $wlkMsg;
    }

    /**
     * 
     * @param void
     * @return void
    */
    // print end battle message
    public function endBattleMsg() : void {

    $wlkMsg = <<<endMsg
--------------------------------------------------------
Game Over
--------------------------------------------------------
++++++++++++++++++++++++++++++++++++++++++++++++++++++++
--------------------------------------------------------
End of the battle 
''''''''''''''''''''''''''''''''''''''''''''''''''''''''\n
+------------------------------------------------------+
| writed by: Giuseppe Tarallo; London - 03-20-2021     |
+------------------------------------------------------+
________________________________________________________

    Email: tarallo.giuseppe@libero.it
    web:   https://www.dev-ita.it
________________________________________________________
endMsg;

        echo $wlkMsg;
    }



}

$theBattleField = new BattleField;
$theBattleField->getTheUserPlayer();
echo $theBattleField->welcomeToTheBattle();

$vettWarriros = $theBattleField->RandWarriors();

$warriorsOne = new $vettWarriros[0];
$warriorsTwo = new $vettWarriros[1];

$theBattleField->printMessage("----------------------------------------------");
echo "Player 1: " ; 
echo $theBattleField->retUserName(0) . "\n" ;
$theBattleField->printMessage("----------------------------------------------");
echo $warriorsOne->getAllVal();

$theBattleField->printMessage("----------------------------------------------");
echo "Player 2: " ; 
echo $theBattleField->retUserName(1) . "\n" ;
$theBattleField->printMessage("----------------------------------------------");
echo $warriorsTwo->getAllVal();


$sortedAttackers = $theBattleField->setWarriorsOrder($warriorsOne, $warriorsTwo);

$theBattleField->performAttack($sortedAttackers);

?>


