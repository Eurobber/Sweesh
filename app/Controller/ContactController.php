<?php
/**
 * Created by PhpStorm.
 * User: alexis
 * Date: 27/01/2017
 * Time: 01:00
 */


App::uses('AppController', 'Controller');

class ContactController extends AppController
{
    public function index(){
        if ($this->request->is('post')) {
            $this->Contact->create();
            if ($this->Contact->save($this->request->data)) {
                $this->Flash->success(__('Votre demande à bien été prise en compte'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Votre demande n\'a été sauvegardé. Merci de réessayer.'));
            }
        } else if ($this->request->is('get')) {
            $this->render('index');
        }
    }
    //IF connecté remplir le champ email avec son email
}
?>