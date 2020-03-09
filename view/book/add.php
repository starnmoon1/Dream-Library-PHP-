<div class="col-12 mt-4">
    <form action="" method="POST" class="form-group mt-4">


        <label for="">Tên sách</label>
        <input type="text" name="bookName" class="form-control" placeholder="Tên sách ">
        <label for="">Tác giả</label>
        <input type="text" name="authorName" class="form-control" placeholder="Tác giả">
        <label for="">Thể loại</label>
        <select name="categoryCode" class="form-control">
            <?php foreach ($categoryList as $category): ?>
                <option value="<?php echo $category->getCategoryCode(); ?>">
                    <?php echo $category->getCategoryName();?> </option>
            <?php endforeach; ?>;
        </select>
        <label for="">Nhà xuất bản</label>
        <input type="text" name="publishingName" class="form-control" placeholder="Nhà xuất bản">
        <label for="">Năm xuất bản</label>
        <input type="number" name="publishingYear" class="form-control" placeholder="Năm xuất bản">
        <label for="">Mô tả</label>
        <input type="text" name="description" class="form-control" placeholder="Mô tả">
        <label for="">Ảnh</label>
        <input type="file" name="bookImage" class="form-control" placeholder="Ảnh">



        <input type="reset" value="Hủy" class="btn btn-danger mt-3" onclick="return confirm('bạn có chắc chắn muốn xóa các nhập liệu ở trên ?')">
        <input type="submit" value="Lưu" class="btn btn-success mt-3">
    </form>
</div>