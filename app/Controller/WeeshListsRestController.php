<?php
App::uses('AppController', 'Controller');

class WeeshListsRestController extends AppController {

    public $uses = array('WeeshList', 'User', 'Item');
    public $components = array('RequestHandler');

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('index', 'add', 'addItem');
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

    public function index($username) {
        // On retrouve l'id de l'utilisateur
        $username = urldecode($username);
        $user = $this->array_utf8_encode($this->User->find('first', 
            array(
                'conditions' => array('User.username' => $username), 
                'fields' => array('User.id'),
                'recursive' => 2))); // ++ profondeur du find(), pour récupérer les produits en même temps

        // Réponse
        if ($user) {
            $weesh_lists = $user['WeeshList'];
        } else {
            $weesh_lists = "false";
        }

        $this->set(array(
            'weesh_lists' => $weesh_lists,
            '_serialize' => array('weesh_lists')
        ));
    }

    public function add($username) {
        // On retrouve l'id de l'utilisateur
        $username = urldecode($username);
        $user = $this->User->find('first', 
            array('conditions' => array('User.username' => $username), 'fields' => array('User.id')));

        // On ajoute l'user_id à la requête
        $this->request->data['WeeshList']['user_id'] = $user['User']['id'];

        // Création de la weeshlist
        $this->WeeshList->create();
        if ($this->WeeshList->save($this->request->data)) {
            $added = "true";
        } else {
            $added = "false";
        }

        // Réponse
        $this->set(array(
            'added' => $added,
            '_serialize' => array('added')
        ));
    }

    public function addItem($username, $weesh_list_name, $item_id) {
        $added = "false";

        // On retrouve l'id de l'utilisateur
        $username = urldecode($username);
        $user = $this->User->find('first', 
            array('conditions' => array('User.username' => $username), 'fields' => array('User.id')));

        if ($user) {
            // On retrouve l'id de la weeshlist
            $weesh_list_name = urldecode($weesh_list_name);
            $weesh_list = $this->WeeshList->find('first', 
                array('conditions' => array('WeeshList.user_id' => $user['User']['id'], 'WeeshList.name' => $weesh_list_name)));

            if ($weesh_list) {
                // On vérifie que l'item existe
                if ($this->Item->exists($item_id)) {
                    // Préparation de la requête
                    $this->request->data['WeeshList']['id'] = $weesh_list['WeeshList']['id'];
                    $this->request->data['Item']['id'] = $item_id;

                    // Exécution de la requête
                    if ($this->WeeshList->save($this->request->data)) {
                        $added = "true";
                    }
                }
            }

        }

        // Réponse
        $this->set(array(
            'logged' => $added,
            '_serialize' => array('logged')
        ));
    }
}
?>