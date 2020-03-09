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


    // BOOK
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
            $book = new Book($_POST['bookName'], $_POST['authorName'], $_POST['categoryCode'], $_POST['publishingName'],
                $_POST['publishingYear'], $_POST['description']
            );
            if ($_FILES['avatar']['type'] == "") {
                $avatar = 'book.jpeg';
            } else {
                $avatar = date('H:m:s') . $_FILES['avatar']['name'];
            }
            $book->setBookImage($avatar);
            $this->bookDB->add($book);
            header("location: ?page=bookManage");
        }

    }

////BORROW

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

    public function removeBorrow()
    {
        $borrowCode = $_GET['id'];
        $this->borrowDB->delete($borrowCode);
        header("location: ?page=borrowManage");
    }

    //Category
    public function category()
    {
        $bookCategories = $this->bookDB->getBookCategories();
        include_once "view/category/bookCategory.php";
    }

//    search sach

    public function search()
    {
        $keyword = $_GET['keyword'];
        $bookList = $this->bookDB->search($keyword);
        include_once "view/book/search.php";
    }


}