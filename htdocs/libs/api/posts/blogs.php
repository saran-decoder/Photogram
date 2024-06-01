<?php

${basename(__FILE__, '.php')} = function () {
    if ($this->isAuthenticated() && $this->paramsExists('blog_title') && $this->paramsExists('blog_text') && $this->paramsExists('blog_image')) {
        $title = $_POST['blog_title'];
        $text = $_POST['blog_text'];
        $getblog = $_POST['blog_image'];
        $setpost = explode(',', $getblog);
        $image_tmp = base64_decode($setpost[1]);
        Post::registerBlog($title, $text, $image_tmp);
    } else {
        $this->response($this->json([
            'message'=>"bad request"
        ]), 400);
    }
};