<?php

App::uses('AppController', 'Controller');
App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
App::uses('Folder', 'Utility');
App::uses('CakeEmail', 'Network/Email');


class UsersController extends AppController {

  public function beforeFilter() {
    parent::beforeFilter();

    if( $this->action == 'register') {
      if ($this->Auth->user()) {
        return $this->redirect(['controller' => 'users', 'action' => 'profile', $this->Auth->user('slug')]);
      }else {

      }
    }

    // Passer la configuration en utilisant 'all'
    // $this->Auth->authenticate = array(
    //     AuthComponent::ALL => array(
    //       'userModel' => 'User'
    //     ),
    //     array(
    //       'scope' => array('User.status' => 3)
    //     )
    // );

    // Allowed action for loggedOut users
    $this->Auth->allow(
      'login',
      'logout',
      'register',
      'index',
      'profile',
      'confirmRegister',
      'forgetPassword',
      'begin'
    );
  }

  public function isAuthorized($user) {

    // Check if loggedIn user is the profil user
    if( $this->action == 'edit' || $this->action == 'changePass'){
      $data = $this->request->params['pass'][0];

      // Find user according $data type
      if($data && is_numeric($data)){
          $userViewed = $this->User->find('first', array('conditions' => array('User.id' => $data)));
      }else {
          $userViewed =    $this->User->findBySlug($data);
      }

      // If loggedIn user is the profil user or user is admin
      if ($user['id'] == $userViewed['User']['id'] || $user['role_id'] == 1) {
          return true;
      }
    }

    return parent::isAuthorized($user);
  }

  // ==BASICS
  public function index($search=null) {
    $this->User->recursive = 0;

    // Set Users data
    $this->set('users', $this->paginate());

    // Set BestUsers data
    $bestUsers = $this->User->getUserByPop();
    $this->set('bestUsers', $bestUsers);

    if ($this->request->isAjax()) {
      $results = $this->User->searchUsers($this->request->query['search']);
      $this->set(compact('results'));
      $this->render('json/index');
    }
    if ($this->request->is('post')) {
      $search = trim(strtolower($this->request->data['User']['search']));
      $results = $this->User->searchusers($search);
      $this->set(compact('results'));
    }

  }

  // ==CRUD
  public function profile($data = null) {

    $this->User->recursive = 1;

    $this->layout = 'profil';

    // Check URL Data
    if($data && is_numeric($data)){

      $this->User->id = $data;

      if (!$this->User->exists()) {
          throw new NotFoundException(__('Utilisateur inexistant'));
      }

      $user = $this->User->read(null, $data);

    }else{

      $user = $this->User->findBySlug($data);

      if (!$this->User->exists($user['User']['id'])) {
          throw new NotFoundException(__('Utilisateur inexistant'));
      }

      $this->User->id = $user['User']['id'];
    }

    // Set User Data
    $this->set('user', $user);

    // Choose Layout
    if (
      empty($user['User']['bio']) &&
      empty($user['User']['favorite_author']) &&
      empty($user['User']['inspiration']) &&
      empty($user['User']['favorite_book']) &&
      empty($user['User']['social_writting'])
    ){

      $this->set('emptyProfil', true);
    }

    // Set Last Contrib Data with all authors
    $trees = $this->User->Contribution->getLastContrib($this->User->id);

    for ($i=0 ; $i < count($trees) ; $i++) {
        $trees[$i]['Tree']['users'] = $this->User->Contribution->getTreeAuthors($trees[$i]['Tree']['id']);
    }

    $this->set('trees', $trees);
  }

