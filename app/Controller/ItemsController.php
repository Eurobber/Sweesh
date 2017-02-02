<?php 

App::uses('AppController', 'Controller');

class ItemsController extends AppController {

    public $uses = array('Item', 'WeeshList', 'ItemsWeeshList');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');
    
    function beforeFilter() {
        parent::beforeFilter();
        $this->Auth->allow('moveToWeeshlist', 'removeFromWeeshlist');         
    }

    public function moveToWeeshlist() {
        if ($this->request->is('post')) {
            if ($this->Item->exists($this->request->data['Item']['item_id'])) {
                if ($this->WeeshList->exists($this->request->data['Item']['old_weesh_list_id'])) {
                    if ($this->WeeshList->exists($this->request->data['Item']['new_weesh_list_id'])) {
                        // Ajout de la nouvelle association item/weeshlist
                        // Préparation de la requête
                        $data['Item']['id'] = $this->request->data['Item']['item_id'];
                        $data['WeeshList']['id'] = $this->request->data['Item']['new_weesh_list_id'];
                        // Exécution de la requête d'ajout
                        if ($this->WeeshList->save($data)) {
                            // Suppression de l'ancienne association
                            if ($this->ItemsWeeshList->deleteAll(
                                array('ItemsWeeshList.item_id' => $this->request->data['Item']['item_id'],
                                    'ItemsWeeshList.weesh_list_id' => $this->request->data['Item']['old_weesh_list_id']), 
                                false)) {
                                $this->Flash->success(__('Déplacement de la weeshlist effectué avec succès !'));
                            } else {
                                $this->Flash->error(__('Echec de la suppression de l\'item de la weeshlist courante. Déplacement abandonné.'));
                            }
                        } else {
                            $this->Flash->error(__('Echec de l\'ajout de l\'item dans la nouvelle weeshlist. Déplacement abandonné.'));
                        }
                    } else {
                        $this->Flash->error(__('Le présent weeshlist n\'existe pas. Déplacement abandonné.'));
                    }
                } else {
                    $this->Flash->error(__('Le weeshlist suivant n\'existe pas. Déplacement abandonné.'));
                }
            } else {
                $this->Flash->error(__('Cet item n\'existe pas. Déplacement abandonné.'));
            }

            // Dans tous les cas, retour vers la vue weeshlist précédente
            return $this->redirect(array('controller' => 'weesh_lists', 'action' => 'view', $this->request->data['Item']['old_weesh_list_id']));
        }
    }

    public function removeFromWeeshlist() {
        if ($this->request->is('post')) {
            if ($this->Item->exists($this->request->data['Item']['item_id'])) {
                if ($this->WeeshList->exists($this->request->data['Item']['weesh_list_id'])) {
                    // Suppression de l'association
                    if ($this->ItemsWeeshList->deleteAll(
                        array('ItemsWeeshList.item_id' => $this->request->data['Item']['item_id'],
                            'ItemsWeeshList.weesh_list_id' => $this->request->data['Item']['weesh_list_id']), 
                        false)) {
                        $this->Flash->success(__('Déplacement de la weeshlist effectué avec succès !'));
                    } else {
                        $this->Flash->error(__('Echec de la suppression de l\'item de la weeshlist courante. Déplacement abandonné.'));
                    }
                } else {
                    $this->Flash->error(__('Le weeshlist suivant n\'existe pas. Déplacement abandonné.'));
                }
            } else {
                $this->Flash->error(__('Cet item n\'existe pas. Déplacement abandonné.'));
            }

            // Dans tous les cas, retour vers la vue weeshlist précédente
            return $this->redirect(array('controller' => 'weesh_lists', 'action' => 'view', $this->request->data['Item']['weesh_list_id']));
        }
    }
    
}
?>