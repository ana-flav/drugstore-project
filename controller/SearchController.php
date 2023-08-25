<?php

namespace controller;
use models\SearchModel;
require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/php/models/SearchModel.php');

class SearchController {
    public function search($drug) {
        $search_drug = new SearchModel();
        $search_drug->search($drug); 
    }
}

?>