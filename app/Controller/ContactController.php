<?php
/**
 * Created by PhpStorm.
 * User: alexis
 * Date: 27/01/2017
 * Time: 01:00
 */


App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');


class ContactController extends AppController
{
    public function index(){
        if ($this->request->is('post')) {
            $this->Contact->create();
            if ($this->Contact->save($this->request->data)) {

                //Tester si contact.email est nul

                $Email = new CakeEmail();
                $Email->config('default');
                $Email->from(array('weesh.io.contact@gmail.com' => 'Weesh.io'))
                    ->to($this->request->data['Contact']['email'])
                    ->subject('Bienvenu')
                    ->emailFormat('html')
                    ->template('contact')->viewVars(array('site_name'=>$this->request->data['Contact']['site_name'],
                        'site_url'=>$this->request->data['Contact']['site_url'],
                        'message'=>$this->request->data['Contact']['message'],
                        'email'=>$this->request->data['Contact']['email']))
                    ->send();

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