<?php

${basename(__FILE__, '.php')} = function () {
    if ($this->paramsExists(['user', 'password'])) {
        $user = $this->_request['user'];
        $password = $this->_request['password'];
        $fingerprint = $_COOKIE['fingerprint'];
        $token = UserSession::authenticate($user, $password, $fingerprint);
        if($token) {
            $this->response($this->json([
                'message'=>'Authenticated',
                'token' => $token
            ]), 200);
        } else {
            $this->response($this->json([
                'message'=>'Unauthorized',
                'token' => $token
            ]), 401);
        }

    } else {
        $this->response($this->json([
            'message'=>"bad request"
        ]), 400);
    }
};
