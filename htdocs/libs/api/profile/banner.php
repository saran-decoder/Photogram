<?php

${basename(__FILE__, '.php')} = function () {
    if ($this->isAuthenticated() && $this->paramsExists('banner_pick')) {
        $image_tmp = $_POST['banner_pick'];
        $image_tmp = explode(',', $image_tmp);
        $banner = base64_decode($image_tmp[1]);
        Profile::banner($banner);
    } else {
        $this->response($this->json([
            'message'=>"bad request"
        ]), 400);
    }
};