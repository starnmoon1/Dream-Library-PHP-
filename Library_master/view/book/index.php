<style>
    p:hover {
        color: orange;
        font-size: 16px;
    }

    a {
        text-decoration: none!important;
    }
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>trang hiển thị toàn bộ sách</title>
</head>
<body>
<div class="row text-center text-lg-left">
    <?php foreach($bookList as $key => $book):?>
        <div class="col-lg-3 col-md-4 col-6">
            <a href="#" class="d-block mb-4 h-100">
                <img class="img-fluid img-thumbnail" src="view/book/images/<?php echo $book->getBookImage()?>" alt="book">
                <p>Tên sách: <?php echo $book->getBookName()?></p>
                <p>Tác giả: <?php echo $book->getAuthorName()?></p> 
            </a>
        </div>
    <?php endforeach;?>
</div>
</body>
</html>
