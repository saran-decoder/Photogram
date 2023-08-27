<?php Session::loadTemplate('_header'); ?>

<?php

if (isset($_POST['bio_text']) and isset($_FILES['update_image'])) {
    $bio = $_POST['bio_text'];
    $avatar = $_FILES['update_image']['tmp_name'];
    $result = Profile::profile($bio, $avatar, $gender, $dob, $links);
    die(var_dump($result));
}

?>

<style>
    nav.navbar.w-100.h-100.p-2.position-fixed.rs-navbar.sidebar {
        display: none;
    }
</style>

<div class="container list p-0"> 
	<div class="profile-layout">
		<div class="row justify-content-center;">
			<div class="col col-10 p-0 w-100">
                <?php
                    $loggedInProfile = Profile::getProfileowner();
                    while ($loggedInProfile) {
                        $profile = Profile::getProfileowner('username');
                ?>
                <div class="overflow-hidden">
                    <div class="p-4">
                        <!-- Write a edit form data -->
                        <form class="row" method="post" action="profile-edit">
                            <div class="mr-3 d-flex flex-column align-items-center view_img">
                                <div class="view_image">
                                    <!-- This is the preview image -->
                                </div>
                                <img class="update_img" src="/ava/avatar.jpg" alt="..." width="130" style="border-radius: 4rem;">
                                <div class="input_profile_btn position-relative" style="cursor: pointer; bottom: 38px; left: 45px;">
                                    <div class="update_image">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2Z"/>
                                        </svg>
                                    </div>
                                </div>
                                <input type="file" accept="image/*" name="update_image" class="custom-file-input file form__file"> 
                            </div>
                            <div class="col-md-12">
                                <label class="form-label text">Bio</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Bio</span>
                                    <textarea class="form-control" name="bio_text" type="text"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text">Username</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">@</span>
                                    <input type="text" class="form-control" placeholder="<?=$profile['username']?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text">Email</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-envelope-at" viewBox="0 0 16 16">
                                            <path d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2H2Zm3.708 6.208L1 11.105V5.383l4.708 2.825ZM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2-7-4.2Z"/>
                                            <path d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648Zm-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z"/>
                                        </svg>
                                    </span>
                                    <input type="email" class="form-control" placeholder="<?=$profile['email']?>">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text">Phone</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-phone" viewBox="0 0 16 16">
                                            <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"/>
                                            <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                        </svg>
                                    </span>
                                    <input type="phone" class="form-control" placeholder="<?=$profile['phone']?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label text">Gender</label>
                                <select class="form-select mb-3">
                                    <option selected="" disabled="" value="">Choose</option>
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label text">Birthday</label>
                                <select class="form-select mb-3">
                                    <option selected="" disabled="" value="">Choose</option>
                                    <option>yyyy</option>
                                    <option>mm</option>
                                    <option>dd</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text">Old Password</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        P
                                    </span>
                                    <input type="password" class="form-control" placeholder="**********">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text">New Password</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">
                                        P
                                    </span>
                                    <input type="password" class="form-control" placeholder="**********">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text">Github</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Https://</span>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text">LinkedIn</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Https://</span>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label class="form-label text">Website</label>
                                <div class="input-group mb-3">
                                    <span class="input-group-text">Https://</span>
                                    <input type="text" class="form-control">
                                </div>
                            </div>
                            <div class="d-flex justify-content-around pt-3">
                                <button class="btn btn-primary" type="submit">Update Profile</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php break; } ?>