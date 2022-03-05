<?php

class Posts extends Controller
{

    public function __construct()
    {
        if (!Sessao::estaLogado()) :
            URL::redirecionar('usuarios/login');
        endif;

        //definir o model do controlador
        $this->postModel = $this->model('Post');
        $this->usuarioModel = $this->model('Usuario');
    }

    public function index()
    {
        $dados = [
            'posts' => $this->postModel->lerPosts(),
        ];

        $this->view('posts/index', $dados);
    }

    public function cadastrar()
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($formulario)) :
            $dados = [
                'titulo' => trim($formulario['titulo']),
                'texto' => trim($formulario['texto']),
                'usuario_id' => $_SESSION['usuario_id'],
            ];

            if (in_array('', $formulario)) :

                if (empty($formulario['titulo'])) :
                    $dados['titulo_erro'] = 'Adicione um título ao post!';
                endif;
                if (empty($formulario['titulo'])) :
                    $dados['texto_erro'] = 'Adicione um texto ao post!';
                endif;
            else :

                if ($this->postModel->adicionar($dados)) :
                    Sessao::mensagem('post', 'Post cadastrado com sucesso!', 'alert alert-success text-center');
                    URL::redirecionar('posts');
                else :
                    die("Erro ao cadastrar Post!");
                endif;

            endif;

        else :
            $dados = [
                'titulo' => '',
                'texto' => '',
                'titulo_erro' => '',
                'texto_erro' => '',
            ];
        endif;



        $this->view('posts/cadastrar', $dados);
    }


    public function editar($id)
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($formulario)) :
            $dados = [
                'id' => $id,
                'titulo' => trim($formulario['titulo']),
                'texto' => trim($formulario['texto']),

            ];

            if (in_array('', $formulario)) :

                if (empty($formulario['titulo'])) :
                    $dados['titulo_erro'] = 'Adicione um título ao post!';
                endif;
                if (empty($formulario['titulo'])) :
                    $dados['texto_erro'] = 'Adicione um texto ao post!';
                endif;
            else :

                if ($this->postModel->atualizar($dados)) :
                    Sessao::mensagem('post', 'Post editado com sucesso!', 'alert alert-success text-center');
                    URL::redirecionar('posts');
                else :
                    die("Erro ao editar Post!");
                endif;

            endif;

        else :

            $post = $this->postModel->lerPostPorId($id);
            $dados = [
                'id' => $post->id,
                'titulo' => $post->titulo,
                'texto' => $post->texto,
                'titulo_erro' => '',
                'texto_erro' => '',
            ];
        endif;



        $this->view('posts/editar', $dados);
    }

    public function detalhe($id)
    {
        $post = $this->postModel->lerPostPorId($id);
        $usuario = $this->usuarioModel->lerUsuarioPorId($post->usuario_id);
        $dados = [
            'post' => $post,
            'usuario' => $usuario,
        ];
        $this->view('posts/detalhe', $dados);
    }
}
