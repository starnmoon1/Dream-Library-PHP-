<div class="col-12 mt-4">

    <form action="" method="POST" class="form-group mt-4" enctype="multipart/form-data">
        <label for="">Tên sách</label>
        <input type="text" name="bookName" class="form-control" placeholder="Tên sách " value="<?php echo $book->getBookName() ?>">
        <label for="">Tác giả</label>
        <input type="text" name="authorName" class="form-control" placeholder="Tác giả" value="<?php echo $book->getAuthorName() ?>">
        <label for="">Thể loại</label>
        <select name="categoryCode" class="form-control">
            <?php foreach ($categoryList as $category): ?>
                <option value="<?php echo $category->getCategoryCode(); ?>">
                    <?php echo $category->getCategoryName();?> </option>
            <?php endforeach; ?>;
        </select>
        <label for="">Nhà xuất bản</label>
        <input type="text" name="publishingName" class="form-control" placeholder="Nhà xuất bản" value="<?php echo $book->getPublishingName() ?>">
        <label for="">Năm xuất bản</label>
        <input type="number" name="publishingYear" class="form-control" placeholder="Năm xuất bản" value="<?php echo $book->getPublishingYear() ?>">
        <label for="">Mô tả</label>
        <input type="text" name="description" class="form-control" placeholder="Mô tả" value="<?php echo $book->getDescription() ?>">
        <label for="">Ảnh</label>
        <input type="file" name="bookImage" class="form-control" placeholder="Ảnh">
        <P></P>
        <div></div>
        <img width="300px" style="padding: 10px" src="view/book/images/<?php echo $book->getBookImage() ?>">
        <div></div>




        <input type="reset" value="Hủy" class="btn btn-danger mt-3" onclick="return confirm('bạn có chắc chắn muốn sửa các nhập liệu ở trên ?')">
        <input type="submit" value="Lưu" class="btn btn-success mt-3">
    </form>
</div>