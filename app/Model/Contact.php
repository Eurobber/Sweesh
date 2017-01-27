<?php
/**
 * Created by PhpStorm.
 * User: alexis
 * Date: 27/01/2017
 * Time: 01:05
 */

App::uses('AppModel', 'Model');

class Contact extends AppModel
{
    public $validate = array(
        'site_name' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Un nom de site est requis'
            )
        ),
        'site_url' => array(
            'min'=> array(
                'rule' => array('minLength', '6'),
                'allowEmpty' => true,
                'message' => '6 caractères minimum'
            )
        ),
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
        ),
        'message' => array(
            'max'=> array(
                'rule' => array('maxLength', '2000'),
                'allowEmpty' => true,
                'message' => '2000 caractères maximum'
            )
        )
    );
}
?>