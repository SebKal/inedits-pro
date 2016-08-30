<?php
/* Define dependancies */
App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');

/**
 * Mailings Controller
 *
 * @property Mailing $Mailing
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 */
class MailingsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator', 'Session');

/**
 * BeforeFilter
 *
 *
 */
public function beforeFilter() {
        parent::beforeFilter();

        // Permet aux utilisateurs de s'enregistrer et de se déconnecter
        $this->Auth->allow( 'add');
    }

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Mailing->recursive = 0;
		$this->set('mailings', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Mailing->exists($id)) {
			throw new NotFoundException(__('Invalid mailing'));
		}
		$options = array('conditions' => array('Mailing.' . $this->Mailing->primaryKey => $id));
		$this->set('mailing', $this->Mailing->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			if ( $this->Mailing->findByMail($this->request->data['Mailing']['mail']) ) {
				$this->Session->setFlash(__('Cet email a déja été sollicité'), 'alert-box', array('class'=>'alert-danger'));
				return $this->redirect($this->referer());
			}
			if (ClassRegistry::init('User')->findByMail($this->request->data['Mailing']['mail'])) {
				$this->Session->setFlash(__('Cet email est déjà inscrit sur notre site'), 'alert-box', array('class'=>'alert-danger'));
				return $this->redirect($this->referer());
			}

			$this->Mailing->create();
			if ($this->Mailing->save($this->request->data)) {

				$Email = new CakeEmail('mailing');
                $Email->to($this->request->data['Mailing']['mail'])
                        ->viewVars( array('user' => $this->request->data['Mailing']['username'], 'anonym' => 'un de vos amis') )
                        ->send();
				$this->Session->setFlash(__('Merci de votre aide'), 'alert-box', array('class'=>'alert-success'));

			} else {
				$this->Session->setFlash(__('Une erreur est survenue, merci de réessayer.'), 'alert-box', array('class'=>'alert-danger'));
			}
		}

		return $this->redirect('/');
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Mailing->exists($id)) {
			throw new NotFoundException(__('Invalid mailing'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Mailing->save($this->request->data)) {
				$this->Session->setFlash(__('The mailing has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mailing could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Mailing.' . $this->Mailing->primaryKey => $id));
			$this->request->data = $this->Mailing->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Mailing->id = $id;
		if (!$this->Mailing->exists()) {
			throw new NotFoundException(__('Invalid mailing'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Mailing->delete()) {
			$this->Session->setFlash(__('The mailing has been deleted.'));
		} else {
			$this->Session->setFlash(__('The mailing could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}

/**
 * admin_index method
 *
 * @return void
 */
	public function admin_index() {
		$this->Mailing->recursive = 0;
		$this->set('mailings', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->Mailing->exists($id)) {
			throw new NotFoundException(__('Invalid mailing'));
		}
		$options = array('conditions' => array('Mailing.' . $this->Mailing->primaryKey => $id));
		$this->set('mailing', $this->Mailing->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Mailing->create();
			if ($this->Mailing->save($this->request->data)) {
				$this->Session->setFlash(__('The mailing has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mailing could not be saved. Please, try again.'));
			}
		}
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->Mailing->exists($id)) {
			throw new NotFoundException(__('Invalid mailing'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Mailing->save($this->request->data)) {
				$this->Session->setFlash(__('The mailing has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The mailing could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Mailing.' . $this->Mailing->primaryKey => $id));
			$this->request->data = $this->Mailing->find('first', $options);
		}
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->Mailing->id = $id;
		if (!$this->Mailing->exists()) {
			throw new NotFoundException(__('Invalid mailing'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Mailing->delete()) {
			$this->Session->setFlash(__('The mailing has been deleted.'));
		} else {
			$this->Session->setFlash(__('The mailing could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
