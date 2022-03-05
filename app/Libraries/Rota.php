<?php

class Rota
{

    private $controlador = 'Paginas';
    private  $metodo = 'index';
    private $parametros = [];

    public function __construct()
    {
        $url = $this->url() ? $this->url() : [0];


        //Verificar se o controlador existe
        if (file_exists('../app/Controllers/' . ucwords($url[0]) . '.php')) :
            $this->controlador = ucwords($url[0]);
            unset($url[0]);
        endif;

        require_once '../app/Controllers/' . $this->controlador . '.php';

        $this->controlador = new $this->controlador;

        //Verificar se o método existe dentro do controlador
        if (isset($url[1])) :
            if (method_exists($this->controlador, $url[1])) :
                $this->metodo = $url[1];
                unset($url[1]);
            endif;
        endif;

        //Verificar se os parámetros existem
        $this->parametros = $url ? array_values($url) : [];

        call_user_func_array([$this->controlador, $this->metodo], $this->parametros);

        //var_dump($this);
    }

    private function url()
    {

        $url = filter_input(INPUT_GET, 'url', FILTER_SANITIZE_URL);

        if (isset($url)) :
            $url = trim(rtrim($url, '/'));
            $url = explode('/', $url);

            return $url;
        endif;
    }
}