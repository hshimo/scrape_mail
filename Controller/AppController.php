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
class AppController extends Controller {

    public function __construct() {
        echo "contruct@AppController\n";
    }

    //public function beforeFilter() {}

    public function index() {
        echo "Please override this function. This is default action at AppController.\n";
    }

    //public function afterFilter() {}
}