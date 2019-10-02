<?php

namespace Src\Controller;

class ControllerDisconnect{

    public function disconnect(){
        session_destroy();
        header("Location: /");
    }
}