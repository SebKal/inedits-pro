<?php
App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');

class TreesController extends AppController {


    public $components = array('Paginator');

    public function beforeFilter(){
        parent::beforeFilter();

        $this->Auth->allow('index', 'view', 'generateTree', 'merci');
    }

    // ==BASICS
    public function index() {
        $this->Tree->recursive = 0;
        $this->set('layoutFooter', 'footer/main');
        $user = $this->Auth->user();

        $this->Paginator->settings = array(
          'conditions' => array(
            'Tree.entreprise_id' => $user['entreprise_id'],
          ),
          'limit' => 10
        );

        // Set Tree data
        $trees      = $this->paginate();

        for ($i=0 ; $i < count($trees) ; $i++) {
            $trees[$i]['Tree']['users'] = $this->Tree->Contribution->getTreeAuthors($trees[$i]['Tree']['id']);
        }

        $this->set('trees', $trees);
    }

    public function view($data) {

        $this->layout = 'inetree';
        $this->Tree->recursive = 0;

        $tree = $this->findModelByType($data);
        $this->set('tree', $tree);

        $contributions = $this->Tree->Contribution->find('all', array(
            'conditions'    => array(
                'Contribution.tree_id'    => $tree['Tree']['id'],
                'Contribution.status'     => 3,
            ),
        ));
        $this->set('contributions', $contributions);

        $theTree[] = $this->Tree->Contribution->find('threaded', array(
            'conditions'    => array(
                'Contribution.tree_id'  => $tree['Tree']['id'],
                'Contribution.status'   => 3,
            ),
        ));

        $this->set('theTree', $theTree);
        $this->set('_serialize', array('theTree'));
    }

    // ==CRUD
    public function add($id=null) {
        if ($this->request->is('post')) {

            $this->Tree->create();
            $this->Tree->author = $this->Auth->user('id');

            if ($this->Tree->save($this->request->data)) {
                $this->Session->setFlash(__('Arbre Ajouté.'), 'alert-box', array('class'=>'alert-success'));
                return $this->redirect(array('controller' => 'contributions', 'action' => 'index', 'admin' => true));
            } else {
                $this->Session->setFlash(__('Une erreur est survenue. Merci de réessayer.'), 'alert-box', array('class'=>'alert-danger'));
            }
        }

    }

    public function edit($id = null) {
        if (!$this->Tree->exists($id)) {
            throw new NotFoundException(__('Invalid tree'));
        }

        $options            = array('conditions' => array('Tree.' . $this->Tree->primaryKey => $id));
        $tree                = $this->Tree->find('first', $options);

        $this->set('tree', $tree);

        // Set Authors data
        $authors = $this->Tree->Contribution->find('all', array(
            'conditions'    => array('Contribution.tree_id' => $tree['Tree']['id']),
            'group'         => 'Contribution.user_id'
        ));

        $this->set('authors', $authors);

        if ($this->request->is(array('post', 'put'))) {

            $this->request->data['Tree']['user_id']  = $tree['Tree']['user_id'];
            $this->Tree->id                          = $id;

            /* Save tree */
            if ($this->Tree->save($this->request->data)) {
                $this->Session->setFlash(__('Mise à jour effectuée'), 'alert-box', array('class'=>'alert-success'));
            } else {
                $this->Session->setFlash(__('la voiture n\'a pas été édité. Merci de réessayer.'), 'alert-box', array('class'=>'alert-danger'));
            }

            return $this->redirect($this->referer());
        }
    }

    public function delete($id = null) {
        $this->Tree->id = $id;
        if (!$this->Tree->exists()) {
            throw new NotFoundException(__('Invalid tree'));
        }

        if ($this->Tree->delete()) {
            $this->Session->setFlash('The tree has been deleted.', 'alert-success');
            $this->Session->setFlash(__('Voiture supprimée'), 'alert-box', array('class'=>'alert-danger'));
        }else {
            $this->Session->setFlash(__('Voiture non supprimée. Merci de réessayer.'), 'alert-box', array('class'=>'alert-danger'));
        }
        return $this->redirect('/profile/'.$this->Auth->user('name').'/'.$this->Auth->user('id'));
    }

    //ADMINS
    public function admin_index() {
        $this->Tree->recursive = 0;

        // Set Tree data
        if ($this->Auth->user()['role_id'] == 1){
          $trees = $this->Tree->find('all');
        }
        if ($this->Auth->user()['role_id'] == 4){
          $trees = $this->Tree->find('all', array(
            'conditions'  => array(
              'Tree.entreprise_id' => $this->Auth->user()['entreprise_id'],
            )
          ));
        }

        for ($i=0 ; $i < count($trees) ; $i++) {
            $trees[$i]['Tree']['users'] = $this->Tree->Contribution->getTreeAuthors($trees[$i]['Tree']['id']);
        }

        if ($this->Auth->user()['role_id'] == 4)
        {
          $this->set('entreprises', $this->Tree->Entreprise->find('list', array(
            'fields'      => array('Entreprise.id', 'Entreprise.name'),
            'conditions'  => array('Entreprise.user_id' => $this->Auth->user()['id']),
          )));
        }
        else
        {
          $this->set('entreprises', $this->Tree->Entreprise->find('list', array(
            'fields'      => array('Entreprise.id', 'Entreprise.name'),
          )));
        }
        $this->set('trees', $trees);
    }

