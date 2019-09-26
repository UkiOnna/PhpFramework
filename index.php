<?php


use classes\Page;
use classes\Vars;
use Klein\Klein;
use Medoo\Medoo;

include "vendor/autoload.php";


$router = new Klein();


$router->respond("GET", "/?", function () {
    $cfg = include "database.php";
    $db = new Medoo($cfg);
    $id = $_GET["id"];
    if ($id === null) {
        $news = $db->select("news", "*");
        $titles = [];
        $contents = [];

        foreach ($news as $new) {
            foreach ($new as $key => $value) {
                if ($key == "title") {
                    $titles[] = $value;
                } elseif ($key == "content") {
                    $contents[] = $value;
                }
            }
        }
    } else {
        $news = $db->get("news", "*", [
            'id' => $id
        ]);
        $titles[] = $news["title"];
        $contents[] = $news["content"];
    }
    Vars::set("newsTitle", $titles);
    Vars::set("newsText", $contents);
    $page = new Page("news.php");
    Vars::set("title", "News");
    Vars::set("content", $page->show());

    include "app/Views/layout.php";

});

$router->respond("GET", "/create/?", function () {

    $cfg = include "database.php";
    $db = new Medoo($cfg);
    $title = $_GET["title"];
    $content = $_GET["content"];
    if ($title != null && $content != null) {
        $db->insert("news",
            [
                "content" => $content,
                "title" => $title
            ]);
        echo "Added";
    }
    else{
        $page = new Page("newsCreate.html");
        Vars::set("title", "NewsCreate");
        Vars::set("content", $page->show());
        include "app/Views/layout.php";
    }
});

$router->respond("GET", "/update/?", function () {

    $cfg = include "database.php";
    $db = new Medoo($cfg);
    $id = $_GET["id"];
    if ($id===null) {
        header("location:/");
    }
    else{
        $news = $db->get("news", "*", [
            'id' => $id
        ]);
        $titles[] = $news["title"];
        $contents[] = $news["content"];
        Vars::set("newsId",$id);
        Vars::set("newsTitle", $titles[0]);
        Vars::set("newsText", $contents[0]);
        $page = new Page("updateNews.php");
        Vars::set("title", "NewsUpdate");
        Vars::set("content", $page->show());
        include "app/Views/layout.php";
    }
});

$router->respond("POST", "/update/?", function () {

    $cfg = include "database.php";
    $db = new Medoo($cfg);
    $id = $_GET["id"];
    $db->update("news",[
        "id"=>$id
    ],[
        "title"=> $_GET["title"],
        "content"=>$_GET["content"]
    ]);
    header("location:/");

});

//$router->get("/?",function (){
//    return "ABout";
//});

$router->dispatch();
