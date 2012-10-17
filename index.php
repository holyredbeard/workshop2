<?php //error_reporting(E_ALL);

    // Database
    require_once('Database/DBConfig.php');
    require_once('Database/Database.php');
    
    // Models
    require_once('Model/RegisterHandler.php');
    require_once('Model/MemberHandler.php');

    // Views
    require_once('View/MemberView.php');

    require_once('Controller/BoatController.php');

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

        $boatController = new \Controller\BoatController($db);


        $HTMLMember = $memberController->DoControl($db);
        $HTMLBoat = $boatController->DoControlRemove();
        //
        switch ($_GET['action']) {
                
            case 'addBoat':
                $HTMLBoat = $boatController->DoControlRegister();
                break;

            case 'register':
                $HTMLReg = $regController->DoControl($db);
                break;
        }



        $cv = new \View\CompositionView();

        $out = $cv->merge($HTMLMember, $HTMLReg, $HTMLBoat);
        
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
        <title>Den glade piraten</title>
    </head>
    <body>
        <a href="index.php">Hem</a>
        <br />
        <a href="?action=register">Lägg till medlem</a>
        <br />
        <?php
            echo $body;
        ?>
    </body>
</html>