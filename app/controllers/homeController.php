<?php
include_once $_SERVER['DOCUMENT_ROOT'].'/app/config/config.php';

if ($_POST['username']==='javier') {
    $user = array ('username' => $_POST['username'], 'lastname' => 'fraga');
    $this->load->view('events',$user);
    header("Location: /eventos");
} else {
    header("Location: /home");
}
