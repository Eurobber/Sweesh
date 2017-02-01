<?php 

App::uses('AppController', 'Controller');

class NewSourcesRestController extends AppController {

    public $uses = array('NewSource', 'Weeshlist');
    public $helpers = array('Html', 'Form');
    public $components = array('RequestHandler');

    
     function beforeFilter() {
        parent::beforeFilter();
        if(in_array($this->params['controller'],array('new_sources_rest'))){
            // For RESTful web service requests, we check the name of our contoller
            $this->Auth->allow();
            // this line should always be there to ensure that all rest calls are secure
            /* $this->Security->requireSecure(); */

        }else{
            // setup out Auth
            $this->Auth->allow();         
        }
     }    

    public function index() {
        if ($this->request->is('get')) {
            $newsources = $this->NewSource->find('all');
            $this->set(array(
                'newsources' => $newsources,
                '_serialize' => array('newsources')
            ));
        } else {
            $this->set(array(
                'newsources' => 'error',
                '_serialize' => array('newsources')
            ));
        }
    }

    public function add() {
        if ($this->request->is('post')) {
            $post = $this->request->data;
            $wid = $post['weeshlistid'];
            for ($i = 0 ; $i < count($post['url']) ; $i++) {
                $this->NewSource->create();
                $data = [
                    'url'=>$post['url'][$i],
                    'weeshlistid'=> $wid
                ];
                if($this->NewSource->save($data)) {
                    $message = 'URL correctement ajout\ée';
                }
                 else {
                    $message = 'Erreur lors de l\'ajout de l\'URL';
                }
            }
            
            /*
            $this->NewSource->create();
            if ($this->NewSource->save($this->request->data)) {
                 $message = 'URL correctement ajoutée';
            } else {
                $message = 'Erreur lors de l\'ajout de l\'URL';
            }*/
            $this->set(array(
                'message' => $message,
                '_serialize' => array('message')
            ));
        }
    }
}
?>