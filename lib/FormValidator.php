<?php

namespace Lib;

class FormValidator{

    public function mail($mail)
    {
        $model =  "#^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$#";
        if ( preg_match($model, $mail)){
            return true;
        }
    }

    public function name($name)
    {
        $model =  "#^[a-zA-Z0-9\-|_]+$#";
        if ( preg_match( $model, $name)){
            return true;
        }
    }
}