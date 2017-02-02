<?php

App::uses('AppController', 'Controller');


class WeeshListsController extends AppController
{

    public $uses = array('WeeshList', 'Item', 'ItemInstance');

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow(array('index', 'add', 'delete', 'view'));
    }

    public function isAuthorized($user = null)
    {
        return true;
    }

    public function index()
    {
        $lists = $this->WeeshList->find('all', array('conditions' => array('WeeshList.user_id' => AuthComponent::user()['id'])));
        $this->set('lists', $this->array_utf8_encode($lists));
        $nb = $this->WeeshList->find('count', array('conditions' => array('WeeshList.user_id' => AuthComponent::user()['id'])));
        $this->set('nb', $nb);
    }

    public function add()
    {
        if ($this->request->is('post')) {
            debug($this->request->data);
            $this->WeeshList->create();
            $this->request->data['WeeshList']['user_id'] = AuthComponent::user()['id'];
            if ($this->WeeshList->save($this->request->data)) {
                $this->Flash->success(__('Votre WeeshList a bien été ajoutée'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Votre WeeshList n\'a pas été ajoutée. Merci de réessayer.'));
                return $this->redirect(array('action' => 'index'));
            }
        }
    }

    // NOT TESTED
    public function delete($id = null)
    {
        $this->request->allowMethod('post');

        $this->WeeshList->id = $id;
        if (!$this->WeeshList->exists()) {
            throw new NotFoundException(__('La weeshliste spécifié n\'existe pas !'));
        }
        if ($this->WeeshList->delete()) {
            $this->Flash->success(__('La weeshlist a été correctement supprimé.'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('La weeshlist n\'a pas été supprimé. Merci de réessayer.'));
        return $this->redirect(array('action' => 'index'));
    }

    public function view($id)
    {
        $this->WeeshList->id = $id;
        if (!$this->WeeshList->exists()) {
            throw new NotFoundException(__('La weeshlist n\'existe pas'));
        }
        $myWeeshList = $this->WeeshList->findById($id);
        $weeshTemp = $myWeeshList;
        $arrayComparator = array();
        foreach($weeshTemp['Item'] as $item) {
            $comparator = $this->ItemInstance->findAllByItemId($item['id']);
            array_push($arrayComparator,$comparator);
        }
        $this->set('comparator', $arrayComparator);
        
        if($myWeeshList['WeeshList']['user_id'] == AuthComponent::user()['id']){
            $items = [];
            foreach ($myWeeshList as $row => $innerArray) {
                if($row == 'Item'){
                    foreach ($innerArray as $innerRow => $value){
                        array_push($items, $value);
                    }
                }
            }
            $this->set('weeshlist', $items);
        } else {
            // Elle ne vous appartient pas
            throw new NotFoundException(__('La weeshlist n\'existe pas'));
        }
        $this->set('weeshlist', $items);
        

        //On récupère les noms des weeshlists de l'user (sauf la weeshlist courante)
        $weeshlists = $this->WeeshList->find('list', 
                array('conditions' => array('WeeshList.user_id' => $this->Auth->user('id'), 'WeeshList.id !=' => $id),
                    'fields' => array('WeeshList.id', 'WeeshList.name')));
        $this->set('weeshlists_names', $weeshlists);

        // On set l'id de la weeshlist courante
        $this->set('current_weeshlist_id', $id);
        
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