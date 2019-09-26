<?php

namespace classes;

class Page
{
    private $page;

    public function __construct($page)
    {
        $this->page = $page;
    }

    public function show()
    {
        $dir = __DIR__ . DIRECTORY_SEPARATOR . ".." . DIRECTORY_SEPARATOR ."Views" . DIRECTORY_SEPARATOR;
        $dir .= $this->page;
        $dir=realpath($dir);
        if(file_exists($dir))
            include($dir);

    }
}