<?php

// https://domain/api/auth/deactive
${basename(__FILE__, '.php')} = function () {
    if ($this->isAuthenticated()) {
        $deactive = User::DeleteAccount();
        $this->response($this->json([
            'Status' => $deactive,
            'message' => 'Account is Deleted',
        ]), 200);
    } else {
        $this->response($this->json([
            'message'=>"bad request"
        ]), 400);
    }
};
