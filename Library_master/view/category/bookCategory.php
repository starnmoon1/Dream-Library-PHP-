
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>trang hiển thị toàn bộ sách</title>
</head>
<body>

</body>
</html>
<div class="row text-center text-lg-left">

    <?php foreach($bookCategories as $key => $bookCategory):?>
        <div class="col-lg-3 col-md-4 col-6">
            <a href="#" class="d-block mb-4 h-100">
                <img width="1000" class="img-fluid img-thumbnail" src="<?php echo $bookCategory->getBookImage()?>">
                <p><?php echo $bookCategory->getBookName()?></p>
                <p><?php echo $bookCategory->getAuthorName()?></p>
            </a>
        </div>
    <?php endforeach;?>
</div>