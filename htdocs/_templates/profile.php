<?php Session::loadTemplate('_header'); ?>

<div class="container list p-0"> 
	<div class="profile-layout h-100 position-absolute">
		<div class="d-flex justify-content-center">
			<div class="col col-10 p-0 w-100">
                
                <?php $profile = Profile::getuserProfile(); ?>
                
                <div class="overflow-hidden">
                    <div class="px-4">
                        <div class="media align-items-end profile-head" data-id="<?=$profile['userid']?>">
                            <?php
                                if (Session::isOwnerOf($profile['owner'])) {
                            ?>
                            <div class="d-flex justify-content-between position-relative" style="top: 30px;">
                                <div class="text">
                                    <a class="text" href="profile-edit" style="color: var(--text-color);">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="23" height="23" fill="currentColor" class="bi bi-columns-gap" viewBox="0 0 16 16">
                                            <path d="M6 1v3H1V1h5zM1 0a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1H1zm14 12v3h-5v-3h5zm-5-1a1 1 0 0 0-1 1v3a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1v-3a1 1 0 0 0-1-1h-5zM6 8v7H1V8h5zM1 7a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1H1zm14-6v7h-5V1h5zm-5-1a1 1 0 0 0-1 1v7a1 1 0 0 0 1 1h5a1 1 0 0 0 1-1V1a1 1 0 0 0-1-1h-5z"/>
                                        </svg>
                                    </a>
                                </div>
                                <div class="text">
                                    <a class="text" href="settings" style="color: var(--text-color);">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
                                            <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"></path>
                                            <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>
                            <?php } ?>
                            <div class="mr-3 d-flex flex-column align-items-center mt-5">
                                <img src="<?=$profile['avatar']?>" alt="..." width="130" style="border-radius: 4rem;">    
                                <div class="pt-3 d-flex flex-column align-items-center">
                                    <h5 class="mb-0 text text-capitalize" style="font-variant: petite-caps;">
                                        <?=$profile['owner']?>
                                    </h5>
                                    <div class="py-2 rounded text">
                                        <p class="font-italic mb-0"><?=$profile['bio']?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="p-4 d-flex">
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item text d-flex align-items-center">
                                <small class="text-muted" style="color: var(--text-color) !important;">
                                    <i class="fas fa-image mr-1"></i>Posts : 
                                </small> 
                                <?php
                                    $userpostCount = Profile::getPostcount();
                                    foreach ($userpostCount as $count) {
                                ?>
                                <h6 class="font-weight-bold mb-0 ms-1 d-block"><?=$count['image_uri']?></h6>
                                <?php } ?>
                            </li>
                        </ul>
                    </div>
    
                    <div class="p-2">
                        <div class="row" data-masonry='{"percentPosition": true }'>
                            <?php
                                $userPosts = Post::getUserposts();
                                foreach ($userPosts as $post) {
                            ?>
                            <div class="col-4">
                                <img src="<?=$post['image_uri']?>" alt="" class="img-fluid rounded shadow-sm my-2">
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>