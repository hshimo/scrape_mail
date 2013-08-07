<?php
/**
 * Scrape Mail:
 *  scrape web pages and send email
 *
 * How to use:
 *  % php -f ./scrape_mail.php
 *
 *
 */
define('SM_START_TIME', microtime(true));
define('SM_ROOT_PATH', dirname(__FILE__));
define('DS', DIRECTORY_SEPARATOR);
require_once(SM_ROOT_PATH . DS . 'Config' . DS . 'init.php');
// initialize variables
$controller = 'default';
$action = 'index';
$verbose = false;
$mail_body = "Dear User,\nScrape Mail didn't scrape anything.\nCheck scraping setting.\n\n";

// parse command line arguments
$short_opt = 'c:a:hv';
$long_opt = array('controller:', 'action:', 'help', 'version');
$options = getopt($short_opt, $long_opt);
//print_r($options);
if (isset($options['c'])) $controller = $options['c'];
if (isset($options['a'])) $action = $options['a'];
//if (isset($options['h']) || isset($options['help'])) show_help();
//if (isset($options['v']) || isset($options['version'])) show_version();
//pr('test');

// get mail default config
require_once SM_DEFAULT_MAIL_CONFIG;

// include base controller & model
require_once(SM_CONTROLLER_PATH  . DS . 'AppController.php');
require_once(SM_MODEL_PATH . DS . 'AppModel.php');

// include controller
//if (!$controller) die("No controler specified.\n" );
$controller_file = SM_CONTROLLER_PATH . DS . ucwords($controller) . 'Controller.php';
if (!file_exists($controller_file)) {
    echo "Controller file doesn't exit. file: " . $controller_file . "\n";
} else {
    include $controller_file;
}
// include model
//if (!file_exists(SM_MODEL_PATH . DS . ucwords($controller) . '.php')) {
//    echo "Model file doesn't exit. " . SM_MODEL_PATH . DS . ucwords($controller) . '.php' . "\n";
//} else {
//    include SM_MODEL_PATH . DS . ucwords($controller) . '.php';
//}
$class_name = ucwords($controller) . 'Controller';
$kernel = new $class_name;
// execute action
if (!method_exists($kernel, $action)) {
    die("Action doesn't exist." . $action ."\n");
}
$mail_body = $kernel->$action();

// override mail config if it exits
$mail_config_file = SM_CONFIG_PATH . DS . 'mail.' . $controller . '.php';
if (file_exists($mail_config_file)) include $mail_config_file;

// Send email
if (SM_SEND_MAIL_FLAG) {
    //sendMail($sm_mail['to'], $sm_mail['subject'], $mail_body, $sm_mail['to'], $sm_mail['sender_name']);
} else {
    echo "I did not send email because sending mail setting is false.\n";
    echo "Mail body you were trying to send.\n";
    echo "---\n";
    echo $mail_body;
    echo "---\n";
}

// finish
define('SM_END_TIME', microtime(true));
$elapsed_time = SM_END_TIME - SM_START_TIME;
print "Finished\n" . $elapsed_time . " elapsed\n\n";

exit;