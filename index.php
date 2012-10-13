<?php

    require_once('Database/DBConfig.php');
    require_once('Database/Database.php');
    require_once('Controller/RegisterController.php');
    require_once('Model/RegisterHandler.php');
    require_once('View/RegisterView.php');
    require_once('Model/MemberHandler.php');
    require_once('Controller/MemberController.php');
    require_once('View/MemberView.php');

class MasterController {
    public function DoControl() {
        $out = '';

        $db = new \Database\Database();
        $db->Connect(new \Database\DBConfig());

        $regController = new \Controller\RegisterController();
        $memberController = new \Controller\MemberController();

        $out .= $memberController->DoControl($db);
        $out .= $regController->DoControl($db);
        
        // kill DB-conn
        $db->Close();
        
        return $out;
    }
}
$mc = new MasterController();
$body = $mc->DoControl();

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="style.css" />
        <meta charset="utf-8">
        <title>Titel</title>
    </head>
    <body>
        <?php
            echo $body;
        ?>
    </body>
</html>