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
    public $components = array('Session','Security');

    public function index(){
        if ($this->request->is('post')) {
            $this->Contact->create();
            if ($this->Contact->save($this->request->data)) {

                //Tester si contact.email est nul

                $Email = new CakeEmail();
                $Email->config('default');
                $Email->from(array('weesh.io.contact@gmail.com' => 'Weesh.io'))
                    ->to($this->request->data['Contact']['email'])
                    ->subject('Bienvenue sur Weesh')
                    ->emailFormat('html')
                    ->attachments(array(
                        'facebook.png' => array(
                            'file' => ROOT . '\app\webroot\img\logo\facebook.png',
                            'mimetype' => 'image/png',
                            'contentId' => '003'
                        ),
                        'twitter.png' => array(
                            'file' => ROOT . '\app\webroot\img\logo\twitter.png',
                            'mimetype' => 'image/png',
                            'contentId' => '002'
                        ),
                        'logo.png' => array(
                            'file' => ROOT . '\app\webroot\img\logo\weesh_logo.png',
                            'mimetype' => 'image/png',
                            'contentId' => '001'
                        )
                    ))
                    ->template('contact')->viewVars(array('site_name'=>$this->request->data['Contact']['site_name'],
                        'site_url'=>$this->request->data['Contact']['site_url'],
                        'message'=>$this->request->data['Contact']['message'],
                        'email'=>$this->request->data['Contact']['email']))
                    ->send();

                $this->Flash->success(__('Votre demande a bien été prise en compte'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Votre demande n\'a pas été sauvegardée. Merci de réessayer.'));
            }
        } else if ($this->request->is('get')) {
            $this->render('index');
        }
    }
    //IF connecté remplir le champ email avec son email
}
?>