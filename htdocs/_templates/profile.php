<?php Session::loadTemplate('_header'); ?>

<div class="container list p-0"> 
	<div class="profile-layout">
		<div class="row justify-content-center;">
			<div class="col col-10 p-0 w-100">
                <?php
                    $loggedInProfile = Profile::getProfile();
                    while ($loggedInProfile) {
                        $profile = Profile::getProfile('owner');
                ?>
                <div class="overflow-hidden">
                    <div class="px-4">
                        <div class="media align-items-end profile-head">
                            <div class="d-flex justify-content-between position-relative" style="top: 30px;">
                                <div class="text">
                                    <a href="profile-edit">Edite</a>
                                </div>
                                <div class="text">
                                    <i>DL Mood</i>
                                </div>
                            </div>
                            <div class="mr-3 d-flex flex-column align-items-center">
                                <img src="<?=$profile['avatar']?>" alt="..." width="130" style="border-radius: 4rem;">    
                                <div class="pt-3 d-flex flex-column align-items-center">
                                    <h5 class="mb-0 text text-capitalize" style="font-variant: petite-caps;">
                                        <?=$profile['owner']?>
                                    </h5>
                                    <div class="py-2 rounded text">
                                        <p class="font-italic mb-0"><?=$profile['bio']?></p>
                                    </div>
                                </div>
                                <!-- <a href="#" class="btn btn-outline-dark btn-sm btn-block">Edit profile</a> -->
                            </div>
                        </div>
                    </div>
                    <div class="p-4 d-flex justify-content-end text-center">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item text">
                                <h5 class="font-weight-bold mb-0 d-block">200</h5>
                                <small class="text-muted" style="color: var(--timer-color) !important;">
                                    <i class="fas fa-image mr-1"></i>Posts
                                </small> 
                            </li>
                        </ul>
                    </div>
                    
                    <div class="py-4 px-4">
                        <div class="row">
                            <!-- <div class="col-lg-6 mb-2 pr-lg-1">
                                <img src="https://images.unsplash.com/photo-1469594292607-7bd90f8d3ba4?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" alt="" class="img-fluid rounded shadow-sm">
                            </div>
                            <div class="col-lg-6 mb-2 pl-lg-1">
                                <img src="https://images.unsplash.com/photo-1493571716545-b559a19edd14?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" alt="" class="img-fluid rounded shadow-sm">
                            </div>
                            <div class="col-lg-6 pr-lg-1 mb-2">
                                <img src="https://images.unsplash.com/photo-1453791052107-5c843da62d97?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1350&q=80" alt="" class="img-fluid rounded shadow-sm">
                            </div>
                            <div class="col-lg-6 pl-lg-1">
                                <img src="https://images.unsplash.com/photo-1475724017904-b712052c192a?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=750&q=80" alt="" class="img-fluid rounded shadow-sm">
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php break; } ?>