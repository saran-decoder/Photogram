<?php

${basename(__FILE__, '.php')} = function () {
    if ($this->isAuthenticated() and $this->paramsExists('id')) {
        $post_id = $this->_request['id']; // Assuming 'id' is the post_id
        $id = new Like($post_id); // Pass the post_id as a parameter
        $data = [
            'Message' => $id->ckeck_isliked()
        ];
        $this->response($this->json($data), 200);
    } else {
        $this->response($this->json([
            'Message' => "Bad request"
        ]), 400);
    }
};