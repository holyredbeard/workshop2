<?php

namespace View;

class MemberView {
    
    private $m_deleteMember = 'deleteMember[]';
    private $m_changeMember = 'changeMember[]';

    private $m_id = 'id';
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

    public function GetChangeForm($id, $fName, $lName, $SSN) {
        $changeForm = "<form method='post'>
                        <h3>Ändra medlemsinfo</h3>
                        <table width='600px'>
                            <tr>
                                <th>Medlemsnr</th>
                                <th>Förnamn</th>
                                <th>Efternamn</th>
                                <th>Personnr</th>
                            </tr
                            <tr>
                                <td>$id</td>  
                                <td><input type='text' name='$this->m_fName' value=$fName/></td>
                                <td><input type='text' name='$this->m_lName' value=$lName/></td>
                                <td><input type='text' name='$this->m_ssn' value=$SSN/></td>
                                <td><input type='submit' name='$this->m_submitChange' value='Spara' /></td>
                            </tr>
                            <input type='hidden' name='$this->m_id' value='$id' />
                        </table>
                       </form>";

        return $changeForm;
    }

    public function GetUserInfo() {
        $id = $_POST[$this->m_id];
        $fName = $_POST[$this->m_fName];
        $lName = $_POST[$this->m_lName];
        $SSN = $_POST[$this->m_ssn];

        $userInfo = array($id, $fName, $lName, $SSN);

        return $userInfo;
    }

    public function TriedToChange() {
        if (isset($_POST[$this->m_submitChange])) {
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