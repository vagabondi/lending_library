<?php

class Book {
    private $id;
    private $title;
    private $author;
    private $description;
    private $conn;

    /**
     * Book constructor.
     * @param $conn
     */
    public function __construct($conn)
    {
        $this->id=-1;
        $this->title='';
        $this->author='';
        $this->description='';
        $this->conn = $conn;
    }

    /**
     * @return mixed
     */
    public function getConn()
    {
        return $this->conn;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function loadFromDB ($id) {

    }

    public function create ($title, $author) {

    }

    public function update ($title, $author) {

    }

    public function deleteFromDB() {

    }


}