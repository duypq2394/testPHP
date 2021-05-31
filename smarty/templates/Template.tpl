<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>{$title}</title>
    <link rel="stylesheet" type='text/css' href="Styles/Stylesheet.css" />
</head>

<body>
    <div id="wrapper">
        <div id="banner">
        </div>

        <nav id="navigation">
            <ul id="nav">
                <li><b><a href="index">ホーム</a></b></li>
                <li><b><a href="coffee">製品の紹介</a></b></li>
                <li><b><a href="shop">ショップ</a></b></li>
                <li><b><a href="#">お店について</a></b></li>
                <li><b><a href="management">管理</a></b></li>
            </ul>
        </nav>

        <div id="content_area">
            {$content}
        </div>
        <div id="sidebar">

        </div>

        <footer>
            <p>All rights reserved</p>
        </footer>
    </div>
</body>

</html>
<script>
    function show_confirm(){
        return confirm("Are you sure?");
    }
</script>