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

    private static $m_redirectHome = 'index.php';

    public function ShowMembers($members) {
        
        $memberIds = $members[0];
        $fNames = $members[1];
        $lNames = $members[2];
        $SSN = $members[3];
        $boats = $members[4];
        
        $i = 0;

        $listOfMembers = "<h3>Medlemmar</h3>
                        <table width='1000px'>
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
            <td>$boats[$i]</td>
            <td><a href=\"index.php?action=showAllInfo&id=$memberIds[$i]\">Fullständig info</a></td>
            <td><a href=\"index.php?action=changeInfo&id=$memberIds[$i]\">Ändra info</a></td>
            <td><a href=\"index.php?action=addBoat&id=$memberIds[$i]\">Lägg till båt</a></td>
            <td><a href=\"index.php?action=delete&id=$memberIds[$i]\">Ta bort medlem</a></td>
            </tr>";

            $i += 1;
        }

        $listOfMembers .= "</table>";

        return $listOfMembers;
    }

    public function ShowFullMemberInfo($memberInfo) {
        $id = $memberInfo[0];
        $fName = $memberInfo[1];
        $lName = $memberInfo[2];
        $SSN = $memberInfo[3];

        $memberInfo = "<div>
                        <table width='800px'>
                            <tr>
                                <th>Medlemsnr</th>
                                <th>Förnamn</th>
                                <th>Efternamn</th>
                                <th>Personnr</th>
                            </tr>
                            <tr>
                                <td>$id</td>
                                <td>$fName</td>
                                <td>$lName</td>
                                <td>$SSN</td>
                            </tr>
                        </table>
                        </div>";

        return $memberInfo;
    }

    public function ShowMembersBoats($boats) {

        $boatIds = $boats[0];
        $boatLengths = $boats[1];
        $boatTypes = $boats[2];

        $i = 0;

        $boatInfo = "<div>
                            <table>
                            <form action='post'>
                                <tr>
                                    <th>Båt-id</th>
                                    <th>Längd (m)</th>
                                    <th>Typ</th>
                                </tr>";

        foreach ($boatIds as $key) {
            $boatInfo .= "<tr>
                                    <td>$boatIds[$i]</td>
                                    <td>$boatLengths[$i]</td>
                                    <td>$boatTypes[$i]</td>
                                    <td><a href=\"index.php?action=editBoat&boatId=$boatIds[$i]\">Ändra</a></td>
                                    <td><a href=\"index.php?action=removeBoat&boatId=$boatIds[$i]\">Ta bort</a></td>
                            </tr>";

            $i += 1;
        }

        $boatInfo .= "</table>
                    </div>";

        return $boatInfo;

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
                                <td><input type='text' name='$this->m_fName' value=$fName /></td>
                                <td><input type='text' name='$this->m_lName' value=$lName /></td>
                                <td><input type='text' name='$this->m_ssn' value=$SSN /></td>
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

    public function RedirectHome() {
        header('location:' . self::$m_redirectHome);
    }
}