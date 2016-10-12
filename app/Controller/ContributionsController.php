<?php
App::uses('AppController', 'Controller');
App::uses('Folder', 'Utility');
App::uses('CakeEmail', 'Network/Email');

class ContributionsController extends AppController {


    public $components  = array('Paginator');

    public function beforeFilter(){
      parent::beforeFilter();

      $this->Auth->allow('index', 'view', 'reportAbuse');
    }

    public function isAuthorized($user) {

      return true;
    }

    // ==BASICS
    public function index() {
      $this->Contribution->recursive = 0;

      $contribs = $this->Contribution->find('all', array(
        'conditions'  => array('Contribution.status' => 3),
        'order'       => 'Contribution.created DESC',
        'limit'       => 2,
        'recursive'   => 2
      ));

      // Add authors having contributed
      for ($i=0 ; $i < count($contribs) ; $i++) {
        $contribs[$i]['Tree']['users'] = $this->Contribution->getTreeAuthors($contribs[$i]['Tree']['id']);
      }
      $this->set('contribs', $contribs);

      $trees = $this->Contribution->Tree->find('all', array(
        'order'     => 'Tree.created DESC',
        'limit'     => 3,
        'recursive' => 2
      ));

      // Add authors having contributed
      for ($i=0 ; $i < count($trees) ; $i++) {
        $trees[$i]['Tree']['users'] = $this->Contribution->getTreeAuthors($trees[$i]['Tree']['id']);
      }
      $this->set('trees', $trees);

      // Set Users data
      $bestUsers  = $this->Contribution->User->getUserByPop(4);
      $this->set('bestUsers', $bestUsers);

    }

    // ==CRUD

    public function view($data = null) {

      // Set template data
      $this->set('layoutFooter', 'footer/main');

      if($data && is_numeric($data)){
        if (!$this->Contribution->exists($data)) {
            throw new NotFoundException(__('Contribution invalide'));
        }
        $contribution   = $this->Contribution->read(null, $data);
        $this->set('contribution', $contribution);
      }else{
        $contribution = $this->Contribution->findBySlug($data);
        if (!$contribution) {
            throw new NotFoundException(__('Contribution invalide'));
        }
        $this->set('contribution', $contribution);
      }

      $parent1 = $this->Contribution->getParentNode($contribution['Contribution']['id']);

      if (!empty($parent1))
      {
        $this->set('parent1', $parent1);

        if ($parent1['Contribution']['parent_id'])
        {
          $parent2 = $this->Contribution->getParentNode($parent1['Contribution']['id']);
          $this->set('parent2', $parent2);
        }
      }

      // Count view
      $viewCount = $contribution['Contribution']['view_count'] + 1;
      $this->Contribution->id = $contribution['Contribution']['id'];
      $this->Contribution->saveField('view_count', $viewCount);

    }

