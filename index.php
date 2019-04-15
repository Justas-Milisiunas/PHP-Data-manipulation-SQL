<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="styles/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="styles/css/bootstrap-grid.css" rel="stylesheet" type="text/css">
    <link href="styles/css/bootstrap-reboot.css" rel="stylesheet" type="text/css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="styles/js/bootstrap.js"></script>
    <script src="scripts/main.js"></script>
</head>
<body>
<div>
    <?php
    include "config.php";
    include "includes/mysql.php";
    include "includes/nav.php";
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
    <div class="container">
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