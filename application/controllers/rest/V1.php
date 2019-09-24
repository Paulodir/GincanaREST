<?php

/**
 * Implementação da API REST usando a biblioteca do link abaixo
 * Essa biblioteca possui 4 arquivos distintos:
 * 1- REST_Controller na pasta libraries, que altera o comportamento padrão do Codeigniter
 * 2- REST_Controller_Definitions na pasta libraries, que tras algumas definições para o REST_Controller,
 * trabalha como um arquivo de padrões auxiliando o controller principal
 * 3- Format na pasta libraries, que faz o parsing(conversão) dos diferentes tipos de dados (JSON, XML, CSV e etc)
 * 4- rest.php na pasta config, para as configurações desta biblioteca
 * 
 * @author  Ryan Yang 
 * @link    https://github.com/chriskacerguis/codeigniter-restserver
 */
use Restserver\Libraries\REST_Controller;
use Restserver\Libraries\REST_Controller_Definitions;

defined('BASEPATH') or exit('No direct script access allowed');

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/REST_Controller_Definitions.php';
require APPPATH . '/libraries/Format.php';

class V1 extends REST_Controller {

    public function __construct() {
        parent::__construct();
        // $this->load->model('Empresa_Model','em');
    }

    //o nome dos método sempre vem acompanhado do tipo de requisição
    //ou seja, contato_get significa que é uma requisição do tipo GET
    //e o usuário vai requisitar apenas /contato EX:http://127.0.0.1/wssenac/rest/V1/contato
    public function contato_get() {
        $retorno = [
            'status' => true,
            'nome' => 'ryan',
            'telefone' => '01010101',
            'error' => ''
        ];
        $this->set_response($retorno, REST_Controller_Definitions::HTTP_OK);
    }

    public function usuario_get() {
        $this->load->model('Usuario_Model', 'us');
        $data = $this->us->get();
        $this->set_response($data, REST_Controller_Definitions::HTTP_OK);
    }

    //usuario_post significa que este método vai ser executado
    //quando os WS(web-service) receber uma requisição do tipo 
    //POST na url 'usuario'
    public function usuario_post() {
        //Primeiro fazemos a validação, para verificar o preenchimento dos campos
        if ((!$this->post('nome')) || (!$this->post('senha')) || (!$this->post('nivel'))) {
            $this->set_response([
                'status' => false,
                'error' => 'Campo não preenchidos'
                    ], REST_Controller_Definitions::HTTP_BAD_REQUEST);
            return;
        }
        $data = array(
            'id' => $this->post('id'),
            'nome' => $this->post('nome'),
            'senha' => $this->post('senha'),
            'nivel' => $this->post('nivel'),
        );
        //carregamos o model, e mandamos inserir no DB 
        //os dados recebidos via POST
        $this->load->model('Usuario_Model', 'us');
        if ($this->us->insert($data)) {
            //deu certo 
            $this->set_response([
                'status' => true,
                'message' => 'Usuário inserido com successo !'
                    ], REST_Controller_Definitions::HTTP_OK);
        } else {
            //deu errado
            $this->set_response([
                'status' => false,
                'error' => 'Falha ao inserir usuário'
                    ], REST_Controller_Definitions::HTTP_BAD_REQUEST);
        }
    }
    //deletar
    public function usuario_delete($id) {
        $this->load->model('Usuario_Model', 'us');
        if ($this->us->delete($id)) {
            $this->set_response([
                'status' => true,
                'message' => 'Usuário deletado com successo !'
                    ], REST_Controller_Definitions::HTTP_OK);
        } else {
            $this->set_response([
                'status' => false,
                'error' => 'Falha ao deletar usuário'
                    ], REST_Controller_Definitions::HTTP_BAD_REQUEST);
        }
    }
    //alterar
    public function usuario_put($id) {
        if ((!$this->put('nome')) || (!$this->put('senha'))) {
            $this->set_response([
                'status' => false,
                'error' => 'Campo não preenchidos'
                    ], REST_Controller_Definitions::HTTP_BAD_REQUEST);
            return;
        }
        $data = array(
            'nome' => $this->put('nome'),
            'senha' => $this->put('senha'),
        );
        $this->load->model('Usuario_Model', 'us');
        if ($this->us->update($id, $data)) {
            //deu certo 
            $this->set_response([
                'status' => true,
                'message' => 'Usuário alterado com successo !'
                    ], REST_Controller_Definitions::HTTP_OK);
        } else {
            //deu errado
            $this->set_response([
                'status' => false,
                'error' => 'Falha ao alterar usuário'
                    ], REST_Controller_Definitions::HTTP_BAD_REQUEST);
        }
    }

