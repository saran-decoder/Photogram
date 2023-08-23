<?php Session::loadTemplate('_header'); ?>

<?php

if (isset($_POST['post_text']) and isset($_FILES['post_image'])) {
    $image_tmp = $_FILES['post_image']['tmp_name'];
    $text = $_POST['post_text'];
    Post::registerPost($text, $image_tmp);
}

?>

<div class="container card-body">
    <div class="upload p-0">
        <div class="form-outer">
            <form class="form" id="form" action="" method="POST" enctype="multipart/form-data">

                <div class="page slide-page form__container center drag-area h-auto" id="upload-container">
                    <div class="sys_controler">
                        <div class="sys_upload">
                            <div class="form__files-container containers" id="files-list-container"></div>

                            <!-- This is the Contant field -->
                            <div class="form-group col-md-12 d-none">
                                <style>textarea#message::placeholder{ color: var(--timer-color); }</style>
                                <textarea class="form-control input-sm px-2" type="textarea" name="post_text" id="message" placeholder="What's on Your Mind?" maxlength="200" rows="6"></textarea>
                                <span class="help-block d-flex justify-content-end">
                                    <p id="characterLeft" class="help-block" style="margin-top: -2rem; margin-right: 1rem; color: var(--text-color);">You have reached the limit</p>
                                </span>
                            </div>

                            <div class="input_btn d-flex flex-column align-items-center justify-content-center on-drop" style="cursor: pointer; font-size: larger;">
                                <div class="upload_ico">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="34" height="34" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                                    </svg>
                                </div>
                                <div class="upload_txt mt-2">Uploads</div>
                                <p class="image-count"></p>
                            </div>

                            <input type="file" accept="image/*" name="post_image" class="custom-file-input file form__file" id="chooseFile" multiple required>
                        </div>
                        <div class="field field_btns px-3 m-0">
                            <a href="/" class="firstClose close" id="upclose">Close</a>
                            <button type="submit" name="submit" id="post" class="submit justify-content-around align-items-center next" style="display: none;">Post</button>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>