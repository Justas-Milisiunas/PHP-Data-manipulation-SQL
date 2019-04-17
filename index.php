<!DOCTYPE html>
<html lang="en">
<head>
    <title>Žaislai</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="styles/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="styles/css/bootstrap-grid.css" rel="stylesheet" type="text/css">
    <link href="styles/css/bootstrap-reboot.css" rel="stylesheet" type="text/css">
    <link rel="icon" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcR6XWZyRXNLb8t5_cp9aBpp_Z5jlL1rhfNC1zSv5YjhjFnETY-1">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="styles/js/bootstrap.js"></script>
    <script src="includes/main.js"></script>
</head>
<body>
<div>
    <?php
    include "config.php";
    include "includes/mysql.php";
    include "templates/nav.php";
    $module = '';
    if (isset($_GET['module'])) {
        $module = mysql::escape($_GET['module']);
    }

    $action = '';
    if (isset($_GET['action'])) {
        $action = mysql::escape($_GET['action']);
    }

    $id = '';
    if(isset($_GET['id'])) {
        $id = mysql::escape($_GET['id']);
    }

    // nustatome elementų sąrašo puslapio numerį
    $pageId = 1;
    if(!empty($_GET['page'])) {
        $pageId = mysql::escape($_GET['page']);
    }

    // nustatome, kurį valdiklį įtraukti šablone main.tpl.php
    $actionFile = "";
    if (!empty($module) && !empty($action)) {
        $actionFile = "controls/{$module}/{$action}.php";
    }
    ?>
    <div class="" style="width: 100vw">
        <?php
        if (file_exists($actionFile)) {
            include $actionFile;
        } elseif($module != "") {
            include "templates/404.php";
        }
        ?>
    </div>
</div>
</body>
</html>