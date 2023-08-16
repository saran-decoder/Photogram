<?php

// https://domain/api/posts/delete
${basename(__FILE__, '.php')} = function () {
    $this->response($this->json(Post::countAllPosts()[0]), 200);
};