  public function register() {

    if (!empty($this->request->data) && $this->request->is('post')) {

      // Confirm Password
      if ($this->request->data['User']['password'] != $this->request->data['User']['password_confirm']) {
          $this->Session->setFlash(__('Les mots de passe ne correspondent pas.'), 'alert-box', array('class'=>'alert-danger'));
      }

      // Check User ID (For avatar folder path)
      $lastUser = $this->User->find('first', array('order' => array('User.id' => 'DESC') ));

      if($lastUser){
          $userId   = $lastUser['User']['id'] + 1;
      }else {
          $userId   = 1;
      }

      // Add Verification token
      $this->request->data['User']['token'] = $this->User->generateToken();

      // Start User insertion
      $this->User->create();

      // Avatar Upload
      if (!empty($this->request->data['User']['avatar_file']['name'])) {

        $extension  = strtolower(pathinfo($this->request->data['User']['avatar_file']['name'], PATHINFO_EXTENSION));
        $slug       = strtr($this->request->data['User']['name'].'.'.$extension, 'áàâäãåçéèêëíìîïñóòôöõúùûüýÿ', 'aaaaaaceeeeiiiinooooouuuuyy');
        $dir        = new Folder(IMAGES . 'avatars' . DS . $userId, true);
        $path       = $dir->path;

        if(in_array($extension, array('jpg', 'jpeg', 'png')) ){
          move_uploaded_file($this->request->data['User']['avatar_file']['tmp_name'], $dir->path . DS .$slug);
          $this->User->saveField('avatar', 'avatars'. '/' .$userId. '/' .$slug);
        }
      }
      else {
        $this->User->saveField('avatar', DEFAULT_AVATAR);
      }

      // Cover Upload
      if (!empty($this->request->data['User']['cover_file']['name'])) {

        $extension  = strtolower(pathinfo($this->request->data['User']['cover_file']['name'], PATHINFO_EXTENSION));
        $slug       = strtr($this->request->data['User']['name'].'.'.$extension, 'áàâäãåçéèêëíìîïñóòôöõúùûüýÿ', 'aaaaaaceeeeiiiinooooouuuuyy');
        $dir        = new Folder(IMAGES . 'covers' . DS . $userId, true);
        $path       = $dir->path;

        if(in_array($extension, array('jpg', 'jpeg', 'png')) ){
          move_uploaded_file($this->request->data['User']['cover_file']['tmp_name'], $dir->path . DS .$slug);
          $this->User->saveField('cover', 'covers'. '/' .$userId. '/' .$slug);
        }
      }
      else {
        $this->User->saveField('cover', DEFAULT_COVER);
      }

      // Validate
      if ($this->User->save($this->request->data)) {

        // generate verif email
        $Email = new CakeEmail('registration');
        $Email
          ->to($this->request->data['User']['mail'])
          ->viewVars( array(
            'name'  => $this->request->data['User']['name'],
            'token' => $this->request->data['User']['token'])
          )
          ->send();

        $this->Session->setFlash(__('Un E-mail de confirmation à été envoyé à l\'adresse '.$this->request->data['User']['mail']), 'alert-box', array('class'=>'alert-info'));

        return $this->redirect(array('controller' => 'pages', 'action' => 'display', 'bienvenue' ));

      }else {

        $this->Session->setFlash(__('Une erreur est survenue. Merci de réessayer.'), 'alert-box', array('class'=>'alert-danger'));

      }
    }
  }

