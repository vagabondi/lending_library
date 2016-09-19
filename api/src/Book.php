<?php

class Book implements JsonSerializable {
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

    function jsonSerialize()
    {
        return [
                'title'=>$this->getTitle(),
                'author'=>$this->getAuthor(),
                'description'=>$this->getDescription()
        ];
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

    public function load ($id) {
        $conn = $this->conn;
        $sql = "SELECT * FROM book WHERE id='$id'";
        $result = mysqli_query($conn, $sql);
        if($result->num_rows>0) {
            while($row = $result->fetch_assoc()) {
                $this->setTitle($row['title']);
                $this->setAuthor($row['author']);
                $this->setDescription($row['description']);
            }
        } else {
            throw new Exception('Nie ma takiej książki');
        }
    }

    public function create ($title, $author, $description) {

    }

    public function update ($id) {

    }

    public function delete ($id) {

    }
}