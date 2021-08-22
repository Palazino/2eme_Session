<?php

function grainDeSel($x){
        
    $chars = "0123456789abcdef";

    $string = "";

    

    for ($i=0; $i < $x; $i++) { 

        $string .= $chars[rand(0,strlen($chars)-1)];

    }

    return $string;

}

?>