    public function add($treeSlug, $parentId, $userId) {

      // Set template data
      $this->set('layoutCover', 'contributions/add-cover');
      $this->set('layoutFooter', 'footer/main');

      // Find Parent Contrib
      $parentContribution = $this->Contribution->findById($parentId);
      $this->set('parentContribution', $parentContribution);

      // Find the tree
      $tree = $this->Contribution->Tree->find('first', array(
          'conditions'    => array('Tree.id' => $parentContribution['Tree']['id']),
      ));
      $this->set('tree', $tree);

      // Check if tree is end
      if ($tree['Tree']['is_end']) {
        $this->Session->setFlash(__('Cet arbre a terminé sa croissance, il n\'est plus possible d\'ajouter de contribution'), 'alert-box', array('class'=>'alert-danger'));
        return $this->redirect(array(
          'controller' => 'trees',
          'action' => 'view',
          'slug' => $tree['Tree']['slug']
        ));
      }

      // Find the author
      $user = $this->Contribution->User->find('first', array(
          'conditions'    => array('User.id' => $userId),
      ));

      if ($this->request->is('post') && !empty($this->request->data)) {

          $this->request->data['Contribution']['user_id']   = $userId;
          $this->request->data['Contribution']['tree_id']   = $tree['Tree']['id'];
          $this->request->data['Contribution']['parent_id'] = $parentId;
          $this->request->data['Contribution']['entreprise_id'] = $this->Auth->user()['entreprise_id'];
          $this->request->data['Contribution']['role_id'] = 3;

          $this->Contribution->create();

          if ($this->Contribution->save($this->request->data)) {

            /* Story upload */
            if (!empty($this->request->data['Contribution']['path_file']['name']) && isset($this->request->data['Contribution']['path_file']['name'])) {
              $this->formatFileName($this->Contribution->slug);
            }

            // Mail User
            $Email = new CakeEmail('newContrib');
            $Email
              ->to($user['User']['mail'])
              ->viewVars(array(
                'participation' => $this->request->data['Contribution']['title'],
                'author'        => $user['User']['name'].' '.$user['User']['last_name']
              ))
              ->send();


            return $this->redirect(array('controller' => 'trees', 'action' => 'merci', $tree['Tree']['slug']));

          } else {
            $this->Session->setFlash(__('une erreur est survenue. Merci de réessayer.'), 'alert-box', array('class'=>'alert-danger'));
          }
      }


    }

    public function edit($id = null) {

      // Set template data
      $this->set('layoutFooter', 'footer/main');

      if($id && is_numeric($id)){
          if (!$this->Contribution->exists($id)) {
            throw new NotFoundException(__('Invalid contribution'));
          }

          // Set Contrib Data
          $options            = array('conditions' => array('Contribution.' . $this->Contribution->primaryKey => $id));
          $contribution       = $this->Contribution->find('first', $options);

          $this->set('contribution', $contribution);
      }else {
          $contribution = $this->Contribution->findBySlug($id);
          if (!$contribution) {
              throw new NotFoundException(__('Invalid contribution'));
          }
          $id = $contribution['Contribution']['id'];
          $this->set('contribution', $contribution);
      }

      if ($this->request->is(array('post', 'put'))) {

          $this->request->data['Contribution']['user_id'] = $contribution['Contribution']['user_id'];
          $this->Contribution->id = $id;

          /* File Upload */
          if(!empty($this->request->data) && isset($this->request->data['Contribution']['path'])){
              $extension  = mb_strtolower(pathinfo($this->request->data['Contribution']['path']['name'], PATHINFO_EXTENSION));
              $slug       = strtr(mb_strtolower($this->request->data['Contribution']['title']).'.'.$extension, 'áàâäãåçéèêëíìîïñóòôöõúùûüýÿ', 'aaaaaaceeeeiiiinooooouuuuyy');

              if(in_array($extension, array('pdf', 'txt', 'doc', 'docx')) ){
                  $dir = new Folder(APP . 'webroot\files\arbres'. $this->request->data['Contribution']['title'], true);
                  move_uploaded_file($this->request->data['Contribution']['path']['tmp_name'], $dir->path . '/' .$slug);
                  $this->request->data['Contribution']['path'] = 'files/arbres/'.$slug;
              }else {
                  $this->Session->setFlash(__('Histoire non sauvegardée. Un document PDF est requis.'), 'alert-box', array('class'=>'alert-danger'));
                  return $this->redirect($this->referer());
              }
          }

          if ($this->Contribution->save($this->request->data)) {
              $this->Session->setFlash(__('Mise à jour effectuée.'), 'alert-box', array('class'=>'alert-success'));
          } else {
              $this->Session->setFlash(__('Une erreur est survenue. Merci de réessayer.'), 'alert-box', array('class'=>'alert-danger'));
          }

          return $this->redirect($this->referer());
      }
    }

