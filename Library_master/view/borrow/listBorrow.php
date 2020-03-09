<div class="row col-10 mt-4">
    <div class="card col-12">
        <div class="card-body">

            <a href="index.php?page=addBorrow" class="btn nav-item active btn-primary">Thêm nm</a>

            <table class="table table-striped mt-2">
                <thead class="thead-light">
                <tr>
                    <th>Stt</th>
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
                        <a href="index.php?page=deleteBorrow&id=<?php echo $borrow->getBorrowCode(); ?>" class="btn btn-danger"
                           onclick="return confirm('Bạn có chắc chắn muốn xóa?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</div>