<?php

App::uses('AppModel', 'Model');

class ItemsLnkWeeshlists extends AppModel
{
    public $useTable = 'itemslnkweeshlists';
    public $belongTo = array(
        'WeeshList' => array(
            'className' => 'WeeshList',
            'foreignKey' => 'id'
        ));
}
?>