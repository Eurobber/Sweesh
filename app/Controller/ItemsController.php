<?php 

App::uses('AppController', 'Controller');

class ItemsController extends AppController {

    public $uses = array('Item');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');
    
    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('moveToWeeshlist', 'removeFromWeeshlist');         
    }

    public function moveToWeeshlist() {
        if ($this->request->is('post')) {
            debug($this->request->data);

            // $this->Item->

            return $this->redirect(array('controller' => 'weesh', 'action' => 'myProducts'));
        }
    }

    public function removeFromWeeshlist() {
        if ($this->request->is('post')) {
            debug($this->request->data);

            return $this->redirect(array('controller' => 'weesh', 'action' => 'myProducts'));
        }
    }
    
}
?>