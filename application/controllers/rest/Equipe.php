<?php

defined('BASEPATH') or exit('No direct script access allowed');

use Restserver\Libraries\REST_Controller;
use Restserver\Libraries\REST_Controller_Definitions;

require APPPATH . '/libraries/REST_Controller.php';
require APPPATH . '/libraries/REST_Controller_Definitions.php';
require APPPATH . '/libraries/Format.php';

class Equipe extends REST_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Equipe_Model', 'eq');
    }

    public function equipe_get() {
        $id = (int) $this->get('id');
        if ($id <= 0) {
            $data = $this->eq->get();
        } else {
            $data = $this->eq->getOne($id);
        }
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

    public function equipe_put() {
        $id = (int) $this->get('id');
        if ((!$this->put('nome'))||($id<=0)) {
            $this->set_response([
                'status' => false,
                'error' => 'Campo não preenchidos'
                    ], REST_Controller_Definitions::HTTP_BAD_REQUEST);
            return;
        }
        $data = array(
            'nome' => $this->put('nome')
        );
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

    public function equipe_delete() {
        $id = (int) $this->get('id');
        if ($id <= 0) {
            $this->set_response([
                'status' => true,
                'message' => 'Equipe deletada com successo !'
                    ], Rest_Controller_Definitions::HTTP_BAD_REQUEST);
            return;
        }
        if ($this->eq->delete($id)) {
            $this->set_response([
                'status' => true,
                'message' => 'Usuário deletado com sucesso!'
                    ], Rest_Controller_Definitions::HTTP_OK);
        } else {
            $this->set_response([
                'status' => false,
                'error' => 'Falha ao deletar equipe'
                    ], Rest_Controller_Definitions::HTTP_BAD_REQUEST);
        }
    }

}

?>