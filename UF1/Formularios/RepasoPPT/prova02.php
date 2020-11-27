<?php

$x = '2';
var_dump($x);
$y = '3';
var_dump($y);
$z = $x + $y;
var_dump($z);

echo "HOLA $z";

$list = array(1,2,3,4,5,6);

var_dump($list);

foreach ($list as $elem) {
    echo $elem;
}
$paises = array(
    "Lisboa" => "Portugal",
    "Londres" => "Regne Unit"
);

foreach ($paises as $key => $value) {
    echo $key . "->" . $value;
}


echo "<pre>";
$a = array ('a' => 'manzana', 'b' => 'banana', 'c' => array ('x' => 'aa', 'y' => 'aaa', 'z' => 'aaaa'));
print_r ($a);
echo "</pre>";


echo "<pre>";
print_r ( $_SERVER );
var_dump ( $_SERVER );
echo "</pre>";