    public function delete($id = null) {
        $this->Contribution->id = $id;
        if (!$this->Contribution->exists()) {
            throw new NotFoundException(__('Invalid contribution'));
        }

        if ($this->Contribution->delete()) {
            $this->Session->setFlash(__('Contribution supprimée'), 'alert-box', array('class'=>'alert-danger'));
        }else {
            $this->Session->setFlash(__('Contribution non supprimée. Merci de réessayer.'), 'alert-box', array('class'=>'alert-danger'));
        }
        return $this->redirect($this->referer());
    }

    // ==ADMIN

    public function admin_index() {
      if ($this->Auth->user()['role_id'] == 1){
        $this->set('trees', $this->Contribution->find('all'));
      }
      if ($this->Auth->user()['role_id'] == 4){
        $this->set('trees', $this->Contribution->find('all', array(
          'conditions'  => array(
            'Entreprise.user_id' => $this->Auth->user()['id'],
          ),
          'recursive' => 2
        )));
        $this->set('entreprises', $this->Contribution->Entreprise->find('list', array(
          'fields'      => array('Entreprise.id', 'Entreprise.name'),
          'conditions'  => array('Entreprise.user_id' => $this->Auth->user()['id']),
        )));
      }

      return true;
    }

    public function admin_add($treeSlug, $parentId, $userId) {

      // Find Parent Contrib
      $parentContribution = $this->Contribution->findById($parentId);
      $this->set('contribution', $parentContribution);

      // Find the tree
      $tree = $this->Contribution->Tree->find('first', array(
          'conditions'    => array('Tree.id' => $parentContribution['Tree']['id']),
      ));
      $this->set('tree', $tree);

      // Find the author
      $user = $this->Contribution->User->find('first', array(
          'conditions'    => array('User.id' => $userId),
      ));

      if ($this->request->is('post') && !empty($this->request->data)) {

          // Define Author
          $this->request->data['Contribution']['user_id']  = $userId;

          // Define Tree
          $this->request->data['Contribution']['tree_id']  = $tree['Tree']['id'];

          // Define Parent Contribution
          if (!$this->request->data['Contribution']['parent_id']){
            $this->request->data['Contribution']['parent_id']  = $parentId;
          }

          // Define Status
          $this->request->data['Contribution']['status']  = 3;

          $this->Contribution->create();

          if ($this->Contribution->save($this->request->data)) {

            /* Story upload */
            if (!empty($this->request->data['Contribution']['path_file']['name']) && isset($this->request->data['Contribution']['path_file']['name'])) {
              $this->formatFileName($this->Contribution->slug);
            }

            // Mail User
            $Email = new CakeEmail('newContrib');
            $Email->to($user['User']['mail'])
              ->viewVars( array(
                  'participation' => $this->request->data['Contribution']['title'],
                  'author' => $user['User']['name'].' '.$user['User']['last_name']
                )
              )
              ->send();

            // Mail administrateur
            $Email = new CakeEmail('adminNewContrib');
            $Email->viewVars( array('participation' => $this->request->data['Contribution']['title'], 'author' => $user['User']['name'].' '.$user['User']['last_name']) )
              ->send();

            $this->Session->setFlash(__('Contribution Ajoutée'), 'alert-box', array('class'=>'alert-success'));

            return $this->redirect($this->referer());

          } else {
            $this->Session->setFlash(__('une erreur est survenue. Merci de réessayer.'), 'alert-box', array('class'=>'alert-danger'));
          }

          return $this->redirect($this->referer());
      }
    }

