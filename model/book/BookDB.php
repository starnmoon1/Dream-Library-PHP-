<?php

class BookDB
{
    private $conn;

    public function __construct()
    {
        $db = new DBConnect();
        $this->conn = $db->connect();
    }
/// HIỂN THỊ
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

///ADD

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
//        done

    }
}


?>