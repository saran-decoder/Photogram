<?php
    if (isset($_FILES['avatar'])) {
        $avatar = $_FILES['avatar']['tmp_name'];
        Group::GroupAvatar($avatar);
    }

    $edit_group = Group::getAllGroupinfo();
    while ($edit_group) {
        $info = Group::getAllGroupinfo('owner');
?>
    <div class="content-sidebar z-1 position-fixed d-none">
        <div class="content-sidebar-title d-block p-3">            
            <form class="row" method="post" action="" enctype="multipart/form-data">
                <div class="mr-3">
                    <div class="imageWrapper">
                        <!-- This is the preview image -->
                        <img class="update_img view_image" src="<?=$info['g_avatar']?>" alt="..." width="180" height="180">
                    </div>
                    <div class="position-relative d-flex justify-content-center" style="top: 5px;">
                        <div class="profile_input update_image" style="cursor: pointer;">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                            </svg>
                        </div>
                    </div>
                    <input type="file" accept="image/*" name="avatar" class="custom-file-input file-input form__file"> 
                </div>
                <div class="d-flex justify-content-between align-items-center position-relative" style="bottom: 16rem;">
                    <a class="text" href="discussion">
                        <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                            <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                        </svg>
                    </a>
                    <button class="btn" type="submit" style="color: #fff; background: #0d6efd; padding: 3px; border-radius: 1rem;">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                            <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                        </svg>
                    </button>
                </div>
            </form>
            <div class="d-flex align-items-center">
                <span class="text edit-title-name"><?=$info['g_title']?></span>
                <span class="ms-2 edit-title">edit <!-- TODO: implement edit pencle icon --> </span>
            </div>
        </div>
    </div>

    <!-- start: edit title -->
        <?php Session::loadTemplate('group/e_title'); ?>
    <!-- end: edit title -->
<?php break; } ?>