<?php

class HomeController extends Controller{
    public function index()
    {
        $this->view('component/layout',[
            'content' => 'home/index'
        ]);
    }
}