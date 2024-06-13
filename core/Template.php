<?php

namespace core;

class Template{
    protected $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function getHTML(){
        ob_start();
        include($this->path);
        $html = ob_get_contents();
        ob_end_clean();
        return $html;
    }
}