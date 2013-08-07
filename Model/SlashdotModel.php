<?php
/**
 * Slashdot model
 *
 */
class SlashdotModel extends AppModel {

    public $url = 'http://slashdot.org/';

    public function __construct()
    {
        //echo "construct@SlashdotModel\n";
    }

    public function getExample()
    {
        // create HTML DOM
        $html = file_get_html($this->url);

        // get news block
        $ret = array();
        foreach ($html->find('div#firehoselist article[id^=firehose-]') as $article) {
            // get title
            $item['title'] = trim($article->find('h2.story span a', 0)->plaintext);
            // get details
            $item['details'] = trim($article->find('div.body div[id^=text-]', 0 )->plaintext);
            $ret[] = $item;
        }

        // clean up memory
        $html->clear();
        unset($html);

        //var_dump($ret);

        return $ret;
    }
}