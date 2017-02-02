<?php

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

class UsersController extends AppController
{

    var $name = "Users";
    var $helpers = array('Html', 'Form', 'Time');
    var $allowCookie = true;
    var $cookieTerm = '0';
    public $uses = 'User';


    public function beforeFilter()
    {
        parent::beforeFilter();
        $this->Auth->allow('add', 'logout', 'signup', 'edit', 'forgot_password', 'reset_password_token');
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
                // Ajout du premier weeshlist par défaut de l'utilisateur
                $this->loadModel('WeeshList');
                $this->request->data['WeeshList']['name'] = 'MyWeeshlist';
                $this->request->data['WeeshList']['user_id'] = $this->User->id;
                $this->request->data['WeeshList']['description'] = 'Votre premiere Weeshlist est deja la. Pour y acceder, cliquez sur son image.';
                $this->WeeshList->create();
                $this->WeeshList->save($this->request->data);

                // Envoi d'un mail de confirmation
                $Email = new CakeEmail();
                $Email->config('default');
                $Email->from(array('weesh.io.contact@gmail.com' => 'Weesh.io'))
                    ->to($this->request->data['User']['email'])
                    ->subject('Bienvenue')
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
    
        function forgot_password() {
            
        if ($this->request->is('post')) {
            $user = $this->User->findByUsername($this->data['User']['username']); 
           if (empty($user)) {
                $this->Session->setflash('Nous ne trouvons pas votre identifiant');
                $this->redirect(array('controller' => 'users', 'action' => 'forgot_password'));
            } else {
                $user = $this->__generatePasswordToken($user); 
                if ($this->User->save($user)) {
                    $this->Session->setflash('Votre demande de changement de mot de passe a été envoyée à votre email.
						Vous avez 24 heures pour effectuer la modification.');
                    $this->redirect(array('controller' => 'users', 'action' => 'login'));
                }
            }
        }
    }
        
        function __generatePasswordToken($user) {
        if (empty($user)) {
            return null;
        }

        // Generate a random string 100 chars in length.
     	$token = "";
        $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < 6; $i++) {
            $rand = mt_rand(0, $max);
            $token .= $characters[$rand];
        }   
        $this->__sendForgotPasswordEmail($user['User']['id'], $token);

      
        $user['User']['password'] = $token;
        return $user;
    }
    
        function __sendForgotPasswordEmail($id = null, $token) {
        if (!empty($id)) {
            $this->User->id = $id;
            $User = $this->User->read();
                $Email = new CakeEmail();
                $Email->config('default'); 
                $Email->from(array('weesh.io.contact@gmail.com' => 'Weesh.io'))
                    ->to($User['User']['email']) 
                    ->subject('Mot de passe perdu')
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
                            ->template('reset_password_request')->viewVars(array('username'=>$User['User']['username'],
                        'email'=>$User['User']['email'],'password'=>$token))
                            ->send(); 

            $this->Flash->success(__('Vos informations ont bien été modifiées !'));
            $this->set('User', $User);
            return true;
        }
        return false;
    }


    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    // // Authentification par REST
    // public function authenticate($data) {
    //             var_dump("test2");

    //     $user = $this->User->find('first', array(
    //         'conditions' => array('User.username' => $data['username'])
    //     ));
    //     var_dump($user);
    //     if($user['User']['password'] !== AuthComponent::password($data['password']) {
    //         return false;
    //     }

    //     unset($user['User']['password']);
    //     return $user;
    // }
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