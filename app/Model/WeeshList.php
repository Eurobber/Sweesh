<?php
/**
 * Created by PhpStorm.
 * User: alexis
 * Date: 29/01/2017
 * Time: 11:46
 */
App::uses('AppModel', 'Model');

class WeeshList extends AppModel
{
    public $useTable  = 'weesh_lists';
    public $belongTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id'
        ));

    public $validate = array(
        'name' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Un nom de weeshlist est requis'
            ),
            'unique' => array(
                'rule' => 'uniqueNamePerUser',
                'message' => 'Ce nom de weeshlist existe déjà pour cet utilisateur'
            )
        )
    );

    // Valide si le titre de la weeshlist n'existe pas déjà pour cet utilisateur
    public function uniqueNamePerUser($data) {
        return !$this->find('first', 
            array('conditions' => array('WeeshList.user_id' => $this->data[$this->name]['user_id'], 'WeeshList.name' => $this->data[$this->name]['name'])));
    }
}
?>