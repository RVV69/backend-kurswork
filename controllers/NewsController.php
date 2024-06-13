<?php

namespace controllers;

use core\Controller;
use core\Template;

class NewsController extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }
    public function viewAction()
    {
        $tpl = new Template($this->viewPath);
        return $tpl->getHTML();
    }
    public function indexAction()
    {
        include($this->viewPath);
    }
}