    public function equipe_get() {
        $this->load->model('Equipe_Model', 'eq');
        $data = $this->eq->get();
        $this->set_response($data, REST_Controller_Definitions::HTTP_OK);
    }

    public function equipe_post() {
        //Primeiro fazemos a validação, para verificar o preenchimento dos campos
        if ((!$this->post('nome'))) {
            $this->set_response([
                'status' => false,
                'error' => 'Campo não preenchidos'
                    ], REST_Controller_Definitions::HTTP_BAD_REQUEST);
            return;
        }
        $data = array(
            'id' => $this->post('id'),
            'nome' => $this->post('nome'),
        );
        //carregamos o model, e mandamos inserir no DB 
        //os dados recebidos via POST
        $this->load->model('Equipe_Model', 'eq');
        if ($this->eq->insert($data)) {
            //deu certo 
            $this->set_response([
                'status' => true,
                'message' => 'Equipe inserida com successo !'
                    ], REST_Controller_Definitions::HTTP_OK);
        } else {
            //deu errado
            $this->set_response([
                'status' => false,
                'error' => 'Falha ao inserir equipe'
                    ], REST_Controller_Definitions::HTTP_BAD_REQUEST);
        }
    }

    public function equipe_put($id) {
        if ((!$this->put('nome'))) {
            $this->set_response([
                'status' => false,
                'error' => 'Campo não preenchidos'
                    ], REST_Controller_Definitions::HTTP_BAD_REQUEST);
            return;
        }
        $data = array(
            'nome' => $this->put('nome')
        );
        $this->load->model('Equipe_Model', 'eq');
        if ($this->eq->update($id, $data)) {
            //deu certo 
            $this->set_response([
                'status' => true,
                'message' => 'Equipe alterada com successo !'
                    ], REST_Controller_Definitions::HTTP_OK);
        } else {
            //deu errado
            $this->set_response([
                'status' => false,
                'error' => 'Falha ao alterar Equipe'
                    ], REST_Controller_Definitions::HTTP_BAD_REQUEST);
        }
    }

    public function equipe_delete($id) {
        $this->load->model('Equipe_Model', 'eq');
        if ($this->eq->delete($id)) {
            $this->set_response([
                'status' => true,
                'message' => 'Equipe deletada com successo !'
                    ], REST_Controller_Definitions::HTTP_OK);
        } else {
            $this->set_response([
                'status' => false,
                'error' => 'Falha ao deletar equipe'
                    ], REST_Controller_Definitions::HTTP_BAD_REQUEST);
        }
    }

    public function integrante_get() {
        $this->load->model('Integrante_Model', 'in');
        $data = $this->in->get();
        $this->set_response($data, REST_Controller_Definitions::HTTP_OK);
    }

