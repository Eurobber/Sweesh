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
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'message' => 'Ce nom d\'utilisateur est déjà pris'
            ),
            'alphaNum' => array(
                'rule' => 'alphanumeric',
                'message' => 'Chiffres et lettres uniquement')
        ),
        'firstname' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Un prénom passe est requis'
            ),
            'alphaNum' => array(
                'rule' => 'alphanumeric',
                'message' => 'Chiffres et lettres uniquement')
        ),        
        'lastname' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Un nom est requis'
            ),
            'alphaNum' => array(
                'rule' => 'alphanumeric',
                'message' => 'Chiffres et lettres uniquement')
        ),
        'gender' => array(
            'valid' => array(
                'rule' => array('inList', array('male', 'female')),
                'message' => 'Merci de rentrer un sexe valide',
                'allowEmpty' => false
            )
        ),
        'password' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Un mot de passe est requis',
            ),
            'min'=> array(
                'rule' => array('minLength', '6'),
                'message' => '6 caractères minimum'
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
            ),
            'Num' => array(
                'rule' => 'numeric',
                'message' => 'Chiffres uniquement')
        ),
        'email' => array(
            'required' => array(
                'rule' => 'notBlank',
                'allowEmpty' => false,
                'message' => 'Un e-mail correct est requis',
            ),
            'unique' => array(
                'rule' => 'isUnique',
                'message' => 'Ce mail est déjà pris'
            ),
            'email' => array(
                'rule' => array('email', true),
                'message' => 'Entrez une adresse email valide'
            )
        )
    );  
}
