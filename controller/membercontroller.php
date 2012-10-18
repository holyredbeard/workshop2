<?php

namespace Controller;

class MemberController {
    
    public function DoControl($db) {

        $memberView = new \View\MemberView();
        $memberHandler = new \Model\MemberHandler($db);
        $boatHandler = new \Model\BoatHandler($db);
        $boatView = new \View\BoatView($db);

        $out = '';
        $member = array();


        $queryString = $memberView->GetQueryString();

        if ($queryString != null){
            $action = parse_url($queryString, PHP_URL_QUERY);
            parse_str($queryString, $string);

            $action = $string[action];
            $id = $string[id];

            if ($action == changeInfo) {
                if ($memberView->TriedToChange()) {
                    $userInfo = $memberView->GetUserInfo();
                    $memberHandler->ChangeInfo($userInfo);

                    $members = $memberHandler->GetMembers();
                    $out .= $memberView->ShowMembers($members);
                }
                else {
                    $memberInfo = $memberHandler->GetMember($id);

                    $id = $memberInfo[0];
                    $fName = $memberInfo[1];
                    $lName = $memberInfo[2];
                    $SSN = $memberInfo[3];

                    $out .= $memberView->GetChangeForm($id, $fName, $lName, $SSN);
                }
            }
            else if ($action == showAllInfo) {
                $memberInfo = $memberHandler->GetMember($id);
                $boats = $boatHandler->GetMembersBoats($id);

                $boats = $boatHandler->GetMembersBoats($id);
                $out .= $memberView->ShowFullMemberInfo($memberInfo);
                $out .= $memberView->ShowMembersBoats($boats);
            }
            else if ($action == delete) {
                $memberHandler->DeleteMember($id);
                $memberView->RedirectHome();
            }
        }
        else {
            $members = $memberHandler->GetMembers();
            $out .= $memberView->ShowMembers($members);

        }

        return $out;

    }
}