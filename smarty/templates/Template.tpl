<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>{$title}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type='text/css' href="Styles/Stylesheet.css" />
    <script type="text/javascript" src="Styles/fixed_midashi.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script>
    $( function() {
        $( "#datepicker" ).datepicker();
    } );
    </script>
</head>

<body>
    <div id="wrapper">
        <div id="banner">
        </div>

        <nav id="navigation">
            <ul id="nav">
                <li><b><a href="?action=index">ホーム</a></b></li>
                <li><b><a href="?action=coffee">製品の紹介</a></b></li>
                <li><b><a href="?action=shop">ショップ</a></b></li>
                {* <li><b><a href="?action=about">お店について</a></b></li> *}
                <li><b><a href="?action=contact">連絡</a></b></li>
                <li><b><a href="?action=management">管理</a></b></li>
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
    function show_confirm(name){
        return confirm(name + "を削除してもよろしですか？");
    }
</script>