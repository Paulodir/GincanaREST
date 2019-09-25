<?php

defined('BASEPATH') or exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;
use Restserver\Libraries\REST_Controller_Definitions;

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/REST_Controller_Definitions.php';
require APPPATH . '/libraries/Format.php';

class Integrante extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Integrante_model', 'in');
    }

    public function integrante_get() {
        $id = (int) $this->get('id');
        if ($id <= 0) {
            $data = $this->eq->get();
        } else {
            $data = $this->eq->getOne($id);
        }
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
    
    public function integrante_put() {
        
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

    public function integrante_delete() {
        
        
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

}

?>