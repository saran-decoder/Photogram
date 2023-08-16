<?php

${basename(__FILE__, '.php')} = function () {
    if ($this->paramsExists(['email_address', 'password', 'phone', 'username'])) {
        $email = $this->_request['email_address'];
        $password = $this->_request['password'];
        $phone = $this->_request['phone'];
        $username = $this->_request['username'];

        $result = User::signup($username, $password, $email, $phone);
        if($result) {
            $this->response($this->json([
                'message'=>'Successfully Signed Up',
                'result' => $result
            ]), 200);
        } else {
            $this->response($this->json([
                'message'=>'Something went wrong',
                'result' => $result
            ]), 400);
        }

    } else {
        $this->response($this->json([
            'message'=>"bad request"
        ]), 400);
    }
};
