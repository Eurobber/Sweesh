<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');


class UsersController extends AppController
{

    var $name = "Users";

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('add', 'logout', 'signup', 'edit');
    }


    public function isAuthorized($user = null)
    {
        // Chacun des utilisateur enregistré peut accéder aux fonctions publiques
        return true;
    }

    public function index()
    {
        $this->User->recursive = 0;
        $this->set('users', $this->paginate());
    }

    public function view($id = null)
    {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        $this->set('user', $this->User->findById($id));
    }

    public function signup()
    {
        if ($this->request->is('post')) {

            $this->User->create();
            if ($this->User->save($this->request->data)) {

                $Email = new CakeEmail();
                $Email->config('default');
                $Email->from(array('weesh.io.contact@gmail.com' => 'Weesh.io'))
                    ->to($this->request->data['User']['email'])
                    ->subject('Bienvenue')
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
                    ->template('inscription')->viewVars(array('username'=>$this->request->data['User']['username'],
                        'password'=>$this->request->data['User']['password'],
                        'email'=>$this->request->data['User']['email']))
                    ->send();
                $this->Auth->login();
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error(__('L\'utilisateur n\'a pas été sauvegardé. Merci de réessayer.'));
            }
        } else if ($this->request->is('get')) {
            if (AuthComponent::user()) { // Si déja connecté retour à la page d'acceuil
                $this->redirect(array('controller' => 'weesh', 'action' => 'index'));
            } else {
                $this->render('signup');
            }
        }
    }

    public function edit($id)
    {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if($this->request->data['User']['password1'] == $this->request->data['User']['password2'] ) {
                if($this->request->data['User']['password1'] != '' && $this->request->data['User']['password2'] != ''){
                    $this->request->data['User']['password'] = $this->request->data['User']['password1'];
                } else {
                    unset($this->User->validate['password']);
                }

                if ($this->User->save($this->request->data)) {
                    $Email = new CakeEmail();
                    $Email->config('default');
                    $Email->from(array('weesh.io.contact@gmail.com' => 'Weesh.io'))
                        ->to(AuthComponent::user()['email'])
                        ->subject('Modification de vos paramètres')
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
                        ->template('edit')
                        ->send();

                    $this->Flash->success(__('Vos informations ont bien été modifiées !'));
                    $this->redirect($this->referer());
                }
                $this->Flash->error(
                    __('Vos informations n\'on pas été modifiées. Merci de réessayer.')
                );
            } elseif (!$this->request->data['User']['password1'] && $this->request->data['User']['password2'] || $this->request->data['User']['password1'] && !$this->request->data['User']['password2']) {
                $this->Flash->error(
                    __('Veuillez rentrer le même mot de passe. Merci de réessayer.')
                );
            }
        } else {
            $this->request->data = $this->User->findById($id);
            unset($this->request->data['User']['password']);
        }
    }

    public function delete($id = null)
    {
        $this->request->allowMethod('post');

        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('L\'utilisateur spécifié n\'existe pas !'));
        }
        if ($this->User->delete()) {
            $this->Flash->success(__('Utilisateur correctement supprimé.'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Flash->error(__('L\'utilisateur n\'a pas été supprimé.'));
        return $this->redirect(array('action' => 'index'));
    }


    public function login()
    {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error(__("Nom d'utilisateur ou mot de passe invalide, merci de réessayer."));
            }
        } else if ($this->request->is('get')) {
            if (AuthComponent::user()) { // Si déja connecté retour à la page d'acceuil
                $this->redirect(array('controller' => 'weesh', 'action' => 'index'));
            } else {
                $this->render('login');
            }
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }
}