    public function integrante_post() {
        //Primeiro fazemos a validação, para verificar o preenchimento dos campos
        if ((!$this->post('id_equipe')) || (!$this->post('nome')) || (!$this->post('data_nasc')) || (!$this->post('rg')) || (!$this->post('cpf'))) {
            $this->set_response([
                'status' => false,
                'error' => 'Campo não preenchidos'
                    ], REST_Controller_Definitions::HTTP_BAD_REQUEST);
            return;
        }
        $data = array(
            'id' => $this->post('id'),
            'id_equipe' => $this->post('id_equipe'),
            'nome' => $this->post('nome'),
            'data_nasc' => $this->post('data_nasc'),
            'rg' => $this->post('rg'),
            'cpf' => $this->post('cpf'),
        );
        //carregamos o model, e mandamos inserir no DB 
        //os dados recebidos via POST
        $this->load->model('Integrante_Model', 'in');
        if ($this->in->insert($data)) {
            //deu certo 
            $this->set_response([
                'status' => true,
                'message' => 'Integrante inserido com successo !'
                    ], REST_Controller_Definitions::HTTP_OK);
        } else {
            //deu errado
            $this->set_response([
                'status' => false,
                'error' => 'Falha ao inserir Integrante'
                    ], REST_Controller_Definitions::HTTP_BAD_REQUEST);
        }
    }
    public function integrante_put($id) {
        if ((!$this->put('id_equipe')) || (!$this->put('nome')) || (!$this->put('data_nasc')) || (!$this->put('rg')) || (!$this->put('cpf'))) {
            $this->set_response([
                'status' => false,
                'error' => 'Campo não preenchidos'
                    ], REST_Controller_Definitions::HTTP_BAD_REQUEST);
            return;
        }
        $data = array(
            'id_equipe' => $this->put('id_equipe'),
            'nome' => $this->put('nome'),
            'data_nasc' => $this->put('data_nasc'),
            'rg' => $this->put('rg'),
            'cpf' => $this->put('cpf')
        );
        $this->load->model('Integrante_Model', 'in');
        if ($this->in->update($id, $data)) {
            //deu certo 
            $this->set_response([
                'status' => true,
                'message' => 'Integrante alterado com successo !'
                    ], REST_Controller_Definitions::HTTP_OK);
        } else {
            //deu errado
            $this->set_response([
                'status' => false,
                'error' => 'Falha ao alterar Integrante'
                    ], REST_Controller_Definitions::HTTP_BAD_REQUEST);
        }
    }

    public function integrante_delete($id) {
        $this->load->model('Integrante_Model', 'in');
        if ($this->in->delete($id)) {
            $this->set_response([
                'status' => true,
                'message' => 'Integrante deletado com successo !'
                    ], REST_Controller_Definitions::HTTP_OK);
        } else {
            $this->set_response([
                'status' => false,
                'error' => 'Falha ao deletar Integrante'
                    ], REST_Controller_Definitions::HTTP_BAD_REQUEST);
        }
    }

    public function pontuacao_get() {
        $this->load->model('Pontuacao_Model', 'po');
        $data = $this->po->get();
        $this->set_response($data, REST_Controller_Definitions::HTTP_OK);
    }
    
    public function pontuacao_post() {
        //Primeiro fazemos a validação, para verificar o preenchimento dos campos
        if ((!$this->post('id_equipe')) || (!$this->post('id_prova')) || (!$this->post('id_usuario')) || (!$this->post('pontos')) || (!$this->post('data_hora'))) {
            $this->set_response([
                'status' => false,
                'error' => 'Campo não preenchidos'
                    ], REST_Controller_Definitions::HTTP_BAD_REQUEST);
            return;
        }
        $data = array(
            'id' => $this->post('id'),
            'id_equipe' => $this->post('id_equipe'),
            'id_prova' => $this->post('id_prova'),
            'id_usuario' => $this->post('id_usuario'),
            'pontos' => $this->post('pontos'),
            'data_hora' => $this->post('data_hora'),
        );
        //carregamos o model, e mandamos inserir no DB 
        //os dados recebidos via POST
        $this->load->model('Pontuacao_Model', 'po');
        if ($this->po->insert($data)) {
            //deu certo 
            $this->set_response([
                'status' => true,
                'message' => 'Pontuação inserida com successo !'
                    ], REST_Controller_Definitions::HTTP_OK);
        } else {
            //deu errado
            $this->set_response([
                'status' => false,
                'error' => 'Falha ao inserir Pontuação'
                    ], REST_Controller_Definitions::HTTP_BAD_REQUEST);
        }
    }  
    
