<?php
require_once('src/top.inc.php');

$getIds = function($dbConn) {
    $ids = [];
    $sql = "SELECT id FROM book";
    $result = mysqli_query($dbConn, $sql);
    if($result->num_rows>0) {
        while ($row = $result->fetch_assoc()) {
            $ids[] = $row['id'];
        }
        return $ids;
    } else {
        throw new Exception('Brak książek');
    }
};

if($_SERVER['REQUEST_METHOD']==='GET') {
    $ids = $getIds($dbConn);
    $objects = [];
    foreach ($ids as $value) {
        $book = new Book($dbConn);
        $book->load($value);
        $serializedBook = $book->jsonSerialize();
        $objects[] = $serializedBook;
    }
    var_dump($objects);


} elseif(isset($_GET['id'])) {
    $book = new Book($dbConn);
    echo $book->load($_GET['id']);
}