    public function admin_edit($id = null) {

        $contribs   = $this->Contribution->generateTreeList(null,null,null,'=>');
        $this->set('contribs', $contribs);

        if($id && is_numeric($id)){
            if (!$this->Contribution->exists($id)) {
                throw new NotFoundException(__('Invalid contribution'));
            }

            // Set Contrib Data
            $options            = array('conditions' => array('Contribution.' . $this->Contribution->primaryKey => $id));
            $contribution       = $this->Contribution->find('first', $options);

            $this->set('contribution', $contribution);

        }else {
            $contribution = $this->Contribution->findBySlug($id);
            if (!$contribution) {
                throw new NotFoundException(__('Invalid contribution'));
            }
            $id = $contribution['Contribution']['id'];
            $this->set('contribution', $contribution);
        }

        if ($this->request->is(array('post', 'put'))) {

            $this->request->data['Contribution']['user_id']  = $contribution['Contribution']['user_id'];
            $this->Contribution->id                          = $id;

            /* File Upload */
            if(!empty($this->request->data) && isset($this->request->data['Contribution']['path'])){
                $extension  = mb_strtolower(pathinfo($this->request->data['Contribution']['path']['name'], PATHINFO_EXTENSION));
                $slug       = strtr(mb_strtolower($this->request->data['Contribution']['title']).'.'.$extension, 'áàâäãåçéèêëíìîïñóòôöõúùûüýÿ', 'aaaaaaceeeeiiiinooooouuuuyy');

                if(in_array($extension, array('pdf', 'txt', 'doc', 'docx')) ){
                    $dir = new Folder(APP . 'webroot\files\arbres'. $this->request->data['Contribution']['title'], true);
                    move_uploaded_file($this->request->data['Contribution']['path']['tmp_name'], $dir->path . '/' .$slug);
                    $this->request->data['Contribution']['path'] = 'files/arbres/'.$slug;
                }else {
                    $this->Session->setFlash(__('Histoire non sauvegardée. Un document PDF est requis.'), 'alert-box', array('class'=>'alert-danger'));
                    return $this->redirect($this->referer());
                }
            }
            if ($this->Contribution->save($this->request->data)) {
                $this->Session->setFlash(__('Histoire sauvegardée'), 'alert-box', array('class'=>'alert-success'));
            } else {
                $this->Session->setFlash(__('Histoire non sauvegardée. Merci de réessayer.'), 'alert-box', array('class'=>'alert-danger'));
            }

            return $this->redirect($this->referer());
        }
    }

    public function admin_suspend($id = null) {

      if ($this->request->is('post'))
      {
        // debug($this->request->data);
        // exit();
        $this->Contribution->id = $id;

        // Find the contribution
        $contribution = $this->Contribution->find('first', array(
            'conditions'    => array('Contribution.id' => $id),
        ));

        // Find the author
        $user = $this->Contribution->User->find('first', array(
            'conditions'    => array('User.id' => $contribution['Contribution']['user_id']),
        ));

        $message = $this->request->data['deny_contrib_mail'];

        if (!$this->Contribution->exists()) {
            throw new NotFoundException(__('Contribution invalide'));
        }
        if ($this->Contribution->saveField('status', 2)) {

          $Email = new CakeEmail('denyContrib');
            $Email->to($user['User']['mail'])
              ->viewVars( array(
                      'participation' => $contribution['Contribution']['title'],
                      'author' => $user['User']['name'].' '.$user['User']['last_name'],
                      'message' => $message
                      )
                    )
              ->send();

          $this->Session->setFlash(__('Contribution supprimée'), 'alert-box', array('class'=>'alert-success'));

          return $this->redirect($this->referer());
        }

        $this->Session->setFlash(__('La contribution n\'a pas été suspendue. Merci de réessayer.'), 'alert-box', array('class'=>'alert-danger'));
      }

      return $this->redirect($this->referer());
    }

