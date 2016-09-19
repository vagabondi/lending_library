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

$escString = function ($dbConn, $param) {
    return mysqli_real_escape_string($dbConn, $param);
};

if($_SERVER['REQUEST_METHOD']==='GET') {
    if(isset($_GET['id'])) {
        $book = new Book($dbConn);
        $id = (int)$_GET['id'];
        $book->load($id);
        echo json_encode($book);
    } else {
        $ids = $getIds($dbConn);
        $objects = [];
        foreach ($ids as $value) {
            $book = new Book($dbConn);
            $book->load($value);
            $objects[$value] = $book;
        }

        echo json_encode($objects);
    }

} elseif($_SERVER['REQUEST_METHOD']==='POST') {
    $book = new Book($dbConn);
    $title = $escString($dbConn, $_POST['title']);
    $author = $escString($dbConn, $_POST['author']);
    $description = $escString($dbConn, $_POST['description']);

    $book->create($title, $author, $description);
}

require_once ('src/foot.inc.php');