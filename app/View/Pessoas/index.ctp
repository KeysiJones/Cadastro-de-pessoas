
<?php echo $this->Html->tag('h1','Lista de pessoas cadastradas', array('class' => 'text-center'));?>
<table class="table table-striped">
    <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Idade</th>
      <th scope="col">Sexo</th>
      <th scope="col">Profissão</th>
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
        </tr>
        <?php
      }
      ?>
  </tbody>
</table>