    public function admin_view($data = null) {

        $this->Tree->recursive = 1;

        if($data && is_numeric($data)){
            if (!$this->Tree->exists($data)) {
                throw new NotFoundException(__('Voiture Invalide'));
            }
            $tree   = $this->Tree->read(null, $data);
            $this->set('tree', $tree);
        }else{
            $tree   = $this->Tree->findBySlug($data);

            if (!$tree) {
                throw new NotFoundException(__('Contribution invalide'));
            }
            $this->set('tree', $tree);
        }

        // Set Authors data
        $authors = $this->Tree->Contribution->find('all', array(
            'conditions'    => array('Contribution.tree_id' => $tree['Tree']['id']),
            'group'         => 'Contribution.user_id'
        ));

        $this->set('authors', $authors);
    }

    public function admin_edit($data = null) {

        if($data && is_numeric($data)){
            if (!$this->Tree->exists($data)) {
                throw new NotFoundException(__('Arbre Invalide'));
            }
            // Set Trees Data
            $options		= array('conditions' => array('Tree.' . $this->Tree->primaryKey => $data));
            $tree				= $this->Tree->find('first', $options);
            $this->set('tree', $tree);
        }else{
            $tree   = $this->Tree->findBySlug($data);

            if (!$tree) {
                throw new NotFoundException(__('Contribution invalide'));
            }

            $this->set('tree', $tree);
        }

        // Set Authors data
        $authors = $this->Tree->Contribution->find('all', array(
            'conditions'    => array('Contribution.tree_id' => $tree['Tree']['id']),
            'group'         => 'Contribution.user_id'
        ));

        $this->set('authors', $authors);

        // Set First Contrib Data
        $firstContribution = $this->Tree->Contribution->find('first', array(
            'conditions'    => array(
            	'Contribution.parent_id'	=> null,
            	'Contribution.tree_id'		=> $tree['Tree']['id'],
          )
        ));

        $this->set('firstContribution', $firstContribution);

        if ($this->request->is(array('post', 'put'))) {

            $this->Tree->id = $tree['Tree']['id'];

            // Save Tree
            if ($this->Tree->save($this->request->data)) {
                $this->Session->setFlash(__('Mise à jour effectuée'), 'alert-box', array('class'=>'alert-success'));
            } else {
                $this->Session->setFlash(__('Une erreur est survenue. Merci de réessayer.'), 'alert-box', array('class'=>'alert-danger'));
            }

            return $this->redirect($this->referer());
        }
    }

    public function admin_delete($id = null) {
        $this->Tree->id = $id;
        if (!$this->Tree->exists()) {
            throw new NotFoundException(__('Cet arbre n\'existe pas.'));
        }

        if ($this->Tree->delete()) {
            $this->Session->setFlash(__('Arbre supprimé'), 'alert-box', array('class'=>'alert-danger'));
        }else {
            $this->Session->setFlash(__('Une erreur est survenue. Merci de réessayer.'), 'alert-box', array('class'=>'alert-danger'));
        }
        return $this->redirect($this->referer());
    }

    public function admin_suspend($id = null) {

    	if ($this->request->is('post'))
    	{
    		$this->Tree->id = $id;

    		$contribution = $this->Tree->find('first', array(
    				'conditions'    => array('Tree.id' => $id),
    		));

    		if (!$this->Tree->exists()) {
    				throw new NotFoundException(__('Cet arbre n\'existe pas.'));
    		}
    		if ($this->Tree->saveField('status', 2)) {

    			$this->Session->setFlash(__('Arbre suspendu.'), 'alert-box', array('class'=>'alert-success'));

    			return $this->redirect($this->referer());
    		}

    		$this->Session->setFlash(__('Une erreur est survenue. Merci de réessayer.'), 'alert-box', array('class'=>'alert-danger'));
    	}

    	return $this->redirect($this->referer());
    }

    public function admin_approve($id = null) {

    		$this->Tree->id = $id;

    		if (!$this->Tree->exists()) {
    				throw new NotFoundException(__('Cet arbre n\'existe pas.'));
    		}

    		$contribution = $this->Tree->find('first', array(
    				'conditions'    => array('Tree.id' => $id),
    		));

    		if ($this->Tree->saveField('status', 3)) {

    				$this->Session->setFlash(__('Arbre approuvé.'), 'alert-box', array('class'=>'alert-success'));
    				return $this->redirect($this->referer());
    		}

    		$this->Session->setFlash(__('Une erreur est survenue. Merci de réessayer.'), 'alert-box', array('class'=>'alert-danger'));
    		return $this->redirect($this->referer());
    }

    // OTHERS
    public function start($treeSlug=null){
        $tree = $this->Tree->findBySlug($treeSlug);
        $this->set('tree', $tree);
    }

    private function findModelByType($data){
        if ($data && is_numeric($data)){
            return $this->Tree->read(null, $data);
        }
        else {
            return $this->Tree->findBySlug($data);
        }
    }

    public function merci($slug)
			{
        // Set template data
        $this->set('layoutFooter', 'footer/main');

				$tree = $this->Tree->findBySlug($slug);
				$this->set('tree', $tree);
			}

}
