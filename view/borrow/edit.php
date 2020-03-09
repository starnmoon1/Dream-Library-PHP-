<div class="col-12 mt-4">
    <form action="" method="POST" class="form-group mt-4">
        <label for="">Mã sinh viên</label>
        <input type="text" name="userCode" class="form-control" value="<?php echo $borrow->getUserCode() ?>">
        <label for="">Ngày mượn</label>
        <input type="date" name="borrowDate" class="form-control" value="<?php echo $borrow->getBorrowDate() ?>">

        <label for="">Ngày trả</label>
        <input type="date" name="deadlineDay" class="form-control" value="<?php echo $borrow->getDeadlineDay() ?>">
        <label for="">Sách</label>
        <select name="bookCode" class="form-control">
            <?php foreach ($bookList as $book) : ?>
            <option value="<?php echo $book->getBookCode();?>"  <?php if ($borrow->getBookCode() == $book->getBookCode()) echo "selected" ?> >
                <?php echo $book->getBookName(); ?> </option>

            <?php endforeach; ?>

        </select>
        <input type="reset" value="Hủy" class="btn btn-danger mt-3"
               onclick="return confirm('bạn có chắc chắn muốn xóa các thay đổi vừa nhập ?')">
        <input type="submit" value="Lưu" class="btn btn-success mt-3"
               onclick="return confirm('bạn có chắn chắn sửa thông tin của ghi chú này ?')">
    </form>
</div>