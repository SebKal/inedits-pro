<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
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
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

  // Route Parser
  Router::parseExtensions('json');

  // Global
  Router::connect(
    '/',
    array(
      'controller'  => 'contributions',
      'action'      => 'index'
    )
  );

  // Trees
  Router::connect(
    '/arbres',
    array(
      'controller'  => 'trees',
      'action'      => 'index'
    )
  );
  Router::connect(
    '/arbres/:slug',
    array(
      'controller'  => 'trees',
      'action'      => 'view'
    ),
    array(
      'pass' => array('slug')
    )
  );
  Router::connect(
    '/arbres/:slug/start',
    array(
      'controller' => 'trees',
      'action' => 'start'
    ),
    array(
      'pass' => array('slug')
    )
  );

  Router::connect(
    '/arbres/:title/contribution/:slug',
    array(
      'controller' => 'contributions',
      'action' => 'view'
    ),
    array(
      'pass' => array('slug')
    )
  );
  Router::connect(
    '/arbres/:arbre/ajouter/:contribution/:user',
    array(
      'controller'  => 'contributions',
      'action'      => 'add'
    ),
    array(
      'pass' => array(
        'arbre',
        'contribution',
        'user'
      )
    )
  );
  // Router::connect(
  //   '/arbres/ajouter',
  //   array(
  //     'controller'  => 'trees',
  //     'action'      => 'add'
  //   )
  // );

  // Users
  Router::connect(
    '/auteurs',
    array(
      'controller'  => 'users',
      'action'      => 'index'
    )
  );
  Router::connect(
    '/inscription',
    array(
      'controller'  => 'users',
      'action'      => 'register',
      'admin'       => false
    )
  );
  Router::connect(
    '/connexion',
    array(
      'controller'  => 'users',
      'action'      => 'login',
      'admin'       => false
    )
  );
  Router::connect(
    '/logout',
    array(
      'controller'  => 'users',
      'action'      => 'logout',
      'admin'       => false
    )
  );
  Router::connect(
    '/profile/:slug',
    array(
      'controller'  => 'users',
      'action'      => 'profile'
      ),
    array(
      'pass' => array('slug')
    )
  );
  Router::connect(
    '/profil/:slug/modifier',
    array(
      'controller'  => 'users',
      'action'      => 'edit'
    ),
    array(
      'pass' => array('slug')
    )
  );
  Router::connect(
    '/profil/:slug/modifier/mot-de-passe',
    array(
      'controller'  => 'users',
      'action'      => 'changePass'
    ),
    array(
      'pass' => array('slug')
    )
  );

  // Admin
  Router::connect(
    '/admin',
    array(
      'controller'  => 'contributions',
      'action'      => 'index',
      'admin'       => true
    )
  );
  Router::connect(
    '/admin/users/login',
    array(
      'controller'  => 'users',
      'action'      => 'login',
      'admin'       => false
    )
  );
  Router::connect(
    '/admin/utilisateurs',
    array(
      'controller'  => 'users',
      'action'      => 'index',
      'admin'       => true
    )
  );
  Router::connect(
    '/admin/arbres',
    array(
      'controller'  => 'trees',
      'action'      => 'index',
      'admin'       => true
    )
  );
  Router::connect(
    '/admin/contributions',
    array(
      'controller'  => 'contributions',
      'action'      => 'index',
      'admin'       => true
    )
  );

  // Mailings
  Router::connect(
    '/mails/parrainer',
    array(
      'controller'  => 'mailings',
      'action'      => 'add'
    )
  );
  Router::connect(
    '/contact/send',
    array(
      'controller'  => 'contacts',
      'action'      => 'send'
    )
  );

/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
  Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
  CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
  require CAKE . 'Config' . DS . 'routes.php';
