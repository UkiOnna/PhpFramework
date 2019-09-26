<?php
use classes\Vars;
?>

<form action="/update/?" method="post">
    <span>Title:</span>
    <input type="text" name="title" value="<?=Vars::get("newsTitle")?>"><br>
    <span>Text</span>
    <input type="text" name="content" value="<?=Vars::get("newsText")?>"><br>
    <input type="hidden" name="id"value="<?=Vars::get("newsId")?>">
    <input type="submit" value="Update">
</form>