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
                <li><a href="index">Home</a></li>
                <li><a href="coffee">Coffee</a></li>
                <li><a href="#">Shop</a></li>
                <li><a href="#">About</a></li>
                <li><a href="management">Management</a></li>
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