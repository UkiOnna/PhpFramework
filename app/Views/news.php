<?php
/**
 * Created by PhpStorm.
 * User: СикировТ
 * Date: 26.09.2019
 * Time: 20:17
 */
use classes\Vars;

$titles=Vars::get("newsTitle");
$text=Vars::get("newsText");
foreach($titles as $key => $title){
       echo "<h4> {$titles[$key]} </h4>";
       echo  "$text[$key] <br>";
}
