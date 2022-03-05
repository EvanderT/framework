<?php


class Sessao
{
    public static function mensagem($nome, $texto = null, $classe = null)
    {
        if (!empty($nome)) :

            if (!empty($texto) && empty($_SESSION[$nome])) :
                if (!empty($_SESSION[$nome])) :
                    unset($_SESSION[$nome]);
                endif;

                $_SESSION[$nome] = $texto;
                $_SESSION[$nome . 'Classe'] = $classe;

            elseif (!empty($_SESSION[$nome]) && empty($texto)) :
                $classe = !empty($_SESSION[$nome . 'Classe']) ? $_SESSION[$nome . 'Classe'] : 'alert alert-success';

                echo '<div class="' . $classe . '">' . $_SESSION[$nome] . '</div>';

                unset($_SESSION[$nome]);
                unset($_SESSION[$nome . 'Classe']);
            endif;
        endif;
    }


    public static function estaLogado()
    {

        if (isset($_SESSION['usuario_id'])) :
            return true;
        else :
            return false;
        endif;
    }
}
