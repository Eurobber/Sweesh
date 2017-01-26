<?php

App::uses('AppModel', 'Model');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

class User extends AppModel {

    public function beforeSave($options = array()) {
        if (isset($this->data[$this->alias]['password'])) {
            $passwordHasher = new SimplePasswordHasher();
            $this->data[$this->alias]['password'] = $passwordHasher->hash(
                $this->data[$this->alias]['password']
            );
        }
        return true;
    }

    public $validate = array(
        'username' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Un nom d\'utilisateur est requis'
            )
        ),
        'firstname' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Un prénom passe est requis'
            )
        ),        
        'lastname' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Un nom est requis'
            )
        ),
        'gender' => array(
            'valid' => array(
                'rule' => array('inList', array('male', 'female')),
                'message' => 'Merci de rentrer un sexe valide',
                'allowEmpty' => false
            )
        ),
        'role' => array(
            'valid' => array(
                'rule' => array('inList', array('admin', 'simpleUser')),
                'message' => 'Merci de rentrer un rôle valide',
                'allowEmpty' => false
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Un mot de passe est requis',
            )
        ),
        'birthdate' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'La date de naissance est requise',
            )
        ),
        'street' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'L\'adresse est requise',
            )
        ),
        'city' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'La ville est requise',
            )
        ),
        'zipcode' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Le code postal est requis',
            )
        ),
        'email' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Un e-mail correct est exigé',
            )
        )
    );  
}
