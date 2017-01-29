<?php 

App::uses('AppController', 'Controller');

class ItemsRestController extends AppController {

    public $uses = array('Item');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');

    
     function beforeFilter() {
        parent::beforeFilter();
        if(in_array($this->params['controller'],array('items_rest'))){
            // For RESTful web service requests, we check the name of our contoller
            $this->Auth->allow();
            // this line should always be there to ensure that all rest calls are secure
            /* $this->Security->requireSecure(); */
            $this->Security->unlockedActions = array('edit','delete','add','view');

        }else{
            // setup out Auth
            $this->Auth->allow();         
        }
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

    public function index() {
<<<<<<< HEAD
        if ($this->request->is('get')) {
            $items = $this->Item->find('all');
            $items = $this->array_utf8_encode ($items);
            $this->set(array(
                'items' => $items,
                '_serialize' => array('items')
            ));
        } else {
            $this->set(array(
                'items' => 'error',
                '_serialize' => array('items')
            ));
        }
=======
        $items = $this->Item->find('all');
        $items = $this->array_utf8_encode($items);
        $this->set(array(
            'items' => $items,
            '_serialize' => array('items')
        ));
>>>>>>> origin/master
    }

    public function add() {
        if ($this->request->is('post')) {
            $this->Item->create();
            if ($this->Item->save($this->request->data)) {
                 $message = 'Produit correctement ajouté';
            } else {
                $message = 'Erreur lors de l\'ajout du produit';
            }
            $this->set(array(
                'message' => $message,
                '_serialize' => array('message')
            ));
        }
    }
    public function view($id) {
        $item = $this->Item->findById($id);
        $this->set(array(
            'item' => $item,
            '_serialize' => array('item')
        ));
    }

    
   
    
}
?>