    public function pontuacao_put($id) {
        if ((!$this->put('id_equipe')) || (!$this->put('id_prova')) || (!$this->put('id_usuario')) || (!$this->put('pontos')) || (!$this->put('data_hora'))) {
            $this->set_response([
                'status' => false,
                'error' => 'Campo não preenchidos'
                    ], REST_Controller_Definitions::HTTP_BAD_REQUEST);
            return;
        }
        $data = array(
            'id' => $this->put('id'),
            'id_equipe' => $this->put('id_equipe'),
            'id_prova' => $this->put('id_prova'),
            'id_usuario' => $this->put('id_usuario'),
            'pontos' => $this->put('pontos'),
            'data_hora' => $this->put('data_hora')
        );
        $this->load->model('Pontuacao_Model', 'po');
        if ($this->po->update($id, $data)) {
            //deu certo 
            $this->set_response([
                'status' => true,
                'message' => 'Pontuação alterada com successo !'
                    ], REST_Controller_Definitions::HTTP_OK);
        } else {
            //deu errado
            $this->set_response([
                'status' => false,
                'error' => 'Falha ao alterar Pontuação'
                    ], REST_Controller_Definitions::HTTP_BAD_REQUEST);
        }
    }
    
    public function pontuacao_delete($id) {
        $this->load->model('Pontuacao_Model', 'po');
               if ($this->po->delete($id)) {
            $this->set_response([
                'status' => true,
                'message' => 'Integrante deletado com successo !'
                    ], REST_Controller_Definitions::HTTP_OK);
        } else {
            $this->set_response([
                'status' => false,
                'error' => 'Falha ao deletar Integrante'
                    ], REST_Controller_Definitions::HTTP_BAD_REQUEST);
        }
    }
    
    public function prova_get() {
        $this->load->model('Prova_Model', 'pr');
        $data = $this->pr->get();
        $this->set_response($data, REST_Controller_Definitions::HTTP_OK);
    }
    
    public function prova_post() {
        //Primeiro fazemos a validação, para verificar o preenchimento dos campos
        if ((!$this->post('nome')) || (!$this->post('descricao')) || (!$this->post('num_int'))) {
            $this->set_response([
                'status' => false,
                'error' => 'Campo não preenchidos'
                    ], REST_Controller_Definitions::HTTP_BAD_REQUEST);
            return;
        }
        $data = array(
            //'id' => $this->post('id'),
            'nome' => $this->post('nome'),
            'descricao' => $this->post('descricao'),
            'num_int' => $this->post('num_int')
        );
        //carregamos o model, e mandamos inserir no DB 
        //os dados recebidos via POST
        $this->load->model('Prova_Model', 'pr');
        if ($this->pr->insert($data)) {
            //deu certo 
            $this->set_response([
                'status' => true,
                'message' => 'Equipe inserida com successo !'
                    ], REST_Controller_Definitions::HTTP_OK);
        } else {
            //deu errado
            $this->set_response([
                'status' => false,
                'error' => 'Falha ao inserir equipe'
                    ], REST_Controller_Definitions::HTTP_BAD_REQUEST);
        }
    }

    public function prova_put($id) {
        if ((!$this->put('nome')) || (!$this->put('descricao')) || (!$this->put('num_int'))) {
            $this->set_response([
                'status' => false,
                'error' => 'Campo não preenchidos'
                    ], REST_Controller_Definitions::HTTP_BAD_REQUEST);
            return;
        }
        $data = array(
            'nome' => $this->put('nome'),
            'descricao' => $this->put('descricao'),
            'num_int' => $this->put('num_int')
        );
        $this->load->model('Prova_Model', 'pr');
        if ($this->pr->update($id, $data)) {
            //deu certo 
            $this->set_response([
                'status' => true,
                'message' => 'Prova alterada com successo !'
                    ], REST_Controller_Definitions::HTTP_OK);
        } else {
            //deu errado
            $this->set_response([
                'status' => false,
                'error' => 'Falha ao alterar Prova'
                    ], REST_Controller_Definitions::HTTP_BAD_REQUEST);
        }
    }

    public function prova_delete($id) {
        $this->load->model('Prova_Model', 'pr');
        if ($this->pr->delete($id)) {
            $this->set_response([
                'status' => true,
                'message' => 'Prova deletada com successo !'
                    ], REST_Controller_Definitions::HTTP_OK);
        } else {
            $this->set_response([
                'status' => false,
                'error' => 'Falha ao deletar Prova'
                    ], REST_Controller_Definitions::HTTP_BAD_REQUEST);
        }
    }


}
