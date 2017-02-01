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
    
    public $hasAndBelongsToMany = array(
        'Item' =>
            array(
                'className' => 'Item',
                //'joinTable' => 'items_weesh_lists',
                // 'foreignKey' => 'item_id',
                // 'associationForeignKey' => 'weesh_list_id',
                'unique' => 'keepExisting'
                // 'conditions' => '',
                // 'fields' => '',
                // 'order' => '',
                // 'limit' => '',
                // 'offset' => '',
                // 'finderQuery' => '',
                // 'with' => ''
            )
    );

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