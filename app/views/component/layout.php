<?php

$this->view('component/main/header');
$this->view($data['content'], ($data['data'] ?? ''));
$this->view('component/main/footer');