<?php

function checkSeqADN($cad){
    $flag = true;
    $nuclComp = array(
        'a' => 't',
        't' => 'a',
        'c' => 'g',
        'g' => 'c'
    );
    $seqCheck = str_split($cad);
    foreach ($seqCheck as $check ) {
        if(!in_array($check, $nuclComp)){
            $flag = false;
        }
    }
    return $flag;
}

function checkSeqARN($cad){
    $flag = true;
    $nuclComp = array(
        'a' => 't',
        't' => 'a',
        'c' => 'u',
        'u' => 'c'
    );
    $seqCheck = str_split($cad);
    foreach ($seqCheck as $check ) {
        if(!in_array($check, $nuclComp)){
            $flag = false;
        }
    }
    return $flag;
}

echo checkSeqADN("actucucucuc");

?>