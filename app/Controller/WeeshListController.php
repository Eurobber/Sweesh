<?php

App::uses('AppController', 'Controller');


class WeeshlistController extends AppController{

    public $uses = array('WeeshList', 'ItemsLnkWeeshlists', 'Item');

    public function beforeFilter(){
        parent::beforeFilter();
        $this->Auth->allow(array('index', 'add', 'delete', 'view'));
    }

    public function isAuthorized($user = null) {
        return true;
    }

	public function index() {
        $lists = $this->WeeshList->find('all', array('conditions' => array('WeeshList.user_id' => AuthComponent::user()['id'])));
        $this->set('lists', $lists);
    }

    public function add(){
        if ($this->request->is('post')){
            $this->WeeshList->create();
            $this->request->data['WeeshList']['user_id'] = AuthComponent::user()['id'];
            if ($this->WeeshList->save($this->request->data)){
                $this->Flash->success(__('Votre WeeshList a bien été ajouté'));
                return $this->redirect(array('action' => 'index'));
            }else{
                $this->Flash->error(__('Votre WeeshList n\'a bien été ajouté. Merci de réessayer.'));
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
        $itemsLnk = $this->ItemsLnkWeeshlists->find('all', array('conditions' => array('ItemsLnkWeeshlists.weeshlist' => $id)));
        $items = [];

        //Faire un test si c'est nul
        foreach ($itemsLnk as $value) {
            if(!empty($items))
            {
                array_push($items, self::array_utf8_encode($this->Item->find('all', array('conditions' => array('Item.id' => $value['ItemsLnkWeeshlists']['item'])))));
            } else {
                $items = self::array_utf8_encode($this->Item->find('all', array('conditions' => array('Item.id' => $value['ItemsLnkWeeshlists']['item']))));
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