  public function edit($data = null) {

    $user   = $this->User->findBySlug($data);
    $id     = $user['User']['id'];

    $this->User->id = $id;

    if (!$this->User->exists()) {
          throw new NotFoundException(__('Utilisateur inexistant'));
      }

    if ($this->request->is(array('post', 'put'))) {
      $values = $this->request->data['User'];

      if (!empty($this->request->data['User']['new_pass']) && !empty($this->request->data['User']['old_pass'])) {
        if ($this->validPassword($user, $values['old_pass'], $values['new_pass'], $values['new_pass_bis'])) {
          $this->request->data['User']['password'] = $values['new_pass'];
        }else {
          unset($this->User->data['User']['password']);
        }
      }

      /* Avatar upload */
      if (!empty($this->request->data['User']['avatar_file']['name']) && isset($this->request->data['User']['avatar_file']['name'])) {

        $extension  = strtolower(pathinfo($this->request->data['User']['avatar_file']['name'], PATHINFO_EXTENSION));
        $slug       = strtr($this->request->data['User']['name'].'.'.$extension, 'áàâäãåçéèêëíìîïñóòôöõúùûüýÿ', 'aaaaaaceeeeiiiinooooouuuuyy');
        $dir        = new Folder(IMAGES . 'avatars' . DS . $id, true);

        // Delete previous thumbnails
        $files = glob($dir->path.'/*');// get all file names
        if (isset($files) && !empty($files))
        {
          foreach($files as $file){ // iterate files
            if(is_file($file))
              unlink($file); // delete file
          }
        }

        if (file_exists($dir->path . DS . $slug)){
          $slug = strtr($this->request->data['User']['name'] . '.' . $extension, 'áàâäãåçéèêëíìîïñóòôöõúùûüýÿ', 'aaaaaaceeeeiiiinooooouuuuyy');
        }

        if(in_array($extension, array('jpg', 'jpeg', 'png')) ){
          move_uploaded_file($this->request->data['User']['avatar_file']['tmp_name'], $dir->path . DS .$slug);
          $this->request->data['User']['avatar'] = 'avatars' . '/' . $id . '/' . $slug;
        }
      }

      /* Cover upload */
      if (!empty($this->request->data['User']['cover_file']['name']) && isset($this->request->data['User']['cover_file']['name'])) {

        $extension  = strtolower(pathinfo($this->request->data['User']['cover_file']['name'], PATHINFO_EXTENSION));
        $slug       = strtr($this->request->data['User']['name'].'.'.$extension, 'áàâäãåçéèêëíìîïñóòôöõúùûüýÿ', 'aaaaaaceeeeiiiinooooouuuuyy');
        $dir        = new Folder(IMAGES . 'covers' . DS . $id, true);

        // Delete previous thumbnails
        $files = glob($dir->path.'/*');
        if (isset($files) && !empty($files))
        {
          foreach($files as $file){
            if(is_file($file))
              unlink($file);
          }
        }

        if (file_exists($dir->path . DS . $slug)){
            $slug = strtr($this->request->data['User']['name'] . '.' . $extension, 'áàâäãåçéèêëíìîïñóòôöõúùûüýÿ', 'aaaaaaceeeeiiiinooooouuuuyy');
        }

        if(in_array($extension, array('jpg', 'jpeg', 'png')) ){
            move_uploaded_file($this->request->data['User']['cover_file']['tmp_name'], $dir->path . DS .$slug);
            $this->request->data['User']['cover'] = 'covers' . '/' . $id . '/' . $slug;
        }
      }

      if (!empty($this->request->data['User']['facebook'])) {
        $str = substr($this->request->data['User']['facebook'], 0, 4);
        if ($str != 'http') {
          $this->Session->setFlash(__('Le lien facebook doit commencer par "HTTP"'), 'alert-box', array('class'=>'alert-danger'));

          return $this->redirect($this->referer());
        }
      }
      if (!empty($this->request->data['User']['twitter'])) {
        $str = substr($this->request->data['User']['twitter'], 0, 4);
        if ($str != 'http') {
          $this->Session->setFlash(__('Le lien twitter doit commencer par "HTTP"'), 'alert-box', array('class'=>'alert-danger'));

          return $this->redirect($this->referer());
        }
      }
      if (!empty($this->request->data['User']['website'])) {
        $str = substr($this->request->data['User']['website'], 0, 4);
        if ($str != 'http') {
          $this->Session->setFlash(__('Le lien de votre site doit commencer par "HTTP"'), 'alert-box', array('class'=>'alert-danger'));

          return $this->redirect($this->referer());
        }
      }

      // Save User
      if ($this->User->save($this->request->data)) {
          $this->clear_cache();
          $this->Session->setFlash(__('Mise à jour effectuée'), 'alert-box', array('class'=>'alert-success'));
          $this->Session->write('Auth', $this->User->read(null, $this->Auth->User('id')));
      } else {
          $this->Session->setFlash(__('L\'utilisateur n\'a pas été édité. Merci de réessayer.'), 'alert-box', array('class'=>'alert-danger'));
      }
    }

    // Set User Data
    $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
    $this->request->data = $this->User->find('first', $options);
    $this->set('user', $this->request->data);
  }

  public function delete($id = null) {

      $this->User->id = $id;

      if (!$this->User->exists()) {
          throw new NotFoundException(__('Utilisateur invalide'));
      }
      if ($this->User->delete()) {
          $this->Session->setFlash(__('Utilisateur supprimé'), 'alert-box', array('class'=>'alert-success'));
      }else {
          $this->Session->setFlash(__('L\'utilisateur n\'a pas été supprimé. Merci de réessayer.'), 'alert-box', array('class'=>'alert-danger'));
      }

      return $this->redirect($this->referer());
  }

