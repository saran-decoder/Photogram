<?php

// https://domain/api/posts/delete
${basename(__FILE__, '.php')} = function(){
    $result = [
        "success" => false,
        "auth" => $this->isAuthenticated(),
        "message" => "Upvote the post"
    ];
    $this->response($this->json($result), 200);
};