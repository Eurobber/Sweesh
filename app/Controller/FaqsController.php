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
    
    public function faq (){
    }