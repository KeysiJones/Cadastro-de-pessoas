<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
App::uses('app','controller');
class PessoasController extends AppController {

    public $helpers = ['Form','Html','Js','Mensagem','time'];
    public $components = ['Session','Paginator','RequestHandler'];
    public function index(){
        $this->set('pessoas', $this->Pessoa->find('all'));
    }
    
    public function cadastrar(){

        if($this->request->is(array('post','put'))){

            $this->Pessoa->create();
            
            if($this->Pessoa->save($this->request->data)){
                echo '<div class="alert alert-success">
                        Registro cadastrado com sucesso
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                      </div>';
                return $this->redirect(['controller' => 'pessoas','action' => 'index']);
                
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
    
    public function editar($id = null){

        //lógica para quando estiver entrando na tela pelo menu
        if($this->request->is('get')){
            if(!$id){
                return $this->redirect(['controller' => 'pessoas','action' => 'index']);
            }
        }

            $backupPessoa = $this->Pessoa->findById($id);

            //Verifica se existe alguma pessoa com este Id informado
            if(!empty($backupPessoa)){
                //evita que sejam criados registros duplicados no banco de dados

                $this->Pessoa->id = $id;

                if(!$this->request->data){
                    $this->request->data = $backupPessoa;
                }

                if($this->request->is(['post','put'])){

                    if($this->Pessoa->save($this->request->data)){
                        
                        $diferenca = array_diff($this->request->data['Pessoa'],$backupPessoa['Pessoa']);

                        //Se não há diferença nos dados então não houve edição
                        if(count($diferenca) == 0) {

                            echo '<div class="alert alert-danger">
                                    Nada foi editado, edite algo antes de tentar salvar ou clique em <b><em>voltar</em></b>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>';

                        } else {
                            echo "<div class='alert alert-success'>Cadastro editado com sucesso
                                    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                        <span aria-hidden='true'>&times;</span>
                                    </button>
                                </div>";

                            return $this->redirect(['controller' => 'pessoas','action' => 'index']);
                        }     
                    }
                } 

            } else {
                    echo $this->Session->setFlash(
                    "<div class='alert alert-danger'>Funcionário não encontrado
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                    </div>"
                );
            }
        }

        public function detalhar($id = null){

            if($this->request->is('get')){

                if(!$id){
                    return $this->redirect(['controller' => 'pessoas', 'action' => 'index']);
                }

                $pessoaDesejada = $this->Pessoa->findById($id);
                
                if($pessoaDesejada){
                    $this->set('pessoa', $pessoaDesejada);
                } else {
                    echo $this->Session->setFlash('<div class="alert alert-danger">Não encontramos esta pessoa na nossa base de dados</div>');
                }
            }
        }

        public function deletar($id = null){
            $this->Render = false;
            
            if($this->request->is('post')){
                if(!$id){
                    return $this->redirect(['controller' => 'pessoas', 'action' => 'index']);
                }

                $pessoaDesejada = $this->Pessoa->findById($id);

                if($pessoaDesejada){
                    if($this->Pessoa->delete($id)){
                        echo $this->Session->setFlash("<div class='alert alert-success'>Cadastro deletado com sucesso
                                <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                                <span aria-hidden='true'>&times;</span>
                                </button>
                            </div>");
                        return $this->redirect(['controller' => 'pessoas','action' => 'index']);
                    }
                } else {
                    echo $this->Session->setFlash('<div class="alert alert-danger">Não encontramos esta pessoa na nossa base de dados</div>');
                    return $this->redirect(['controller' => 'pessoas','action' => 'index']);
                }
            } else {
                echo $this->Session->setFlash('<div class="alert alert-danger">Não é possível deletar um cadastro pela URL, utilize o menu <b>ações</b>, opção <b>deletar</b></div>');
                return $this->redirect(['controller' => 'pessoas', 'action' => 'index']);
            }
        }
    }
?>
