<?php

namespace View;

class MemberView {
    
    private $m_deleteMember = 'deleteMember[]';
    private $m_changeMember = 'changeMemer[]';

    private $m_fName = 'fname';
    private $m_lName = 'lname';
    private $m_ssn = 'ssn';
    private $m_submitChange = 'submit';

    public function ShowMembers($members) {

        
        $memberIds = $members[0];
        $fNames = $members[1];
        $lNames = $members[2];
        $SSN = $members[3];
        
        $i = 0;

        $listOfMembers = "<h3>Medlemmar</h3>
                        <table width='600px'>
                        <tr>
                        <th>Medlemsnr</th>
                        <th>Förnamn</th>
                        <th>Efternamn</th>
                        <th>Antal båtar</th>
                        </tr>";

        foreach ($memberIds as $key) {
            $listOfMembers .=
            "<tr>
            <td>$memberIds[$i]</td>
            <td>$fNames[$i]</td>
            <td>$lNames[$i]</td>
            <td>0</td>
            <td><a href=\"index.php?action=delete&id=$memberIds[$i]\">Ta bort medlem</a></td>
            <td><a href=\"index.php?action=changeInfo&id=$memberIds[$i]\">Ändra info</a></td>
            </tr>";

            $i += 1;
        }

        $listOfMembers .= "</table>";

        return $listOfMembers;
    }

    public function GetChangeForm() {
        $changeForm = "<form method='post'>
                        <h3>Ändra medlemsinfo</h3>
                        <table width='600px'>
                            <tr>
                                <th>Medlemsnr</th>
                                <th>Förnamn</th>
                                <th>Efternamn</th>
                            <th>Antal båtar</th>
                            </tr
                            <tr>
                                <td><input type='text' name='$this->m_fName' /></td>
                                <td><input type='text' name='$this->m_lName' /></td>
                                <td><input type='text' name='$this->m_ssn' /></td>
                                <td><input type='text' name='$this->m_boats' Value='Ej klar'/></td>
                                <td><input type='submit' name='$this->submitChange' value='Spara' /></td>
                            </tr>
                        </table>
                       </form>";

        return $changeForm;
    }

    public function GetUserInfo() {
        
        $fName = $_POST[$this->m_fName];
        $lName = $_POST[$this->m_lName];
        $SSN = $_POST[$this->m_ssn];

        $userInfo = array($fName, $lname, $SSN);

        return $userInfo;
        // variablar case sensitive i php?
    }

    public function TriedToChange() {
        if (isset($_POST[$this->submitChange])) {
            echo 'yes';
            return true;
        }
        else {
            return false;
        }
    }

    public function GetQueryString() {
        $queryString = null;

        if(isset($_GET)) {
            foreach ($_GET as $key => $value) {
                $queryString .= $key . '=' . $value . '&';
            }
        }

        return $queryString;
    }

    public function GetMemberToDelete() {
        print_r($_SERVER);
        return $_GET[$this->m_deleteMember];
    }
    
    public function GetMemberToChange() {
        print_r($_SERVER);
        return $_GET[$this->m_changeMember];
    }
}