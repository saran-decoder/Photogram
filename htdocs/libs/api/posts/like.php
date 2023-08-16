<?php

${basename(__FILE__, '.php')} = function () {
    if ($this->isAuthenticated() and $this->paramsExists('id')) {
        $p = new Post($this->_request['id']);
        $l = new Like($p);
        $l->toggleLike();
        $this->response($this->json([
            'liked'=>$l->isLiked()
        ]), 200);
    } else {
        $this->response($this->json([
            'message'=>"bad request"
        ]), 400);
    }
};
