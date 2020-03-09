
<div class="row col-12 mt-4">
    <div class="card col-10">
        <div class="card-body">

            <a href="index.php?page=addBook" class="btn btn-primary nav-item active">Thêm sách</a>
            <!-- <h3 class="card-title text-center">Quản lý sách</h3> -->


            <table class="table table-striped  mt-2">
                <thead class="thead-light">
                <tr>
                    <th>Stt</th>
                    <th>Tên sách</th>
                    <th>Ảnh</th>
                    <th>Tác giả</th>
                    <th>Thể loại</th>
                    <th>Sửa & Xóa</th>
                </tr>
                </thead>
                <?php foreach ($bookList as $key => $book): ?>
                    <tr>
                        <td><?php echo ++$key ?></td>
                        <td>
                            <a href="index.php?page=detail&id=<?php echo $book->getBookCode(); ?>"><?php echo $book->getBookName(); ?></a>
                        </td>
                        <td><img width="150px" height="150px" src="view/book/images/<?php echo $book->getBookImage(); ?>"></td>
                        <td><?php echo $book->getAuthorName(); ?></td>
                        <td><?php echo $book->getCategoryName(); ?></td>

                        <td>
                            <a href="index.php?page=editBook&id=<?php echo $book->getBookCode(); ?>" class="btn btn-success"
                               onclick="return confirm('bạn có chắn chắn sửa thông tin của ghi chú này ?')">Edit</a>
                            <a href="index.php?page=deleteBook&id=<?php echo $book->getBookCode(); ?>" class="btn btn-danger"
                               onclick="return confirm('Bạn có chắc chắn muốn xóa sách này ?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</div>