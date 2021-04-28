<?php

 function randomNUm($min, $man){

    return rand($min, $man) . "\n";
 }

 for($i=0; $i<22;$i++)
 echo randomNUm(3,5)/10 . "\n";

?>