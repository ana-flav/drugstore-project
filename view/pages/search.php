
<?php
use controller\SearchController;

require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/php/controller/SearchController.php');
if(isset($_POST['botaoPesquisa'])){
    if(!empty($_POST['search'])){
        $search = $_POST['search'];
        $search_drug = new SearchController();
        $search_drug->search($search);
    } else {
        echo "<h1>Por favor, insira um termo de pesquisa.</h1>";
    }
}
?>
<?php

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Drugstore</title>
    <h1> Romeana's Drugstore teste </h1>
</head>
<body>
<form action="Search.php" method="POST">
    <label for="search">Search</label>
    <input type="text" name="search" id="search">
    <button type="submit" name="botaoPesquisa">Search</button>
</form>
</form>
</body>
</html>


    