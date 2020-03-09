
<div class="row col-12 mt-4">
    <div class="card col-12">
        <div class="card-body">
            <table class="table table-striped">
                <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Tên sách</th>
                    <th>Ảnh</th>
                    <th>Tác giả</th>
                    <th>Thể loại</th>
                    <th>Nhà xuất bản</th>
                    <th>Ngày xuất bản</th>
                </tr>
                </thead>
<!--                bookList la 1 doi tuong da duoc search ra-->
                <?php foreach ($bookList as $key => $book): ?>
                    <tr>
                        <td><?php echo ++$key ?></td>
                        <td>
                            <a href="index.php?page=detail&id=<?php echo $book->getBookCode(); ?>"><?php echo $book->getBookName(); ?></a>
                        </td>
                        <td><img width="150px" height="150px" src="<?php echo $book->getBookImage(); ?>"></td>
                        <td><?php echo $book->getAuthorName(); ?></td>
                        <td><?php echo $book->getCategoryName(); ?></td>
                        <td><?php echo $book->getPublishingName(); ?></td>
                        <td><?php echo $book->getPublishingYear(); ?></td>

                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</div>