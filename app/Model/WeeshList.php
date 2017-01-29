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
    public $useTable  = 'weeshlists';
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
            )
        )
    );
}
?>