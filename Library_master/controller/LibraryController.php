<?php
ob_start();

class LibraryController
{
    private $bookDB;
    private $borrowDB;
    private $categoryDB;

    public function __construct()
    {
        $this->borrowDB = new BorrowDB();
        $this->bookDB = new BookDB();
        $this->categoryDB = new CategoriesDB();
    }

    public function listBooks()
    {
        $bookList = $this->bookDB->getList();
        include_once "view/book/list.php";
    }


    public function index()
    {
        $bookList = $this->bookDB->getList();
        include_once "view/book/index.php";
    }

    public function addBook()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $categoryList = $this->categoryDB->getList();
            include_once "view/book/add.php";
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->bookDB->upload();

            if ($_FILES['bookImage']['name'] == ""){
                $bookImage = 'book.jpeg';
            } else {
                $bookImage =date('H:m:s').$_FILES['bookImage']['name'];
            }

            $book = new Book($_POST['bookName'], $_POST['authorName'], $_POST['categoryCode'], $_POST['publishingName'],
                $_POST['publishingYear'], $_POST['description']
            );
            $book->setBookImage($bookImage);
            $this->bookDB->add($book);
            header("location: ?page=bookManage");
        }

    }

    public function editBorrow()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $bookList = $this->bookDB->getList();
            $borrow = $this->borrowDB->getBorrowById($_GET['id']);
            include_once "view/borrow/edit.php";
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $borrowCode = $_GET['id'];
            $borrow = new Borrow($_POST['userCode'], $_POST['borrowDate'], $_POST['deadlineDay'], $_POST['bookCode']);
            $this->borrowDB->edit($borrowCode, $borrow);
            header("location: ?page=borrowManage");
        }
    }

    public function editBook()
    {
        $bookCode = $_GET['id'];
        $book = $this->bookDB->getBookById($bookCode);
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $categoryList = $this->categoryDB->getList();
            $bookList = $this->bookDB->getList();
            include_once "view/book/editBook.php";


        }  elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $this->bookDB->upload();

            if ($_FILES['bookImage']['name'] == ""){
                $bookImage = $book->getBookImage();
            } else {
                $bookImage =date('H:m:s').$_FILES['bookImage']['name'];
            }

            $book = new Book($_POST['bookName'], $_POST['authorName'], $_POST['categoryCode'], $_POST['publishingName'],
                $_POST['publishingYear'], $_POST['description']
            );
            $book->setBookImage($bookImage);
            $this->bookDB->edit($bookCode, $book);

            header("location: ?page=bookManage");
        }



    }

    public function listBorrows()
    {
        $borrowList = $this->borrowDB->getList();
        include_once "view/borrow/listBorrow.php";
    }

    public function addBorrow()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $bookList = $this->bookDB->getList();
            include_once "view/borrow/add.php";
        } elseif ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $borrow = new Borrow($_POST['userCode'], $_POST['borrowDate'], $_POST['deadlineDay'], $_POST['bookCode']);

            $this->borrowDB->add($borrow);
            header("location: ?page=borrowManage");
        }
    }



    public function removeBorrow()
    {
        $borrowCode = $_GET['id'];
        $this->borrowDB->delete($borrowCode);
        header("location: ?page=borrowManage");
    }

    //DELETE BOOK CONTROLER
    public function removeBook()
    {
        $bookCode = (int)$_GET['id'];
        $this->bookDB->deleteBook($bookCode);
        header("location: ?page=bookManage");
    }

    public function category()
    {
        $bookCategories = $this->bookDB->getBookCategories();
        include_once "view/category/bookCategory.php";
    }

    public function search()
    {
        $keyword = $_GET['keyword'];
        $bookList = $this->bookDB->search($keyword);
        include_once "view/book/search.php";
    }


}