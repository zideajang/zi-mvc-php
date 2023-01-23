<?php

// 匿名函数做回调函数
$arr = [1,2,3];
$arr2 = array_map(function ($ele) {
    return $ele * 3;
}, $arr);



// echo '<pre>';
// print_r($arr2);
// echo '</pre>';
$sum = function ($callback, ...$numbers) {
    return $callback(array_sum($numbers));
};

$func = function(){
    return "call callback function";
};
echo '<pre>';
echo $func();
echo '</pre>';