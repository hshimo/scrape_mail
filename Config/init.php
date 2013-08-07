<?php
/**
 * Initial setup config
 *
 */
// PHP settings
ini_set('display_errors', 'On');
//ini_set('error_log', '/tmp/scrape_mail.error.log');
error_reporting(-1); //on: -1, off: 0
// Debug
define('SM_DEBUG_PRINT', true);
// send mail flag
define('SM_SEND_MAIL_FLAG', false);

// include PATH
define('SM_CONFIG_PATH',     SM_ROOT_PATH . DS . 'Config');
define('SM_CONTROLLER_PATH', SM_ROOT_PATH . DS . 'Controller');
define('SM_LIB_PATH',        SM_ROOT_PATH . DS . 'Lib');
define('SM_MODEL_PATH',      SM_ROOT_PATH . DS . 'Model');
define('SM_VENDOR_PATH',     SM_ROOT_PATH . DS . 'Vendor');

define('SM_SIMPLE_HTML_DOM_PATH', SM_VENDOR_PATH . DS . 'simple_html_dom');

// include common library
require_once(SM_LIB_PATH . DS . 'Core.class.php');
require_once(SM_LIB_PATH . DS . 'Controller.class.php');
require_once(SM_LIB_PATH . DS . 'Model.class.php');
require_once(SM_LIB_PATH . DS . 'Common.php');
// include Simple HTML DOM
require_once(SM_SIMPLE_HTML_DOM_PATH . DS . 'simple_html_dom.php');
// include send mail library
require_once(SM_VENDOR_PATH . DS . 'sendMail' . DS . 'sendMail.php');

// set default settings
define('SM_DEFAULT_MAIL_CONFIG', SM_CONFIG_PATH . DS . 'mail.default.php');

