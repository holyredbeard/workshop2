<?php //error_reporting(E_ALL);

    // Database
    require_once('Database/DBConfig.php');
    require_once('Database/Database.php');
    
    // Models
    require_once('Model/RegisterHandler.php');
    require_once('Model/MemberHandler.php');

    // Views
    require_once('View/MemberView.php');
    require_once('Controller/RegisterBoatController.php');
    require_once('Controller/RemoveBoatController.php');
    require_once('View/RegisterView.php');
    require_once('View/CompositionView.php');

    // Controllers
    require_once('Controller/RegisterController.php');
    require_once('Controller/MemberController.php');

class MasterController {
    public function DoControl() {
        $out = '';

        $db = new \Database\Database();
        $db->Connect(new \Database\DBConfig());

        $regController = new \Controller\RegisterController();
        $memberController = new \Controller\MemberController();

        $regBoatController = new \Controller\RegisterBoatController();
        $removeBoatController = new \Controller\RemoveBoatController();


        $out .= $memberController->DoControl($db);
        $out .= $regController->DoControl($db);
        $out .= $regBoatController->DoControl($db);
        $out .= $removeBoatController->DoControl($db);
        $HTMLMember .= $memberController->DoControl($db);
        $HTMLReg .= $regController->DoControl($db);

        $cv = new \View\CompositionView();

        $out = $cv->merge($HTMLMember, $HTMLReg);
        
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