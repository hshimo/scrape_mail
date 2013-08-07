<?php
/**
 * Digg model
 *
 */
class DiggModel extends AppModel {

    public $url = 'http://digg.com/';

    public function __construct()
    {
        //echo "construct@DiggModel\n";
    }

    public function getExample()
    {
        // create HTML DOM
        $html = file_get_html($this->url);

        // get news block
        $ret = array();
        foreach ($html->find('section#top-stories article') as $article) {
            // get title
            $item['title'] = trim($article->find('.story-title-link', 0)->plaintext);
            // get details
            $item['details'] = trim($article->find('.story-description', 0)->plaintext);
            // get diggs
            $item['diggs'] = trim($article->find('div.story-score', 0)->plaintext);

            $ret[] = $item;
        }

        // clean up memory
        $html->clear();
        unset($html);

        return $ret;
    }
}