    public function admin_approve($id = null) {

        $this->Contribution->id = $id;

        if (!$this->Contribution->exists()) {
            throw new NotFoundException(__('Contribution invalide'));
        }

        // Find the contribution
        $contribution = $this->Contribution->find('first', array(
            'conditions'    => array('Contribution.id' => $id),
        ));

        // Find the author
        $user = $this->Contribution->User->find('first', array(
            'conditions'    => array('User.id' => $contribution['Contribution']['user_id']),
        ));

        if ($this->Contribution->saveField('status', 3)) {
          $Email = new CakeEmail('approveContrib');
            $Email->to($user['User']['mail'])
                    ->viewVars( array('title' => $contribution['Contribution']['title'], 'contribSlug' => $contribution['Contribution']['slug'], 'treeSlug' => $contribution['Tree']['slug'] , 'author' => $user['User']['name'].' '.$user['User']['last_name']) )
                    ->send();
            $this->Session->setFlash(__('Votre proposition nous est bien parvenue, nous vous recontacterons lorsqu\'une modération aura été effectuée.'), 'alert-box', array('class'=>'alert-success'));
            $this->Session->setFlash(__('Contribution approuvée'), 'alert-box', array('class'=>'alert-success'));
            return $this->redirect($this->referer());
        }

        $this->Session->setFlash(__('La contribution n\'a pas été approuvée. Merci de réessayer.'), 'alert-box', array('class'=>'alert-danger'));
        return $this->redirect($this->referer());
    }

    // ==CUSTOMS

    public function sendFile($slug = null) {

      $this->viewClass = 'Media';

      $contribution    = $this->Contribution->findBySlug($slug);

      // Render app/webroot/files/example.docx
      $params = array(
        'id'        => $contribution['Contribution']['path'],
        'name'      => $contribution['Contribution']['path'],
        'extension' => array('docx', 'doc', 'pdf'),
        'mimeType'  => array(
            'docx' => 'application/vnd.openxmlformats-officedocument' .'.wordprocessingml.document',
            'pdf' => 'application/pdf'
        ),
        'path'      => 'files' . DS . 'contributions' . DS
      );
      $this->set($params);
    }

    public function sendEmail() {
        $Email = new CakeEmail('default');

        $Email->to('sebastien.kalinine@gmail.com');
        $Email->template('default', 'default');
        $Email->emailFormat('html');
        $Email->subject('About');
        $Email->send();

        $this->Session->setFlash(__('Mail envoyé'), 'alert-box', array('class'=>'alert-danger'));

        return $this->redirect($this->referer());
    }

    public function reportAbuse(){

      if ($this->request->is('post')) {
        $this->layout = false;
        $this->render(false);

        $values = $this->request->data;

        $contrib = $this->Contribution->find('first', array(
            'conditions'        => array('Contribution.id' => $values['Contribution']['contribution_id'])
        ));

        if (!$contrib) {
          throw new NotFoundException("Cette participation n'existe pas", 1);
        }

        $Email = new CakeEmail('reportAbuse');
        $Email->viewVars(array(
          'message' => $values['Contribution']['message'],
          'id'      => $contrib['Contribution']['id'],
          'title'   => $contrib['Contribution']['title'],
        ));
        $Email->send();

        $this->Session->setFlash(__('Une modération sera effectuée si nécessaire.'), 'alert-box', array('class'=>'alert-info'));
      }
      return $this->redirect($this->referer());
    }

    public function formatFileName($contribSlug)
    {
      $extension  = strtolower(pathinfo($this->request->data['Contribution']['path_file']['name'], PATHINFO_EXTENSION));
      $slug       = strtr($contribSlug.'.'.$extension, 'áàâäãåçéèêëíìîïñóòôöõúùûüýÿ', 'aaaaaaceeeeiiiinooooouuuuyy');
      $dir        = new Folder(APP . 'webroot'. DS .'files'. DS .'contributions', true);

      if (file_exists($dir->path . DS . $slug)){
        $slug = strtr($contribSlug . '.' . $extension, 'áàâäãåçéèêëíìîïñóòôöõúùûüýÿ', 'aaaaaaceeeeiiiinooooouuuuyy');
      }

      if(in_array($extension, array('pdf', 'doc', 'docx')) ){
        move_uploaded_file($this->request->data['Contribution']['path_file']['tmp_name'], $dir->path . DS .$slug);
        $this->Contribution->saveField('path', $slug);
      }

    }
}
