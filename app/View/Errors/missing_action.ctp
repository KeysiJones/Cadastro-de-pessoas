<?php 

echo '<div class="alert alert-danger">
                          Você solicitou uma página que não existe
                          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                          </button>
                      </div>';

echo $this->Html->link('Voltar à página inicial',['action' => 'index'], 
        ['class' => 'btn btn-dark']);

?>