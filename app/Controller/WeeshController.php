<?php

App::uses('Controller', 'Controller');

class WeeshController extends AppController{

    public $uses = array('WeeshList', 'Item', 'User', 'faq');

    public function index() {}
    public function faq() {}

 
    public function beforeFilter(){
			parent::beforeFilter();
			$this->Auth->allow('index','faq');
	}

	public function isAuthorized($user = null) {
        // Chacun des utilisateur enregistré peut accéder aux fonctions publiques
        if (empty($this->request->params['admin'])) {
            return true;
        }
    }
    
    public function myProducts()
    {
        $my = self::array_utf8_encode($this->User->findById($this->Auth->user('id')));

        $this->set('items', $my['Item']); 
    }
    

    
    public static function array_utf8_encode($dat)
    {
        if (is_string($dat))
            return utf8_encode($dat);
        if (!is_array($dat))
            return $dat;
        $ret = array();
        foreach ($dat as $i => $d)
            $ret[$i] = self::array_utf8_encode($d);
        return $ret;
    }
}
?>