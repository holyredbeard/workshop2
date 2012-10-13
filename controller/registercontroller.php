<?php

namespace Controller;

class RegisterController {
    
    public function DoControl(\Database\Database $db) {
		$outputHTML = '';
        
        $registerHandler = new \Model\registerHandler($db);
        $memberHandler = new \Model\memberHandler($db);
        $memberView = new \View\MemberView();
        $registerView = new \View\RegisterView();

        $outputHTML = $registerView->RegisterForm();
        
        if ($registerView->TriedToRegister()) {
            $fName = $registerView->getFName();
            $lName = $registerView->getLName(); 
            $SSN = $registerView->getSSN();
            
            $registerHandler->DoRegister($fName, $lName, $SSN);
        }
    
        return $outputHTML;
    }
}