<?php 

App::uses('AppController', 'Controller');

class ItemsController extends AppController {

    public $uses = array('Item', 'WeeshList');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');
    
    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('moveToWeeshlist', 'removeFromWeeshlist');         
    }

    public function moveToWeeshlist() {
        if ($this->request->is('post')) {
            debug($this->request->data);

            // if ($this->Item->exists($this->request->data['Item']['item_id'])) {
            //     if ($this->WeeshList->exists($this->request->data['WeeshList']['old_weesh_list_id'])) {
            //         if ($this->WeeshList->exists($this->request->data['WeeshList']['new_weesh_list_id'])) {
            //             // Ajout de la nouvelle association item/weeshlist
            //             // Préparation de la requête
            //             $this->request->data['WeeshList']['id'] = $this->request->data['Item']['new_weesh_list_id'];
            //             $this->request->data['Item']['id'] = $this->request->data['Item']['item_id'];
            //             // Exécution de la requête
            //             if ($this->Item->save($this->request->data)) {
            //                 // true
            //             }

            //             // Supprimer l'ancienne association item/weeshlist
            //             $this->Item->ItemWeeshList->deleteAll(
            //                 array('ItemWeeshList.item_id' => $this->request->data['Item']['item_id'],
            //                     'ItemWeeshList.user_id' => $this->request->data['Item']['old_weesh_list_id']), 
            //                 false);

            //             $this->Flash->success(__('Déplacement de la weeshlist effectué avec succès !'));
            //         } else {
            //             $this->Flash->error(__('Le présent weeshlist n\'existe pas. Déplacement abandonné.'));
            //         }
            //     } else {
            //         $this->Flash->error(__('Le weeshlist suivant n\'existe pas. Déplacement abandonné.'));
            //     }
            // } else {
            //     $this->Flash->error(__('Cet item n\'existe pas. Déplacement abandonné.'));
            // }

            return $this->redirect(array('controller' => 'weesh_lists', 'action' => 'view', $this->request->data['Item']['old_weesh_list_id']));
        }
    }

    public function removeFromWeeshlist() {
        if ($this->request->is('post')) {
            debug($this->request->data);

            return $this->redirect(array('controller' => 'weesh_lists', 'action' => 'view', $this->request->data['Item']['weesh_list_id']));
        }
    }
    
}
?>