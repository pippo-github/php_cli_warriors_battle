<?php 

namespace batleSimulator;

require_once (__DIR__ . "\Warrior.php");

    class Grappler extends Warrior
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

            $randomProbability = rand(1,100);

            if($randomProbability == 1){
                echo "Grappler special skills: Counterattack, the warrior cannot be hit, and the opponent takes 10 damage\n";
                $enemy->setHealth($enemy->getHealth() - 10);
                return true;

            }

            return false;
        }

        public function setInitalVal(){
            $this->typeCombat   = "grappler";
            $this->health       = $this->createRandomVal(60,100);
            $this->strength     = $this->createRandomVal(75,80);
            $this->defence      = $this->createRandomVal(35,40);
            $this->speed        = $this->createRandomVal(60,80);
            $this->luck         = (float)rand(3,4) / 10;
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