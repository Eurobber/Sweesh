<?php

App::uses('AppController', 'Controller');


class WeeshListsController extends AppController
{

    public $uses = array('WeeshList', 'Item');

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
        $this->set('lists', $lists);
    }

    public function add()
    {
        if ($this->request->is('post')) {
            $this->WeeshList->create();
            $this->request->data['WeeshList']['user_id'] = AuthComponent::user()['id'];
            if ($this->WeeshList->save($this->request->data)) {
                $this->Flash->success(__('Votre WeeshList a bien été ajouté'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Votre WeeshList n\'a pas été ajouté. Merci de réessayer.'));
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
        $this->set('weeshlist', $this->WeeshList->findById($id));

        // TODO À modifier (supprimer ?) car la table ItemsLnkWeeshlists n'existe plus, la relation many-to-many est gérée avec CakePHP

        // $itemsLnk = $this->ItemsLnkWeeshlists->find('all', array('conditions' => array('ItemsLnkWeeshlists.weeshlist' => $id)));
        // $itemsBdd = [];

        // foreach ($itemsLnk as $value) {
        //     if (!empty($itemsBdd)) {
        //         array_push($itemsBdd, self::array_utf8_encode($this->Item->find('all', array('conditions' => array('Item.id' => $value['ItemsLnkWeeshlists']['item'])))));
        //     } else {
        //         $itemsBdd = self::array_utf8_encode($this->Item->find('all', array('conditions' => array('Item.id' => $value['ItemsLnkWeeshlists']['item']))));
        //     }
        // }
        // $items = [];
        // foreach ($itemsBdd as $row => $innerArray) {
        //     foreach ($innerArray as $innerRow => $value) {
        //         if (array_key_exists('Item', $value)) {
        //             foreach ($value as $key => $val) {
        //                 array_push($items, $val);
        //             }
        //         } else {
        //             array_push($items, $value);
        //         }
        //     }
        // }
        // $this->set('items', $items);
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