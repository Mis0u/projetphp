<?php

namespace Lib;

class FormValidator{

    public function mail($mail): bool
    {
        $model =  "#^[^\W][a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\@[a-zA-Z0-9_]+(\.[a-zA-Z0-9_]+)*\.[a-zA-Z]{2,4}$#";
        return preg_match($model, $mail);
        
    }

    public function isNotEmpty($input): bool
    {
        return !empty($input);
    }
}