<?php
/**
 * Application Controller
 *
 * This file is the base controller of all other controllers
 *
 * PHP version 5
 *
 * @category Controllers
 * @package  Scrape Mail
 * @version
 * @author
 * @license
 * @link
 */
class DefaultController extends AppController {

    public function __construct() {
        //echo "contruct@DefaultController\n";
    }

    public function index() {
        //echo "Do nothing. This is default action at default controller.\n";
        $mail_body = $this->getDefaultMailBody();

        return $mail_body;
    }

    private function getDefaultMailBody() {

        return "This is Default Mail Body.\n";
    }

}