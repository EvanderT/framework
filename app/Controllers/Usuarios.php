<?php

class Usuarios extends Controller
{

    public function __construct()
    {
        $this->usuarioModel = $this->model('Usuario');
    }

    public function login()
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($formulario)) :
            $dados = [

                'email' => trim($formulario['email']),
                'senha' => trim($formulario['senha']),
            ];

            if (in_array('', $formulario)) :


                if (empty($formulario['email'])) :
                    $dados['erro_email'] = 'O campo "Email" é obrigatório!';
                endif;

                if (empty($formulario['senha'])) :
                    $dados['erro_senha'] = 'O campo "Senha" é obrigatório!';
                endif;
            else :

                if (Validator::validarEmail($formulario['email'])) :
                    $dados['erro_email'] = 'O email digitado é inválido!';

                else :

                    $usuario = $this->usuarioModel->verificarLogin($formulario['email'], $formulario['senha']);

                    //Se o usuário existir, cria a sessão e redireciona para a página inicial
                    if ($usuario) :
                        $this->criarSessaoUsuario($usuario);

                    else :
                        Sessao::mensagem('usuario', 'Usuário ou senha inválidos!', 'alert alert-danger text-center');

                    endif;


                endif;

            endif;

        else :
            $dados = [
                'email' => '',
                'senha' => '',
                'erro_email' => '',
                'erro_senha' => '',
            ];
        endif;

        $this->view('usuarios/login', $dados);
    }


    public function cadastrar()
    {
        $formulario = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        if (isset($formulario)) :
            $dados = [
                'nome' => trim($formulario['nome']),
                'email' => trim($formulario['email']),
                'senha' => trim($formulario['senha']),
                'confirmar_senha' => trim($formulario['confirmar_senha']),
            ];

            if (in_array('', $formulario)) :

                if (empty($formulario['nome'])) :
                    $dados['erro_nome'] = 'O campo "Nome" é obrigatório!';
                endif;

                if (empty($formulario['email'])) :
                    $dados['erro_email'] = 'O campo "Email" é obrigatório!';
                endif;

                if (empty($formulario['senha'])) :
                    $dados['erro_senha'] = 'O campo "Senha" é obrigatório!';
                endif;

                if (empty($formulario['confirmar_senha'])) :
                    $dados['erro_confirmar_senha'] = 'O campo "Confirmar Senha" é obrigatório!';
                endif;
            else :

                if (Validator::validarNome($formulario['nome'])) :
                    $dados['erro_nome'] = 'O nome digitado é inválido!';

                elseif (Validator::validarEmail($formulario['email'])) :
                    $dados['erro_email'] = 'O email digitado é inválido!';

                elseif ($this->usuarioModel->verificarEmail($formulario['email'])) :
                    $dados['erro_email'] = 'Já existe um usuário registrado com este email!';

                elseif (strlen($formulario['senha']) < 6) :
                    $dados['erro_senha'] = 'A senha deve ter no mínimo 6 caracteres!';

                elseif ($formulario['confirmar_senha'] != $formulario['senha']) :
                    $dados['erro_confirmar_senha'] = 'As senhas devem ser iguais!';



                else :

                    $dados['senha'] =  password_hash($formulario['senha'], PASSWORD_DEFAULT);


                    if ($this->usuarioModel->armazenar($dados)) :
                        Sessao::mensagem('usuario', 'Usuário cadastrado com sucesso!', 'alert alert-success text-center');
                        URL::redirecionar('usuarios/login');
                    else :
                        die("Erro ao cadastrar usuário!");
                    endif;

                endif;

            endif;

        else :
            $dados = [
                'nome' => '',
                'email' => '',
                'senha' => '',
                'confirmar_senha' => '',
                'erro_nome' => '',
                'erro_email' => '',
                'erro_senha' => '',
                'erro_confirmar_senha' => '',

            ];
        endif;

        $this->view('usuarios/cadastrar', $dados);
    }


    private function criarSessaoUsuario($usuario)
    {
        $_SESSION['usuario_id'] = $usuario->id;
        $_SESSION['usuario_nome'] = $usuario->nome;
        $_SESSION['usuario_email'] = $usuario->email;
        URL::redirecionar('posts');
    }

    public function sair()
    {
        unset($_SESSION['usuario_id']);
        unset($_SESSION['usuario_nome']);
        unset($_SESSION['usuario_email']);

        session_destroy();


        URL::redirecionar('usuarios/login');
    }
}
