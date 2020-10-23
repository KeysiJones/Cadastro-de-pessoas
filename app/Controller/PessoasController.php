<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class PessoasController extends AppController {
    public function index(){
        $this->set('pessoas', $this->Pessoa->find('all'));
    }
    
    public function cadastrar(){
        
        if($this->request->is(array('post','put'))){
            //var_dump($this->request->data);
            $this->Pessoa->create();
            
            if($this->Pessoa->save($this->request->data)){
                echo '<div class="alert alert-success">
                        Registro cadastrado com sucesso
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                      </div>';
                return $this->redirect(array('controller' => 'pessoas','action' => 'index'));
                
            } else {
                echo '<div class="alert alert-danger">
                          Não foi possivel cadastrar esta pessoa, verifique os campos em vermelho abaixo
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                          </button>
                      </div>';
            }
        }
    }
}

?>
