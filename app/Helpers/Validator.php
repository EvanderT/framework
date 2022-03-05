<?php

class Validator
{

    //Validação de nome apenas

    public static function validarNome($nome)
    {
        if (!preg_match('/[A-Z][a-z]* [A-Z][a-z]*/', $nome)) :
            return true;
        else :
            return false;
        endif;
    }

    public static function validarEmail($email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) :
            return true;
        else :
            return false;
        endif;
    }
}
