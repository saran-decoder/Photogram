<?php

${basename(__FILE__, '.php')} = function () {
    if ($this->isAuthenticated() && $this->paramsExists('post_text') && $this->paramsExists('post_image')) {
        $text = $_POST['post_text'];
        $getpost = $_POST['post_image'];
        $setpost = explode(',', $getpost);
        $image_tmp = base64_decode($setpost[1]);
        Post::registerPost($text, $image_tmp);
    } else {
        $this->response($this->json([
            'message'=>"bad request"
        ]), 400);
    }
};