  // ==ADMIN

  public function admin_index() {

      $this->set('users', $this->paginate());
  }

  public function admin_edit($id = null) {
      $this->User->id = $id;
      if (!$this->User->exists()) {
          throw new NotFoundException(__('Utilisateur Invalide'));
      }

      if ($this->request->is(array('post', 'put'))) {

        // Avatar Upload
        if (!empty($this->request->data['User']['avatar_file']['name']) && isset($this->request->data['User']['avatar_file']['name'])) {

          $extension  = strtolower(pathinfo($this->request->data['User']['avatar_file']['name'], PATHINFO_EXTENSION));
          $slug       = strtr($this->request->data['User']['name'].'.'.$extension, 'áàâäãåçéèêëíìîïñóòôöõúùûüýÿ', 'aaaaaaceeeeiiiinooooouuuuyy');
          $dir        = new Folder(IMAGES . 'avatars' . DS . $id, true);

          // Delete previous thumbnails
          $files = glob($dir->path.'/*');// get all file names
          foreach($files as $file){ // iterate files
            if(is_file($file))
              unlink($file); // delete file
          }

          if (file_exists($dir->path . DS . $slug)){
              $slug = strtr($this->request->data['User']['name'] . '.' . $extension, 'áàâäãåçéèêëíìîïñóòôöõúùûüýÿ', 'aaaaaaceeeeiiiinooooouuuuyy');
          }

          if(in_array($extension, array('jpg', 'jpeg', 'png')) ){
              move_uploaded_file($this->request->data['User']['avatar_file']['tmp_name'], $dir->path . DS .$slug);
              $this->User->saveField('avatar', 'avatars' . '/' . $id . '/' . $slug);
          }
        }

        // Cover Upload
        if (!empty($this->request->data['User']['cover_file']['name']) && isset($this->request->data['User']['cover_file']['name'])) {

          $extension  = strtolower(pathinfo($this->request->data['User']['cover_file']['name'], PATHINFO_EXTENSION));
          $slug       = strtr($this->request->data['User']['name'].'.'.$extension, 'áàâäãåçéèêëíìîïñóòôöõúùûüýÿ', 'aaaaaaceeeeiiiinooooouuuuyy');
          $dir        = new Folder(IMAGES . 'covers' . DS . $id, true);

          // Delete previous thumbnails
          $files = glob($dir->path.'/*');// get all file names
          foreach($files as $file){ // iterate files
            if(is_file($file))
              unlink($file); // delete file
          }

          if (file_exists($dir->path . DS . $slug)){
              $slug = strtr($this->request->data['User']['name'] . '.' . $extension, 'áàâäãåçéèêëíìîïñóòôöõúùûüýÿ', 'aaaaaaceeeeiiiinooooouuuuyy');
          }

          if(in_array($extension, array('jpg', 'jpeg', 'png')) ){
              move_uploaded_file($this->request->data['User']['cover_file']['tmp_name'], $dir->path . DS .$slug);
              $this->request->data['User']['cover'] = 'covers' . '/' . $id . '/' . $slug;
          }
        }

        // Save User
        if ($this->User->save($this->request->data)) {
          $this->Session->setFlash(__('Mise à jour effectuée'), 'alert-box', array('class'=>'alert-success'));
          $this->Session->write('Auth', $this->User->read(null, $this->Auth->User('id')));
          return $this->redirect($this->referer());

        } else {
          $this->Session->setFlash(__('L\'utilisateur n\'a pas été édité. Merci de réessayer.'), 'alert-box', array('class'=>'alert-danger'));
        }
      }

      // Set User Data
      $options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
      $this->request->data = $this->User->find('first', $options);
      $this->set('user', $this->request->data);

      // Set Contributions Data
      $contributions = $this->User->Contribution->getUserContrib($id);
      $this->set('contributions', $contributions);

      // Set Role data (For select edit)
      $roles = $this->User->Role->find('list');
      $this->set('roles', $roles);
  }

