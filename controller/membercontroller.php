<?php

namespace Controller;

class MemberController {
    
    public function DoControl($db) {

        $memberView = new \View\MemberView();
        $memberHandler = new \Model\MemberHandler($db);

        $out = '';
        $member = array();

        $queryString = $memberView->GetQueryString();

        if($queryString != null){
            
            $action = parse_url($queryString, PHP_URL_QUERY);
            parse_str($queryString, $string);

            $action = $string[action];
            $id = $string[id];

            if ($action == changeInfo) {
                $out = $memberView->GetChangeForm();
            }
            elseif ($action == delete) {
                $memberHandler->DeleteMember($id);
            }
        }
        else if ($memberView->TriedToChange()) {
            echo 'hej';
            $userInfo = $memberView->GetUserInfo();
            echo count($userInfo);
        }
        else {
            //$memberHandler->ChangeInfo($id);

            $members = $memberHandler->GetMembers();
            $out = $memberView->ShowMembers($members);

        }

        return $out;

    }
}