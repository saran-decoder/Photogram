<?php

// https://domain/api/posts/delete
${basename(__FILE__, '.php')} = function(){
    $result = [
        "success" => false,
        "message" => "Downvoted the post"
    ];
    $this->response($this->json($result), 200);
};