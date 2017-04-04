<?php
/**
 *
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
 * @since         CakePHP(tm) v 2.0.0
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

/**
 * This is email configuration file.
 *
 * Use it to configure email transports of CakePHP.
 *
 * Email configuration class.
 * You can specify multiple configurations for production, development and testing.
 *
 * transport => The name of a supported transport; valid options are as follows:
 *  Mail - Send using PHP mail function
 *  Smtp - Send using SMTP
 *  Debug - Do not send the email, just return the result
 *
 * You can add custom transports (or override existing transports) by adding the
 * appropriate file to app/Network/Email. Transports should be named 'YourTransport.php',
 * where 'Your' is the name of the transport.
 *
 * from =>
 * The origin email. See CakeEmail::from() about the valid values
 *
 */
class EmailConfig {

	public $registration = array(
		'transport'			=> 'Smtp',
		'from'					=> array(ADMIN_EMAIL => 'Clémence d\'Inedit | La première plateforme d\'écriture collaborative'),
		'subject'				=> 'Inscription sur Inédit',
		'template'			=> 'registration',
		'host'					=> 'pro.turbo-smtp.com',
		'port'					=> 25,
		'timeout'				=> 30,
		'username'			=> ADMIN_EMAIL,
		'password'			=> EMAIL_PASSWORD,
		'client'				=> null,
		'log'						=> false,
		'emailFormat'		=>  'html',
		'charset'				=> 'utf-8',
		'headerCharset'	=> 'utf-8',
	);

  public $contact = array(
    'transport'     => 'Smtp',
    'to'            => REPORT_ABUSE_EMAIL,
    'from'          => array(ADMIN_EMAIL => 'Clémence d\'Inedit | La première plateforme d\'écriture collaborative'),
    'template'      => 'contact',
    'host'          => 'pro.turbo-smtp.com',
    'port'          => 25,
    'timeout'       => 30,
    'username'      => ADMIN_EMAIL,
    'password'      => EMAIL_PASSWORD,
    'client'        => null,
    'log'           => false,
    'emailFormat'   =>  'html',
    'charset'       => 'utf-8',
    'headerCharset' => 'utf-8',
  );

	public $mailing = array(
		'transport' => 'Smtp',
		'from' => array(ADMIN_EMAIL => 'Inedit | La première plateforme d\'écriture collaborative'),
		'subject' => 'Invitation Inédits',
		'template' => 'mailing',
		'host' => 'pro.turbo-smtp.com',
		'port' => 25,
		'timeout' => 30,
		'username' => ADMIN_EMAIL,
		'password' => EMAIL_PASSWORD,
		'client' => null,
		'log' => false,
		'emailFormat' =>  'html',
		'charset' => 'utf-8',
		'headerCharset' => 'utf-8',
	);

	public $forgetPassword = array(
		'transport' => 'Smtp',
		'from' => array(ADMIN_EMAIL => 'Inedit | La première plateforme d\'écriture collaborative'),
		'subject' => 'Réinitialisation du mot de passe',
		'template' => 'forgetPassword',
		'host' => 'pro.turbo-smtp.com',
		'port' => 25,
		'timeout' => 30,
		'username' => ADMIN_EMAIL,
		'password' => EMAIL_PASSWORD,
		'client' => null,
		'log' => false,
		'emailFormat' =>  'html',
		'charset' => 'utf-8',
		'headerCharset' => 'utf-8',
	);

	public $newContrib = array(
		'transport' => 'Smtp',
		'from' => array(ADMIN_EMAIL => 'Inedit | La première plateforme d\'écriture collaborative'),
		'subject' => 'Participation à Inedits',
		'template' => 'new_contrib',
		'host' => 'pro.turbo-smtp.com',
		'port' => 25,
		'timeout' => 30,
		'username' => ADMIN_EMAIL,
		'password' => EMAIL_PASSWORD,
		'client' => null,
		'log' => false,
		'emailFormat' =>  'html',
		'charset' => 'utf-8',
		'headerCharset' => 'utf-8',
	);

	public $adminNewContrib = array(
		'transport' => 'Smtp',
		'to' => CONTRIB_EMAIL,
		'from' => array(ADMIN_EMAIL => 'Inedit | La première plateforme d\'écriture collaborative'),
		'subject' => 'Nouvelle Contribution !',
		'template' => 'admin_new_contrib',
		'host' => 'pro.turbo-smtp.com',
		'port' => 25,
		'timeout' => 30,
		'username' => ADMIN_EMAIL,
		'password' => EMAIL_PASSWORD,
		'client' => null,
		'log' => false,
		'emailFormat' =>  'html',
		'charset' => 'utf-8',
		'headerCharset' => 'utf-8',
	);

	public $approveContrib = array(
		'transport' => 'Smtp',
		'from' => array(ADMIN_EMAIL => 'Inedit | La première plateforme d\'écriture collaborative'),
		'subject' => 'Participation à Inedits',
		'template' => 'approve_contrib',
		'host' => 'pro.turbo-smtp.com',
		'port' => 25,
		'timeout' => 30,
		'username' => ADMIN_EMAIL,
		'password' => EMAIL_PASSWORD,
		'client' => null,
		'log' => false,
		'emailFormat' =>  'html',
		'charset' => 'utf-8',
		'headerCharset' => 'utf-8',
	);

	public $denyContrib = array(
		'transport' => 'Smtp',
		'from' => array(ADMIN_EMAIL => 'Inedit | La première plateforme d\'écriture collaborative'),
		'subject' => 'Participation à Inedits',
		'template' => 'deny_contrib',
		'host' => 'pro.turbo-smtp.com',
		'port' => 25,
		'timeout' => 30,
		'username' => ADMIN_EMAIL,
		'password' => EMAIL_PASSWORD,
		'client' => null,
		'log' => false,
		'emailFormat' =>  'html',
		'charset' => 'utf-8',
		'headerCharset' => 'utf-8',
	);

		public $reportAbuse = array(
		'transport'     => 'Smtp',
		'from'          => array(ADMIN_EMAIL => 'Inedit | La première plateforme d\'écriture collaborative'),
    'to'            => REPORT_ABUSE_EMAIL,
		'subject'       => 'Report d\'un abus',
		'template'      => 'report_abuse',
		'host'          => 'pro.turbo-smtp.com',
		'port'          => 25,
		'timeout'       => 30,
		'username'      => ADMIN_EMAIL,
		'password'      => EMAIL_PASSWORD,
		'client'        => null,
		'log'           => false,
		'emailFormat'   =>  'html',
		'charset'       => 'utf-8',
		'headerCharset' => 'utf-8',
	);

}
