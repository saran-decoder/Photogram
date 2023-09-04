<?php Session::loadTemplate('_header'); ?>

<style>
    nav.navbar.w-100.h-100.p-2.position-fixed.rs-navbar.sidebar {
        display: none;
    }
    textarea.form-control::placeholder {
        color: var(--timer-color);
    }
    input.form-control::placeholder {
        color: var(--timer-color);
    }
</style>

<div class="container list p-0"> 
	<div class="profile-layout h-100 position-absolute">
		<div class="rows justify-content-center">
			<div class="col col-10 p-0 w-100">
                <?php
                    $loggedInProfileowner = Profile::getProfileowner();
                    while ($loggedInProfileowner) {
                        $profileowner = Profile::getProfileowner('username');
                    
                        $loggedInProfile = Profile::getProfile();
                        while ($loggedInProfile) {
                            $profile = Profile::getProfile('owner');
                ?>
                <div class="overflow-hidden">
                    <div class="px-2 py-4">
                        <?php
                            if (isset($_FILES['update_image']))
                            {
                                $avatar = $_FILES['update_image']['tmp_name'];
                                Profile::profile($avatar);
                            }
                        ?>
                        <!-- image update form data -->
                        <form class="row" method="post" action="" enctype="multipart/form-data">
                            <div class="mr-3">
                                <div class="imageWrapper">
                                    <!-- This is the preview image -->
                                    <img class="update_img view_image" src="<?=$profile['avatar']?>" alt="..." width="180" height="180">
                                </div>
                                <div class="position-relative d-flex justify-content-center" style="top: 5px;">
                                    <div class="profile_input update_image" style="cursor: pointer;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                                        </svg>
                                    </div>
                                </div>
                                <input type="file" accept="image/*" name="update_image" class="custom-file-input file-input form__file"> 
                            </div>
                            <div class="d-flex justify-content-between align-items-center position-relative" style="bottom: 16rem;">
                                <a class="text" href="profile">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                                    </svg>
                                </a>
                                <button class="btn" type="submit" style="color: #fff; background: green; padding: 3px; border-radius: 1rem;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                                        <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                                    </svg>
                                </button>
                            </div>
                        </form>
                        
                        
                        <div class="list-group list-group-checkable d-grid border-0 gap-4">
                            <label class="list-group-item rounded-3 py-3 text d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="text-profile-style">Bio</span>
                                    <span class="d-block small opacity-50"><?=$profile['bio']?></span>
                                </div>
                                <div class="pro-ico active" id="bioRightIcon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </div>
                                <div class="pro-ico" id="bioDownIcon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </div>
                            </label>
                            <?php Session::loadTemplate('profile/bio'); ?>


                            <label class="list-group-item rounded-3 py-3 text d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="text-profile-style">Username</span>
                                    <span class="d-block small opacity-50"><?=$profileowner['username']?></span>
                                </div>
                                <div class="pro-ico active" id="userRightIcon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </div>
                                <div class="pro-ico" id="userDownIcon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </div>
                            </label>
                            <?php Session::loadTemplate('profile/user'); ?>


                            <label class="list-group-item rounded-3 py-3 text d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="text-profile-style">Email</span>
                                    <span class="d-block small opacity-50"><?=$profileowner['email']?></span>
                                </div>
                                <div class="pro-ico active" id="emailRightIcon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </div>
                                <div class="pro-ico" id="emailDownIcon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </div>
                            </label>
                            <?php Session::loadTemplate('profile/email'); ?>


                            <label class="list-group-item rounded-3 py-3 text d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="text-profile-style">Phone Number</span>
                                    <span class="d-block small opacity-50"><?=$profileowner['phone']?></span>
                                </div>
                                <div class="pro-ico active" id="numRightIcon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </div>
                                <div class="pro-ico" id="numDownIcon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </div>
                            </label>
                            <?php Session::loadTemplate('profile/phone'); ?>


                            <label class="list-group-item rounded-3 py-3 text d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="text-profile-style">Gender</span>
                                    <span class="d-block small opacity-50"><?=$profile['gender']?></span>
                                </div>
                                <div class="pro-ico active" id="genRightIcon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </div>
                                <div class="pro-ico" id="genDownIcon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </div>
                            </label>
                            <?php Session::loadTemplate('profile/gender'); ?>


                            <label class="list-group-item rounded-3 py-3 text d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="text-profile-style">Birthday</span>
                                    <span class="d-block small opacity-50"><?=$profile['dob']?></span>
                                </div>
                                <div class="pro-ico active" id="dobRightIcon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </div>
                                <div class="pro-ico" id="dobDownIcon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </div>
                            </label>
                            <?php Session::loadTemplate('profile/dob'); ?>


                            <label class="list-group-item rounded-3 py-3 text d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="text-profile-style">Link</span>
                                    <span class="d-block small opacity-50"><?=$profile['link']?></span>
                                </div>
                                <div class="pro-ico active" id="linkRightIcon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </div>
                                <div class="pro-ico" id="linkDownIcon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </div>
                            </label>
                            <?php Session::loadTemplate('profile/link'); ?>

                            
                            <label class="list-group-item rounded-3 py-3 text d-flex align-items-center justify-content-between">
                                <div>
                                    <span class="text-profile-style">Change Password</span>
                                    <span class="d-block small opacity-50">**********</span>
                                </div>
                                <div class="pro-ico active" id="passRightIcon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </div>
                                <div class="pro-ico" id="passDownIcon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </div>
                            </label>
                            <?php Session::loadTemplate('profile/pass'); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php break; } break; } ?>