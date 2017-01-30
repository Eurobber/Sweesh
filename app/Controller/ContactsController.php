<?php
/**
 * Created by PhpStorm.
 * User: alexis
 * Date: 27/01/2017
 * Time: 01:00
 */


App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');


class ContactsController extends AppController
{
    public $uses = array(
        'Contact',
        'NewsLetter'
    );

    public function beforeFilter(){
        parent::beforeFilter();
        $this->Auth->allow(array('index', 'registerNewsLetter'));
    }

    public function isAuthorized($user = null) {
        // Chacun des utilisateur enregistré peut accéder aux fonctions publiques
        return true;
    }

    public function index(){
        if ($this->request->is('post')) {
            $this->Contact->create();
            if ($this->Contact->save($this->request->data)) {
                if($this->request->data['Contact']['email']){

                    $Email = new CakeEmail();
                    $Email->config('default');
                    $Email->from(array('weesh.io.contact@gmail.com' => 'Weesh.io'))
                        ->to($this->request->data['Contact']['email'])
                        ->subject('Bienvenue sur Weesh')
                        ->emailFormat('html')
                        ->attachments(array(
                            'facebook.png' => array(
                                'file' => ROOT . '/app/webroot/img/logo/facebook.png',
                                'mimetype' => 'image/png',
                                'contentId' => '003'
                            ),
                            'twitter.png' => array(
                                'file' => ROOT . '/app/webroot/img/logo/twitter.png',
                                'mimetype' => 'image/png',
                                'contentId' => '002'
                            ),
                            'logo.png' => array(
                                'file' => ROOT . '/app/webroot/img/logo/weesh_logo.png',
                                'mimetype' => 'image/png',
                                'contentId' => '001'
                            )
                        ))
                        ->template('contact')->viewVars(array('site_name'=>$this->request->data['Contact']['site_name'],
                            'site_url'=>$this->request->data['Contact']['site_url'],
                            'message'=>$this->request->data['Contact']['message'],
                            'email'=>$this->request->data['Contact']['email']))
                        ->send();
                }

                $this->Flash->success(__('Votre demande a bien été prise en compte'));
                return $this->redirect(array('action' => 'index'));
            } else {
                $this->Flash->error(__('Votre demande n\'a pas été sauvegardée. Merci de réessayer.'));
            }
        } else if ($this->request->is('get')) {
            $this->render('index');
        }
    }

    public function registerNewsLetter(){

        if ($this->request->is('post')) {
            debug($this->request->data);
            $this->NewsLetter->create();
            if ($this->NewsLetter->save($this->request->data)) {
                $Email = new CakeEmail();
                $Email->config('default');
                $Email->from(array('weesh.io.contact@gmail.com' => 'Weesh.io'))
                    ->to($this->request->data['NewsLetter']['email'])
                    ->subject('Inscription à la NewsLetter de Weesh')
                    ->emailFormat('html')
                    ->attachments(array(
                        'facebook.png' => array(
                            'file' => ROOT . '/app/webroot/img/logo/facebook.png',
                            'mimetype' => 'image/png',
                            'contentId' => '003'
                        ),
                        'twitter.png' => array(
                            'file' => ROOT . '/app/webroot/img/logo/twitter.png',
                            'mimetype' => 'image/png',
                            'contentId' => '002'
                        ),
                        'logo.png' => array(
                            'file' => ROOT . '/app/webroot/img/logo/weesh_logo.png',
                            'mimetype' => 'image/png',
                            'contentId' => '001'
                        )
                    ))
                    ->template('newsLetters')
                    ->send();
                $this->Flash->success(__('Votre inscription à la newsletter a bien été prise en compte'));
            } else {
                $this->Flash->error(__('Votre inscription à la newsletter n\'a pas été sauvegardée. Merci de réessayer.'));
            }
            $this->redirect($this->referer());
        } else if ($this->request->is('get')) {
            $this->redirect($this->referer());
        }
    }
}
?>