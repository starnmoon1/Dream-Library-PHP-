<div class="row col-12 mt-4">
    <div class="card col-12">
        <div class="card-body">

            <a href="index.php?page=addBorrow" class="btn btn-primary nav-item active">Thêm người mượn</a>
            <h3 class="card-title text-center">Quản lý Người mượn </h3>


            <table class="table table-striped">
                <thead class="thead-dark">
                <tr>
                    <th>#</th>
                    <th>Tên người mượn</th>
                    <th>Tên sách</th>
                    <th>Ngày mượn</th>
                    <th>Ngày giả</th>
                    <th>Sửa & Xóa</th>
                </tr>
                </thead>
                <?php foreach ($borrowList as $key => $borrow): ?>
                    <tr>
                        <td><?php echo ++$key ?></td>
                        <td>
                            <a href="index.php?page=detail&id=<?php echo $borrow->getBorrowCode(); ?>"><?php echo $borrow->getUserName(); ?></a>
                        </td>
                        <td><?php echo $borrow->getBookName(); ?></td>
                        <td><?php echo $borrow->getBorrowDate(); ?></td>
                        <td><?php echo $borrow->getDeadlineDay(); ?></td>
                        <td><a href="index.php?page=edit&id=<?php echo $borrow->getBorrowCode(); ?>" class="btn btn-success"
                               >Edit</a>
                        <a href="index.php?page=delete&id=<?php echo $borrow->getBorrowCode(); ?>" class="btn btn-danger"
                           onclick="return confirm('bạn có chắc chắn muốn xóa ghi chú này ?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</div>