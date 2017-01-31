<?php
/**
 * Created by PhpStorm.
 * User: alexis
 * Date: 29/01/2017
 * Time: 21:49
 */

App::uses('AppModel', 'Model');

class Item extends AppModel
{
    public $useTable  = 'items';

    // A décommenter si on veut pouvoir retourner les weeshlists associés en même temps qu'un item
    // public $hasAndBelongsToMany = array(
    //     'WeeshList' =>
    //         array(
    //             'className' => 'WeeshList',
    //             //'joinTable' => 'items_weesh_lists',
    //             // 'foreignKey' => 'item_id',
    //             // 'associationForeignKey' => 'weesh_list_id',
    //             // 'unique' => true,
    //             // 'conditions' => '',
    //             // 'fields' => '',
    //             // 'order' => '',
    //             // 'limit' => '',
    //             // 'offset' => '',
    //             // 'finderQuery' => '',
    //             // 'with' => ''
    //         )
    // );

    public $validate = array(
        'isbn' => array(
            'unique' => array(
                'rule' => 'isUnique',
                'message' => 'Un item avec cet ISBN existe déjà'
            )
        ),
        'ean' => array(
            'unique' => array(
                'rule' => 'isUnique',
                'message' => 'Un item avec cet EAN existe déjà'
            )
        ),
        'brand' => array(
        	'brandmodel' => array(
                'rule' => array('isBrandModelComplete'),
                'message' => 'Pour un item, un brand doit être renseigné avec un model'
            ),
            'unique' => array(
                'rule' => array('isUnique', array('brand', 'model'), false),
                'message' => 'Cette combinaison brand/model d\'item existe déjà'
            )
        ),
        'model' => array(
        	'brandmodel' => array(
                'rule' => array('isBrandModelComplete'),
                'message' => 'Pour un item, un model doit être renseigné avec un brand'
            ),
            'unique' => array(
                'rule' => array('isUnique', array('brand', 'model'), false),
                'message' => 'Cette combinaison brand/model d\'item existe déjà'
            )
        )
    );

	// Une marque est néessairement renseignée avec un modèle et vice-versa
    public function isBrandModelComplete($data) {
    	if (!empty($this->data[$this->name]['brand']) || !empty($this->data[$this->name]['model'])) {
    		if (!empty($this->data[$this->name]['brand']) && !empty($this->data[$this->name]['model'])) {
    			return true;
    		}
    	}
    	return false;
    }

    // Au moins l'un des identifiants doit être renseigné (isbn/ean/brand&model)
	function beforeValidate($options=array()){
	    $valid = (!empty($this->data[$this->name]['isbn']) || !empty($this->data[$this->name]['ean']) || !empty($this->data[$this->name]['brand']) || !empty($this->data[$this->name]['model']));
	    return $valid && parent::beforeValidate(); 
	}
}
?>