<?php

class WebAPI
{
    public function __construct()
    {
        global $__site_config;
        $__site_config_path = __DIR__.'/../../../project/photogramconfig.json';
        $__site_config = file_get_contents($__site_config_path);
        Database::getConnection();
    }

    public function initiateSession()
    {
        Session::start();
        if (Session::isset("session_token")) {
            try {
                Session::$usersession = UserSession::authorize(Session::get('session_token')); 
            } 
            catch (Exception $e){
                //TODO: Handle error
            }
        }
    }
}
