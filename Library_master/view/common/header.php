
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/header.css" type="text/css">
    <title>header</title>
</head>

<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Thư viện mơ ước</a>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="index.php?page=list">Trang chủ <span class="sr-only">(current)</span></a>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="index.php?page=bookManage">Quản lý sách<span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index.php?page=borrowManage">Quản lý người mượn<span class="sr-only">(current)</span></a>
            </li>
        </ul>

        <form class="form-inline my-2 my-lg-0" action="?keyword=<?php echo $_GET['keyword']?>">
            <input class="form-control mr-sm-2 w-50" type="search" placeholder="Search" aria-label="Search" name="keyword">
            <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
</div>
</body>
</html>