  public function admin_suspend($id = null) {

      $this->User->id = $id;

      if (!$this->User->exists()) {
          throw new NotFoundException(__('Utilisateur invalide'));
      }
      if ($this->User->saveField('status', 2)) {
          $this->Session->setFlash(__('Utilisateur supprimé'), 'alert-box', array('class'=>'alert-success'));
          return $this->redirect($this->referer());
      }

      $this->Session->setFlash(__('L\'utilisateur n\'a pas été supprimé. Merci de réessayer.'), 'alert-box', array('class'=>'alert-danger'));
      return $this->redirect($this->referer());
  }

  public function admin_approve($id = null) {

      $this->User->id = $id;

      if (!$this->User->exists()) {
          throw new NotFoundException(__('Utilisateur invalide'));
      }
      if ($this->User->saveField('status', 3)) {
          $this->Session->setFlash(__('Utilisateur approuvé'), 'alert-box', array('class'=>'alert-success'));
          return $this->redirect($this->referer());
      }

      $this->Session->setFlash(__('L\'utilisateur n\'a pas été approuvé. Merci de réessayer.'), 'alert-box', array('class'=>'alert-danger'));
      return $this->redirect($this->referer());
  }

  // ==CUSTOM

  public function login() {

    if ($this->request->is('post')) {
        if ($this->Auth->login()) {
            return $this->Auth->user('role_id') == 1 ?
            $this->redirect(array('controller' => 'users', 'action' => 'index', 'admin' => true)) :
            $this->redirect(array('controller' => 'users', 'action' => 'profile', 'slug' => $this->Auth->user('slug'), 'admin' => false));
        } else {
            $this->Session->setFlash(__('Mail ou mot de passe invalide'), 'alert-box', array('class'=>'alert-danger'));
        }
    }

  }

  public function logout() {
      return $this->redirect($this->Auth->logout());
  }

  public function validPassword($user, $oldPassword, $newPassword, $newPasswordBis){

    if ($newPassword != $newPasswordBis) {

      $this->Session->setFlash(__('Les deux motes de passes ne correspondent pas !'), 'alert-box', array('class'=>'alert-danger'));
      return $this->redirect($this->referer());
    }

    $passwordHasher = new SimplePasswordHasher();
    $oldPassword = $passwordHasher->hash($oldPassword);

    if ($user['password'] === $oldPassword) {

      $this->Session->setFlash(__('Mot de passe incorrect'), 'alert-box', array('class'=>'alert-danger'));
      return $this->redirect($this->referer());
    }

    return true;
  }

  /**
   * function to reset user password
   *
   *
   */
  public function forgetPassword($slug=null) {

    // Set template data
    $this->set('layoutFooter', 'footer/main');

    if ($this->request->is('post') && !empty($this->request->data)) {

      $user = $this->User->findByMail($this->request->data['User']['mail']);

      if (!$user) {

          $this->Session->setFlash(__('Adresse introuvable'), 'alert-box', array('class'=>'alert-info'));

          return $this->redirect($this->referer());
      }

      $this->User->id = $user['User']['id'];

      $password = $this->User->generatePassword();

      $this->User->saveField('password', $password);

      // generate verif email
      $Email = new CakeEmail('forgetPassword');
      $Email->to($this->request->data['User']['mail'])
              ->viewVars( array('pass' => $password) )
              ->send();
      $this->Session->setFlash(__('Un E-mail à été envoyé à l\'adresse '.$this->request->data['User']['mail']), 'alert-box', array('class'=>'alert-info'));

    }
  }

  public function confirmRegister($token=null) {

    $user = $this->User->findByToken($token);

    if ($user) {
      // Update User status
      $this->User->id = $user['User']['id'];
      $this->User->saveField('status', 3);

      // Log User in
      $this->Auth->login($user['User']);
      $this->Session->setFlash(__('Bienvenue sur Inédits'), 'alert-box', array('class'=>'alert-success'));
      return $this->redirect(array('controller' => 'users', 'action' => 'profile', 'slug' => $user['User']['slug'] ));
    }
    else {
      $this->Session->setFlash(__('Erreur requête'), 'alert-box', array('class'=>'alert-danger'));
      return $this->redirect(array('controller' => 'users', 'action' => 'login' ));
    }
  }

  public function begin() {
    exit("coucou");
  }

  /**
   * function to clear all cache data
   * by default accessible only for admin
   *
   * @access Public
   * @return void
   */
  public function clear_cache() {
    Cache::clear();
    clearCache();
  }
}
