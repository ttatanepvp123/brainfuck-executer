<?php

function Brainfuck(String $code = null){
    $variable = [0,0,0,0,0,0,0,0,0,0,0,0,0,0];
    $pointer = 0;
    $returner = "";
    $loopNumber = 0;
    if (substr_count($code, '[') != substr_count($code, ']')) {
        return "ERROR : a loop is not closed";
    }
    for ($i=0; $i < strlen($code); $i++) { 
        if($code[$i] == '+') {
            $variable[$pointer]++;
        } else if($code[$i] == '-') {
            $variable[$pointer]--;
        } else if($code[$i] == '>') {
            if (($pointer + 1) <= (count($variable) - 1)) {
                $pointer++;
            } else {
                return "ERROR : variable limit to exceed";
            }
        } else if($code[$i] == '<') {
            if (($pointer - 1) >= 0) {
                $pointer--;
            } else {
                return "ERROR : the pointer can not be below 0";
            }
        } else if($code[$i] == '.') {
            $returner .= chr($variable[$pointer]);
        } else if($code[$i] == ',') {
            $returner .= $variable[$pointer];
        } else if ($code[$i] == ']'){
            if ($variable[$pointer] != 0){
                $loopNumber = 1;
                while ($loopNumber != 0) {
                    $i--;
                    if ($code[$i] == ']'){
                        $loopNumber += 1;
                    } else if ($code[$i] == '[') {
                        $loopNumber -= 1;
                    }
                }
            }
        }
    }
    return $returner;
}

?>