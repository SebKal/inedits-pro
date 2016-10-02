<?php
App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');
App::uses('CakeEmail', 'Network/Email');

class EntreprisesController extends AppController {


    public $components  = array('Paginator');

    public function beforeFilter(){
      parent::beforeFilter();
    }

    public function isAuthorized($user) {

      return true;
    }

    public function admin_delete($id = null) {
        $this->Entreprise->id = $id;
        if (!$this->Entreprise->exists()) {
            throw new NotFoundException(__('Invalid Entreprise'));
        }

        if ($this->Entreprise->delete()) {
            $this->Session->setFlash(__('Entreprise supprimée'), 'alert-box', array('class'=>'alert-danger'));
        }else {
            $this->Session->setFlash(__('Entreprise non supprimée. Merci de réessayer.'), 'alert-box', array('class'=>'alert-danger'));
        }
        return $this->redirect($this->referer());
    }

    // ==ADMIN

    public function admin_index() {

        $this->set('entreprises', $this->Entreprise->find('all'));
        $this->set('users', $this->Entreprise->User->find('list', array(
          'fields'      => array('User.id', 'User.slug'),
          'conditions'  => array(
            'User.status' => 3,
            'User.role_id'   => 1,
          ),
        )));
    }

    public function admin_add() {

      if ($this->request->is('post') && !empty($this->request->data)) {

          $this->Entreprise->create();

          if ($this->Entreprise->save($this->request->data)) {


            $this->Session->setFlash(__('Entreprise Ajoutée'), 'alert-box', array('class'=>'alert-success'));

            return $this->redirect($this->referer());

          } else {
            $this->Session->setFlash(__('une erreur est survenue. Merci de réessayer.'), 'alert-box', array('class'=>'alert-danger'));
          }

          return $this->redirect($this->referer());
      }
    }

    public function admin_edit($id = null) {

        if($id && is_numeric($id)){
            if (!$this->Entreprise->exists($id)) {
                throw new NotFoundException(__('Invalid contribution'));
            }

            // Set Contrib Data
            $options            = array('conditions' => array('Entreprise.' . $this->Entreprise->primaryKey => $id));
            $entreprise       = $this->Entreprise->find('first', $options);

            $this->set('entreprise', $entreprise);

        }else {
            $contribution = $this->Entreprise->findBySlug($id);
            if (!$contribution) {
                throw new NotFoundException(__('Invalid contribution'));
            }
            $id = $contribution['Entreprise']['id'];
            $this->set('contribution', $contribution);
        }

        if ($this->request->is(array('post', 'put'))) {

            $this->Entreprise->id = $id;

            if ($this->Entreprise->save($this->request->data)) {
                $this->Session->setFlash(__('Entreprise sauvegardée'), 'alert-box', array('class'=>'alert-success'));
            } else {
                $this->Session->setFlash(__('Entreprise non sauvegardée. Merci de réessayer.'), 'alert-box', array('class'=>'alert-danger'));
            }

            $this->set('users', $this->Entreprise->User->find('all'));

            return $this->redirect($this->referer());
        }
    }

}
