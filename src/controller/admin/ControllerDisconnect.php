<?php

namespace Src\Controller\admin;

class ControllerDisconnect{

    public function disconnect(){
        session_destroy();
        header("Location: /");
    }
}