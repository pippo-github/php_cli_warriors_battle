<?php 

namespace batleSimulator;

require_once (__DIR__ . "\Warrior.php");

    class Swordman extends Warrior
    {
        protected $specialSkillsValue = 0;
        protected $jumpTurn           = 0;


        public function __construct(){ 
            $this->setInitalVal(); 
        }


        public function getName() {
            return $this->typeCombat;
        }

 
        public function specialsKills($enemy) : bool {

            $probability = $this->valutateProbability(30,5);

            if($probability == $this->getSpecialAttackSwordMan()){
                echo "Swordman special skills: Lucky Strike, the warrior has the double strength for the attack\n";
                $strenght = $this->getStrength() * 2;
                $enemy->setHealth($enemy->getHealth() - $strenght);

                $probability = 0;
                $this->setSpecialAttackSwordMan(0);
                return true;

            }
            $this->setSpecialAttackSwordMan(($this->getSpecialAttackSwordMan() + 1));

            return false;
        }


        public function setInitalVal(){
            $this->typeCombat   = "swordman";
            $this->health       = $this->createRandomVal(40,60);
            $this->strength     = $this->createRandomVal(60,70);
            $this->defence      = $this->createRandomVal(20,30);
            $this->speed        = $this->createRandomVal(90,100);
            $this->luck         = (float)rand(3,5) / 10;
        }

        public function getAllVal(){ 
            return      "Warrior: "  . $this->typeCombat  . "\n" .
                        "speed: "    . $this->speed  . "\n" .
                        "Health: "   . $this->health . "\n" .
                        "Strength: " . $this->strength . "\n" .
                        "Defence: "  . $this->defence . "\n" .
                        "Luck: "     . $this->luck . "\n";
        }

        
    }

?>