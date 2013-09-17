<?php
/**
 *Created by Konstantin Kolodnitsky
 * Date: 17.09.13
 * Time: 18:33
 */
namespace x_stopforumspam;
class Controller_StopForumSpam extends \AbstractController{
    function init(){
        parent::init();

        // add add-on locations to pathfinder
        /*$l = $this->api->locate('addons',__NAMESPACE__,'location');
        $addon_location = $this->api->locate('addons',__NAMESPACE__);
        $this->api->pathfinder->addLocation($addon_location,array(
            'php'=>'lib'
        ))->setParent($l);*/
    }

    function checkIP($ip){
        $obj = json_decode($this->getResponse("http://stopforumspam.com/api?ip=".$ip."&f=json"));
        if($obj->ip->frequency != 0){
            return true;
        }else{
            return false;
        }
    }

    function checkEmail($email){
        $obj = json_decode($this->getResponse("http://stopforumspam.com/api?email=".$email."&f=json"));
        if($obj->email->frequency != 0){
            return true;
        }else{
            return false;
        }
    }

    function checkUserName($userName){
        $obj = json_decode($this->getResponse("http://stopforumspam.com/api?username=".$userName."&f=json"));
        if($obj->username->frequency != 0){
            return true;
        }else{
            return false;
        }
    }

    function getResponse($request){
        $curl = curl_init($request);
        curl_setopt ($curl, CURLOPT_HEADER, 0);
        curl_setopt ($curl, CURLOPT_POST, 0);
        curl_setopt ($curl, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt ($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($curl, CURLOPT_SSL_VERIFYHOST, 1);
        $response = curl_exec ($curl);
        curl_close ($curl);
        return $response;
    }
}