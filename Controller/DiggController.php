<?php
/**
 * Digg Controller
 *
 */
class DiggController extends AppController {

    public function __construct() {
        //echo "contruct@DiggController\n";
    }

    public function index() {
        $digg_obj = $this->model('Digg');
        $html = $digg_obj->getExample();

        $mail_body = '';
        foreach ($html as $k => $v) {
            $mail_body .= "-----------------------------------------\n";
            $mail_body .= 'Title: ' . $v['title'] . "\n";
            $mail_body .= 'Details: ' . $v['details'] . "\n";
            $mail_body .= 'Diggs: ' . $v['diggs'] . "\n";
        }

        return $mail_body;
    }

}