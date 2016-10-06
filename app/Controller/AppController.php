<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package   app.Controller
 * @link      http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

  public $components = array(
    'Session',
    'Auth' => array(
      'logoutRedirect' => array('controller' => '/'),
      'authorize' => array('Controller'),
      'authenticate' => array(
        'Form' => array(
          'fields'  => array('username' => 'mail'),
          'scope'   => array('User.status' => 3)
        )
      )
    ),
    'RequestHandler'
  );

  public $helpers = array('Media.Media');

  public function beforeFilter(){

    parent::beforeFilter();

    // First Visit
    if ($this->Session->read('firstVisit'))
    {
      $this->set('firstVisit', false);
    }else {
      $this->set('firstVisit', true);
    }
    // Access Token
    if (!$this->Session->read('access_token_pro')){
      $this->Session->write('access_token_pro', false);
      if (!$this->request->url == "begin") {
        $this->redirect(array('controller' => 'users', 'action' => 'begin'));
      }
    }

    // Le précieux Sésame
    if ($this->request->url == "sesamOuvresToi"){
      $this->Session->write('sesam', true);
    }
    if ($this->request->url == "sesamFermesToi"){
      $this->Session->write('sesam', false);
    }

    if (IS_PRE_PROD && !$this->Session->read('sesam')){
      $this->redirect('http://inedits.fr');
    }
    else if ($this->request->url === "sesamOuvresToi" && $this->Session->read('sesam') ) {
      $this->redirect('/');
    }

    // Admin Lock
    if ($this->params['admin']) {
      if ($this->Auth->user('role_id') != 1 && $this->Auth->user('role_id') != 4) {
        $this->redirect($this->referer());
      }
    }

    // Alter layout if ajax
    if($this->RequestHandler->isAjax()){
      $this->layout = null;
    }

    // Choose layout
    if(isset($this->params['admin'])){
      $this->layout = 'dashboard';
      $this->Auth->loginRedirect = array(
        'controller'=>'contributions',
        'action'=>'admin_index',
        'admin'=>true
      );
    }else{
      $this->layout = 'inedit';
    }

    // Loggedout Allowed functions
    $this->Auth->allow('display');

    // Find globals Variables
    $lastTrees      = ClassRegistry::init('Tree')->getLastTrees(3);
    $lastUsers      = ClassRegistry::init('User')->getLastUsers(5);

    $this->set('lastTrees', $lastTrees);
    $this->set('lastUsers', $lastUsers);

    $approvedUsers  = ClassRegistry::init('User')
                      ->find('all', array(
                          'conditions' => array(
                            'status' => 3
                          )
                        ));
    $this->set('approvedUsers', $approvedUsers);

    $suspendedUsers = ClassRegistry::init('User')
                      ->find('all', array(
                          'conditions' => array(
                            'User.status' => 2
                          )
                        ));
    $this->set('suspendedUsers', $suspendedUsers);

    $pendingUsers = ClassRegistry::init('User')
                    ->find('count', array(
                          'conditions' => array(
                            'User.status' => 1
                          )
                        ));
    $this->set('pendingUsers', $pendingUsers);

    $pendingContrib  = ClassRegistry::init('Contribution')->find('count', array(
                          'conditions' => array(
                            'Contribution.status' => 1
                          )
                        ));
    $this->set('pendingContrib', $pendingContrib);

    $approvedContrib  = ClassRegistry::init('Contribution')->find('count', array(
                          'conditions' => array(
                            'Contribution.status' => 3
                          )
                        ));
    $this->set('approvedContrib', $approvedContrib);

    $letterCount      = ClassRegistry::init('Contribution')->find('all', array(
                            'fields' => 'sum(Contribution.letter_count) AS total'
                          ));
    $this->set('letterCount', $letterCount);

    // Define Body classes for css triggering
    if ($this->request->params['controller'] === 'pages') {
        $this->set('bodyClass', $this->request->params['controller'].'-'.$this->request->params['pass'][0]);
    }else {
        $this->set('bodyClass', $this->request->params['controller'].'-'.$this->request->params['action']);
    }

    if ($this->Auth->user()['role_id'] === 4)
    {
      $this->set('rootEntreprises', ClassRegistry::init('Contribution')->find('list', array(
        'fields' => array('Entreprise.id', 'Entreprise.name'),
        'conditions' => array(
          'Entreprise.user_id' => $this->Auth->user()['id']
        )
      )));
    }
    if ($this->Auth->user()['role_id'] === 1)
    {
      $this->set('rootEntreprises', ClassRegistry::init('Contribution')->find('list', array(
        'fields' => array('Entreprise.id', 'Entreprise.name')
      )));
    }

    // Set global views data
    $this->set('currentUser', $this->Auth->user());
  }

  public function afterFilter() {
    parent::afterFilter();

    $this->Session->write('firstVisit', true);
  }

  public function isAuthorized($user) {
    // Allow All for Admin
    if (isset($user['role_id'])) {
      if ($user['role_id'] == 1 || $user['role_id'] == 4) {
        return true;
      }
    }

    $this->Session->setFlash(__('Accès non autorisé'), 'alert-box', array('class'=>'alert-danger'));

    return false;
  }

}
