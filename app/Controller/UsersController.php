<?php

App::uses('AppController', 'Controller');

class UsersController extends AppController
{

    var $name = "Users";

    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('add', 'logout', 'signup');
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
                $this->Auth->login();
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                $this->Flash->error(__('L\'utilisateur n\'a pas été sauvegardé. Merci de réessayer.'));
            }
        } else if ($this->request->is('get')) {
            if (AuthComponent::user()) { // Si déja connecté retour à la page d'acceuil
                $this->redirect(array('controller' => 'sweesh', 'action' => 'index'));
            } else {
                $this->render('signup');
            }
        }
    }

    public function edit($id = null)
    {
        $this->User->id = $id;
        if (!$this->User->exists()) {
            throw new NotFoundException(__('Invalid user'));
        }
        if ($this->request->is('post') || $this->request->is('put')) {
            if ($this->User->save($this->request->data)) {
                $this->Flash->success(__('L\'utilisateur a été ajouté à la base de données !'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(
                __('L\'utilisateur n\'a pas été sauvegardé. Merci de réessayer.')
            );
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
                $this->redirect(array('controller' => 'sweesh', 'action' => 'index'));
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