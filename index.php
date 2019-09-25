<?php


use Medoo\Medoo;

include "vendor/autoload.php";
//
//function callClass($name)
//{
//    $name = Inflector::classify($name);;
//    if (!class_exists($name)) {
//        echo "NO";
//        exit();
//    }
//
//    $class=new $name();
//
//    if(!method_exists($class,"getName")){
//        echo "METHOD";
//        exit();
//    }
//    return $class->getName();
//}
//
//echo callClass("first");

$cfg=include "database.php";
$db=new Medoo($cfg);

$db->delete("users",[
    "username"=>"manager"
]);
//$db->insert("users",[
//   "username"=>"manager",
//   "name"=>"LEXA",
//   "password"=>"123"
//]);

$db->update("users",[
    "name"=>"BORYA"
],[
    "username"=>"manager"
]);
$users=$db->select("users","*");
foreach ($users as$user){
    foreach ($user as $key=>$value){
        echo "$key => $value <br>";
    }
    echo "<hr />";
}
print_r($users);