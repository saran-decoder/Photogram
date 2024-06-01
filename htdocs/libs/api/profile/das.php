<?php

// https://domain/api/profile/delete
${basename(__FILE__, '.php')} = function () {
    if ($this->isAuthenticated() and $this->paramsExists('id')) {
        $token = $this->_request['id'];
        $das = UserSession::DeleteSession($token);
        $this->response($this->json([
            'Status' => $das,
            'message' => 'All Session is Deleted',
        ]), 200);
    } else {
        $this->response($this->json([
            'message'=>"bad request"
        ]), 400);
    }
};
