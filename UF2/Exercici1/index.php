<?php 

require_once "model/user.class.php";

function loadData(): array {
    $userList = array();

    array_push($userList, new User("u1","p1", "r1", "n1", "s1"));
    array_push($userList, new User("u2","p2", "r2", "n2", "s2"));
    array_push($userList, new User("u3","p3", "r3", "n3", "s3"));
    array_push($userList, new User("u4","p4", "r4", "n4", "s4"));
    array_push($userList, new User("u5","p5", "r5", "n5", "s5"));

    return $userList;
}

$myUserList = loadData();

foreach ($myUserList as $user) {

    $user -> setUsername("CACA");

    echo "<p>".$user."</p>";
}

?>