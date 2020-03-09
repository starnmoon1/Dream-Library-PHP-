<?php
    include_once "controller/LibraryController.php";
    include_once "model/book/BookDB.php";
    include_once "model/book/Book.php";
    include_once "model/borrow/BorrowList.php";
    include_once "model/borrow/BorrowDB.php";
    include_once "model/borrow/Borrow.php";
    include_once "model/database/DBConnect.php";
    include_once "model/categories/Categories.php";
    include_once "model/categories/CategoriesDB.php";

    $libraryController = new LibraryController();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>home</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>
<?php include_once "view/common/header.php" ?>


<div class="container-fluid col-12">
    <div class="row flex-xl-nowrap">
        <?php
        include_once "view/common/slider.php";
        ?>

        <?php
            $page = isset($_REQUEST['page']) ? $_REQUEST['page'] : null;
            switch ($page) {
                case "addBorrow":
                    $libraryController->addBorrow();
                    break;
                case "addBook":
                    $libraryController->addBook();
                    break;
                case "deleteBorrow":
                    $libraryController->removeBorrow();
                    break;
                case "deleteBook":
                    $libraryController->removeBook();
                    break;
                case "edit":
                    $libraryController->editBorrow();
                    break;
                case "editBook":
                    $libraryController->editBook();
                    break;
                case "borrowManage":
                    $libraryController->listBorrows();
                    break;
                case "bookManage":
                    $libraryController->listBooks();
                    break;
                case "category":
                    $libraryController->category();
                    break;
                default:
                    if (isset($_GET['keyword'])) {
                        $libraryController->search();
                    } else {
                        $libraryController->index();
                    }
                    break;
            }
        ?>
    </div>
</div>
<?php
    include_once "view/common/footer.php";
?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>