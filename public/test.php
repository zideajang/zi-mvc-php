<?php

// 运行
spl_autoload_register('myAutoLoader');

function myAutoLoader($className){
    $path = "../includes/";
    $extension = ".class.php";
    $fullPath = $path . $className . $extension;
    require_once $fullPath;
}


$user = new User("tony", 28);
echo $user->name;
echo "<br>";