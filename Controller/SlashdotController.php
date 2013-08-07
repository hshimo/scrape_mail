<?php
/**
 * Slashdot Controller
 *
 */
class SlashdotController extends AppController {

    public function __construct() {
        //echo "contruct@SlashdotController\n";
    }

    public function index() {
        $model = $this->model('Slashdot');
        $html = $model->getExample();

        $mail_body = '';
        foreach ($html as $k => $v) {
            $mail_body .= "-----------------------------------------\n";
            $mail_body .= 'Title: ' . $v['title'] . "\n";
            $mail_body .= 'Details: ' . $v['details'] . "\n";
        }

        return $mail_body;
    }

}