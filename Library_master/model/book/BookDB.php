<?php

class BookDB
{
    private $conn;

    public function __construct()
    {
        $db = new DBConnect();
        $this->conn = $db->connect();
    }

    public function getList()
    {
        $sql = "
            SELECT b.bookCode, b.bookName, b.authorName,ca.categoryCode, ca.categoryName,b.publishingName, b.publishingYear,b.description, b.bookImage
            FROM books b
            
            INNER JOIN categories ca
            ON b.categoryCode = ca.categoryCode
                ";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();
        $arr =[];
        foreach ($result as $item) {
            $book = $this->createBookFromResult($item);
            array_push($arr, $book);
        }
        return $arr;
    }



    public function createBookFromResult($item)
    {
        $book = new Book(

            $item['bookName'],
            $item['authorName'],
            $item['categoryCode'],
            $item['publishingName'],
            $item['publishingYear'],
            $item['description']
        );
        $book->setCategoryName($item['categoryName']);
        $book->setBookCode($item['bookCode']);
        $book->setBookImage($item['bookImage']);
        return $book;
    }
//ADD
    public function add($book)
    {

        $sql = "INSERT INTO books(bookName, authorName, categoryCode,publishingName,
            publishingYear, description, bookImage) 
            VALUES (:bookName, :authorName, :categoryCode,:publishingName,:publishingYear,:description,:bookImage)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':bookName', $book->getBookName());
        $stmt->bindParam(':authorName', $book->getAuthorName());
        $stmt->bindParam(':categoryCode', $book->getCategoryCode());
        $stmt->bindParam(':publishingName', $book->getPublishingName());
        $stmt->bindParam(':publishingYear', $book->getPublishingYear());
        $stmt->bindParam(':description', $book->getDescription());
        $stmt->bindParam(':bookImage', $book->getBookImage());
        $stmt->execute();

    }



    public function upload()
    {

        $file_name = $_FILES['bookImage']['name'];
        $file_tmp =$_FILES['bookImage']['tmp_name'];
        $file_type=$_FILES['bookImage']['type'];
        $file_ext=strtolower(end(explode('/',$_FILES['bookImage']['type'])));
        $extensions= array("jpeg","jpg","png");
        if(in_array($file_ext,$extensions)) {
            move_uploaded_file($file_tmp, "view/book/images/" . date('H:m:s') . $file_name);
        }
    }

    //EDIT

    public function getBookById($bookCode)
    {

        $sql = "
            SELECT b.bookCode, b.bookName, b.authorName,ca.categoryCode, ca.categoryName,
            b.publishingName, b.publishingYear,b.description, b.bookImage
            FROM books b
            INNER JOIN categories ca
            ON b.categoryCode = ca.categoryCode
             WHERE bookCode = $bookCode
                ";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        $book = new book($result[0]['bookName'],
            $result[0]['authorName'],
            $result[0]['categoryCode'],
            $result[0]['publishingName'],
            $result[0]['publishingYear'],
            $result[0]['description']
        );
        $book->setBookImage($result[0]['bookImage']);
        $book->setCategoryName($result[0]['categoryName']);
        $book->setBookCode($result[0]['bookCode']);
        return $book;
    }

    public function edit($bookCode, $book)
    {

        $sql = "
        UPDATE `books` SET `bookName` = :bookName, `authorName` = :authorName, 
        `categoryCode` = :categoryCode, `publishingName` = :publishingName,
        `publishingYear` = :publishingYear, `description` = :description, 
        `publishingName` = :publishingName, `bookImage` = :bookImage
        WHERE `books`.`bookCode` = :bookCode
      ";

        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':bookName', $book->getBookName());
        $stmt->bindParam(':authorName', $book->getAuthorName());
        $stmt->bindParam(':categoryCode', $book->getCategoryCode());
        $stmt->bindParam(':publishingName', $book->getPublishingName());
        $stmt->bindParam(':publishingYear', $book->getPublishingYear());
        $stmt->bindParam(':description', $book->getDescription());
        $stmt->bindParam(':bookImage', $book->getBookImage());
        $stmt->bindParam(':bookCode', $bookCode);
        $stmt->execute();
    }

    public function getBookCategories() {
        $id = $_GET['id'];

        $sql = "SELECT * FROM books INNER JOIN categories ON books.categoryCode = categories.categoryCode WHERE books.categoryCode = $id";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        $arr = [];
        foreach ($result as $item) {
            $category = new Book(

                $item['bookName'],
                $item['authorName'],
                $item['categoryCode'],
                $item['publishingName'],
                $item['publishingYear'],
                $item['description']
            );
            $category->setCategoryName($item['categoryName']);
            $category->setBookCode($item['bookCode']);
            $category->setBookImage($item['bookImage']);
            array_push($arr, $category);
        }
        return $arr;
    }



    //SERACH

    public function search($keyword)
    {
        $sql = "SELECT * FROM books inner JOIN categories on books.categoryCode = categories.categoryCode 
        WHERE books.bookName LIKE :keyword";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':keyword',"%".$keyword."%");
        $stmt->execute();
        $result = $stmt->fetchAll();

        $arr =[];
        foreach ($result as $item) {
            $search = new Book(

                $item['bookName'],
                $item['authorName'],
                $item['categoryCode'],
                $item['publishingName'],
                $item['publishingYear'],
                $item['description']
            );
            $search->setCategoryName($item['categoryName']);
            $search->setBookCode($item['bookCode']);
            $search->setBookImage($item['bookImage']);
            array_push($arr, $search);
        }
        return $arr;
    }

    //DELETE BOOK
    public function deleteBook($bookCode)
    {
        $sql = "DELETE FROM `books` WHERE bookCode = $bookCode";
        $stmt = $this->conn->query($sql);
        $stmt->execute();
    }

}

?>