<?php

class WeeshController extends AppController{

    public function index() {}
    public function faq() {}


    public function beforeFilter(){
			parent::beforeFilter();
			$this->Auth->allow('index');
	}

	public function isAuthorized($user = null) {
        // Chacun des utilisateur enregistré peut accéder aux fonctions publiques
        if (empty($this->request->params['admin'])) {
            return true;
        }
    }
}
?>