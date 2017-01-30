<?php

class WeeshController extends AppController{

    public function index() {}
    public function faq() {}

    public $uses = array('WeeshList', 'ItemsLnkWeeshlists', 'Item');
 
    public function beforeFilter(){
			parent::beforeFilter();
			$this->Auth->allow('index');
	}

	public function isAuthorized($user = null) {
        // Chacun des utilisateur enregistré peut accéder aux fonctions publiques
        if (empty($this->request->params['admin'])) {
            return true;
        }
    }
    
 

    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('Paginator');
    }
    
        public function myProducts()
    {

        $my = self::array_utf8_encode($this->Item->find('all'));
 $items = [];
        foreach ($my as $row => $innerArray) {
            foreach ($innerArray as $innerRow => $value) {
                if (array_key_exists('Item', $value)) {
                    foreach ($value as $key => $val) {
                        array_push($items, $val);
                    }
                } else {
                    array_push($items, $value);
                }
            }
        }
        $this->set('items', $items);       
        
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