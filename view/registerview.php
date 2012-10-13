<?php

namespace View;

class RegisterView {
    
    private $m_fNameField = 'firstNameReg';
    private $m_lNameField = 'lastNameReg';
    private $m_SSNField = 'SSNReg';
    private $m_submitField = 'submitRegField';
    
    public function RegisterForm() {
        $html = "<h3>Lägg till ny medlem</h3>
                    <form method='post'>
                        Förnamn:
                        <input type='text' name='$this->m_fNameField' /><br/>
                        Efternamn:
                        <input type='text' name='$this->m_lNameField' /><br/>
                        Personnr:
                        <input type='text' name='$this->m_SSNField' /><br/>
                        <input type='submit' name='$this->m_submitField' value='Spara' />
                    </form>";
            
            return $html;
    }
    
    public function TriedToRegister() {
        if (isset($_POST[$this->m_submitField])) {
            return true;
        }
        return false;
    }
    
    public function getFName() {
        return $_POST[$this->m_fNameField];
    }
    
    public function getLName() {
        return $_POST[$this->m_lNameField];
    }
    
    public function getSSN() {
        return $_POST[$this->m_SSNField];
    }
}