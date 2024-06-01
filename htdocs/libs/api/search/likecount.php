<?php

${basename(__FILE__, '.php')} = function () {
    if ($this->isAuthenticated() and $this->paramsExists('id')) {
    // if ($this->paramsExists(['id'])) {
        $post_user = $this->_request['id'];
        $count = Profile::getTotalLikecount($post_user);
        if ($count) {
            $this->response($this->json([
                'Status' => 'Total Likes Counted Successfully',
                'Post Count' => $count,
            ]), 200);
        } else {
            $this->response($this->json([
                'message' => 'Count is Null',
            ]), 204);
        }
    } else {
        $this->response($this->json([
            'Message' => "Bad request"
        ]), 400);
    }
};