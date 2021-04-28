<?php 

namespace batleSimulator;

require_once (__DIR__ . "\Warrior.php");

    class Brute extends Warrior
    {

        protected $specialSkillsValue = 0;
        protected $jumpTurn           = 0;


        public function __construct(){ 
            echo "called Warrior constructor \n"; 
            // echo $this->speed;
            $this->setInitalVal(); 
        }

        public function getName() {
            return $this->typeCombat;
        }

        public function specialsKills($enemy) : bool {

            $probability = $this->valutateProbability(30,2);

            if($probability == $this->getSpecialAttackBrute()){
                
                $damge = $this->getStrength() - $enemy->getDefence();
                $curHealth = $this->getHealth();

                $enemy->setHealth($enemy->getHealth() - $damge);

                echo "Brute special skills: Stunning shot, the warrior stuns the enemy, causing him to lose his next attack.\n";
                echo "The warrior: " . $enemy->getName() . " has a damage of: " . $damge .  " his health is: " . $enemy->getHealth()  . "\n";

                $this->setHealth($curHealth);
                $this->setStopOneTurn(true);

                $probability = 0;
                $this->setSpecialAttackBrute(0);

                return true;
            }
            $this->setSpecialAttackBrute(($this->getSpecialAttackBrute() + 1));

            return false;

        }


        public function setInitalVal(){
            $this->typeCombat   = "brute";
            $this->health       = $this->createRandomVal(90,100);
            $this->strength     = $this->createRandomVal(65,75);
            $this->defence      = $this->createRandomVal(40,50);
            $this->speed        = $this->createRandomVal(40,60);
            $this->luck         = ((float)(float)(0) . (float)rand(0,35) <= 0.9)     ? 
                                        ((float)(float)(0) . (float)rand(0,35)) / 10 : 
                                        ((float)(float)(0) . (float)rand(0,35)) /100;
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