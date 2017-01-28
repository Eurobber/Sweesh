<?php
/**
 * Created by PhpStorm.
 * User: alexis
 * Date: 28/01/2017
 * Time: 12:27
 */

App::uses('AppModel', 'Model');

class NewsLetter extends AppModel
{
    public $validate = array(
        'email' => array(
            'min'=> array(
                'rule' => array('minLength', '4'),
                'allowEmpty' => true,
                'message' => '4 caractères minimum'
            ),
            'email' => array(
                'rule' => array('email', true),
                'allowEmpty' => true,
                'message' => 'Entrez une adresse email valide'
            )
        )
    );
}
?>