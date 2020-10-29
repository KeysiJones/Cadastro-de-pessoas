<?php

    echo $this->Html->tag('h1', 'Edição',array('class' => 'text-center'));
    echo $this->Form->create('Pessoa',array('class' => 'form-group'));
?>
<div class ='formulario'>
    <?php
    echo $this->Form->input('nome',array('class' => 'form-control'));
    echo $this->Form->input('idade',array('class' => 'form-control'));
    echo $this->Form->input('sexo',array('class' => 'form-control'));
    echo $this->Form->input('profissao',['class' => 'form-control','label' => 'Profissão']);
    echo $this->Js->submit('Salvar alterações',array(
        'update' => '#content',
        'class' => 'btn btn-primary',
        'confirm' => 'Deseja salvar os dados ?',
        'style' => 'margin-top:20px'
        ));
    ?>
</div>
<?php
    echo $this->Js->writeBuffer();
?>