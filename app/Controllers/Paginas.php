<?php
class Paginas extends Controller
{
    public function index()
    {
        if (Sessao::estaLogado()) :
            URL::redirecionar('posts');
        endif;

        $dados = [
            'titulo' => 'Página Inicial',
        ];


        $this->view('paginas/home', $dados);
    }

    public function sobre()
    {

        $dados = [
            'titulo' => 'Sobre nós',
        ];

        $this->view('paginas/sobre', $dados);
    }
}
