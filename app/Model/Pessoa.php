<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Pessoa extends AppModel {
    
    public $validate = array(
        'nome' => array(
            'notBlank' => array(
                'rule' => 'notBlank',
                'message' => 'Este campo é obrigatório'
            ),
            'Somente letras' => array(
                'rule' => '/^[a-zA-Z]/',
                'message' => 'Somente letras são permitidas'
            )),
        'idade' => array(
            'notBlank' => array(
                'rule' => 'notBlank',
                'message' => 'Este campo é obrigatório'),
            'Somente numeros' => array(
                'rule' => '/^[0-9]/',
                'message' => 'Somente letras são permitidas'
            )),
        'sexo' => array(
            'notBlank' => array(
                'rule' => 'notBlank',
                'message' => 'Este campo é obrigatório'),
            'Somente letras' => array(
                'rule' => '/^[a-zA-Z]/',
                'message' => 'Somente letras são permitidas'
            )),
        'profissao' => array(
            'notBlank' => array(
                'rule' => 'notBlank',
                'message' => 'Este campo é obrigatório'
                ),
            'Somente letras' => array(
                'rule' => '/^[a-zA-Z]/',
                'message' => 'Somente letras são permitidas'
            )));

}

?>
