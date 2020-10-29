
<?php echo $this->Html->tag('h1','Lista de pessoas cadastradas', array('class' => 'text-center'));

 if (!empty($pessoas)){ ?>
    <table class="table table-striped">
      <thead class="thead-dark">
      <tr>
        <th scope="col">Cod</th>
        <th scope="col">Nome</th>
        <th scope="col">Idade</th>
        <th scope="col">Sexo</th>
        <th scope="col">Profissão</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach ($pessoas as $pessoa){ ?>
           <tr>
              <th scope="row"><?php echo $pessoa['Pessoa']['id'];?></th>
              <td><?php echo $pessoa['Pessoa']['nome'];?></td>
              <td><?php echo $pessoa['Pessoa']['idade'];?></td>
              <td><?php echo $pessoa['Pessoa']['sexo'];?></td>
              <td><?php echo $pessoa['Pessoa']['profissao'];?></td>
              <td>
                <div class="dropdown show">
                  <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Ações
                  </a>

                  <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                    <?php 

                    echo $this->Js->link('Detalhar', ['controller' => 'pessoas','action' => 'detalhar', $pessoa['Pessoa']['id']], 
                      ['class' => 'dropdown-item', 'update' => '#content',
                      'before' => '$("#content").html("Carregando...espere")',
                      'error' => '$("#content").html("Aconteceu o seguinte erro: " + errorThrown + "... Avise à equipe de desenvolvimento e por favor volte à tela inicial e tente novamente mais tarde");',
                      '']);
                    
                    echo $this->Js->link('Editar', ['controller' => 'pessoas','action' => 'editar', $pessoa['Pessoa']['id']], 
                    ['class' => 'dropdown-item', 'update' => '#content',
                    'before' => '$("#content").html("Carregando...espere")',
                    'error' => '$("#content").html("Aconteceu o seguinte erro: " + errorThrown + "... Avise à equipe de desenvolvimento e por favor volte à tela inicial e tente novamente mais tarde");']);

                    echo $this->Form->postLink('Deletar', ['action' => 'deletar', $pessoa['Pessoa']['id']],
                    ['confirm' => 'tem certeza ?', 'class' => 'dropdown-item']);

                    ?>
                  </div>
                </div>
              </td>
          </tr>
          <?php
        }
        ?>
    </tbody>
  </table>
 <?php 
  echo $this->Js->writeBuffer();
} else {
    echo $this->Mensagem->info('Não há cadastros na base de dados !');
}

?>
  