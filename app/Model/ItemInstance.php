<?php
App::uses('AppModel', 'Model');

class ItemInstance extends AppModel
{
    public $useTable  = 'item_instances';
    public $belongTo = array(
        'Item' => array(
            'className' => 'Item',
            'foreignKey' => 'item_id'
        ));

    public $validate = array(
        'url' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'L\'URL de l\'item est requis'
            )
        ),
        'price' => array(
            'required' => array(
                'rule' => 'notBlank',
                'message' => 'Le prix de l\'item est requis'
            )
        )
    );
}
?>