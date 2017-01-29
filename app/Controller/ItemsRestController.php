<?php 

App::uses('AppController', 'Controller');

class ItemsRestController extends AppController {

    public $uses = array('Item');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');


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
        $items = $this->Item->find('all');
        $items = $this->array_utf8_encode ($items);
        $this->set(array(
            'items' => $items,
            '_serialize' => array('items')
        ));
    }

    public function add() {
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
    public function view($id) {
        $item = $this->Item->findById($id);
        $this->set(array(
            'item' => $item,
            '_serialize' => array('item')
        ));
    }

}
?>