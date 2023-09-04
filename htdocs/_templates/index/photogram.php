<style>
    li.nav-link.d-none.align-items-center.profile.position-fixed.me-0 {
        display: flex !important;
    }
</style>

    <div class="container list"> 
		<div class="col col-12">
			<div class="row justify-content-center;">
				<div class="col col-10 p-0 w-100 mt-0">
                    <!-- START OF POSTS -->
					<div class="d-flex flex-column position-relative">
						<?php
							$posts = Post::getAllPosts();
							use Carbon\Carbon;

                            // $Profileavatar = Post::getPostavatar();
                            // foreach ($Profileavatar as $profile) {
                                // $user = $profile['avatar'];
                                // die(var_dump($user));

							foreach ($posts as $post) {
								$p = new Post($post['id']);
								$uploaded_time = Carbon::parse($p->getUploadedTime());
								$uploaded_time_str = $uploaded_time->diffForHumans();
						?>                    
                        <div class="card rounded-0" id="post-<?=$post['id']?>">
                            <div class="p-2 py-3">
                                <div class="d-flex flex-row align-items-center">
                                    <div class="rounded-circle overflow-hidden d-flex justify-content-center align-items-center post-profile-photo mr-3" style="width: 2.8rem;height: 2.4rem;">
                                        <img src="<?=$p->getAvatar()?>" alt="..." style="transform: scale(1); width: 100%;">
                                    </div>
                                    <strong class="font-weight-bold mx-2 w-100 d-flex flex-column">
                                        <a class="text-decoration-none text-capitalize" style="font-variant: petite-caps; color: var(--text-color);"><?=$p->getOwner()?></a>
                                        <small class="text-muted" style="color: var(--timer-color) !important; font-size: x-small;"><?=$uploaded_time_str?></small>
                                    </strong>
                                    <!-- START dropdown-->
                                    <div class="dropdown float-left btn-group">
                                        <button class="btn p-0 mt-1 text btn-flat btn-flat-icon" type="button" style="margin-left: 0rem; border: none; color: var(--text-color);" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                                <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"></path>
                                            </svg>
                                        </button>
                                        <div class="dropdown-menu dropdown-scale dropdown-menu-left" role="menu" data-id="<?=$post['id']?>" style="position: absolute; transform: translate3d(-136px, 28px, 0px); top: 5px; left: -8px; will-change: transform;">
                                            <a class="dropdown-item" href="#">Hide post</a>
                                            <a class="dropdown-item" href="#">Share</a>
                                            <?php
                                                if (Session::isOwnerOf($p->getOwner())) {
                                            ?>
                                                <a class="dropdown-item btn-delete" id="dell">Delete</a>
                                            <? } ?>
                                        </div>
                                    </div><!-- dropdown -->
                                </div>
                            </div>
                            <div class="card-body p-0">
                                <div class="px-2 pb-3 w-100">
                                    <img class="w-100 card-img" src="<?=$p->getImageUri()?>">
                                </div>
                                <div class="p-2 pt-0 pb-1">
                                    <div class="d-flex flex-row justify-content-between pl-3 pr-3 pb-1" data-id="<?=$post['id']?>">
                                        <ul class="list-inline d-flex flex-row align-items-center m-0">
                                            <li class="list-inline-item d-flex align-items-center">
                                                <button class="btn p-0 list-inline-item">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="1.8em" height="1.8em" fill="currentColor" class="bi bi-arrow-through-heart" viewBox="0 0 16 16">
                                                        <path fill-rule="evenodd" d="M2.854 15.854A.5.5 0 0 1 2 15.5V14H.5a.5.5 0 0 1-.354-.854l1.5-1.5A.5.5 0 0 1 2 11.5h1.793l.53-.53c-.771-.802-1.328-1.58-1.704-2.32-.798-1.575-.775-2.996-.213-4.092C3.426 2.565 6.18 1.809 8 3.233c1.25-.98 2.944-.928 4.212-.152L13.292 2 12.147.854A.5.5 0 0 1 12.5 0h3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-.854.354L14 2.707l-1.006 1.006c.236.248.44.531.6.845.562 1.096.585 2.517-.213 4.092-.793 1.563-2.395 3.288-5.105 5.08L8 13.912l-.276-.182a21.86 21.86 0 0 1-2.685-2.062l-.539.54V14a.5.5 0 0 1-.146.354l-1.5 1.5Zm2.893-4.894A20.419 20.419 0 0 0 8 12.71c2.456-1.666 3.827-3.207 4.489-4.512.679-1.34.607-2.42.215-3.185-.817-1.595-3.087-2.054-4.346-.761L8 4.62l-.358-.368c-1.259-1.293-3.53-.834-4.346.761-.392.766-.464 1.845.215 3.185.323.636.815 1.33 1.519 2.065l1.866-1.867a.5.5 0 1 1 .708.708L5.747 10.96Z"/>
                                                    </svg>
                                                </button>
                                                <strong class="d-block">1M</strong>
                                            </li>
                                            <li class="list-inline-item d-flex align-items-center mb-1">
                                                <button class="btn p-0 list-inline-item">
                                                    <svg width="1.6em" height="1.6em" viewBox="0 0 16 16" class="bi bi-chat text" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"></path>
                                                    </svg>
                                                </button>
                                                <strong class="d-block">1K</strong>
                                            </li>
                                        </ul>
                                        <div>
                                            <button class="btn p-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" class="bi bi-share text" viewBox="0 0 16 16">
                                                    <path d="M13.5 1a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zM11 2.5a2.5 2.5 0 1 1 .603 1.628l-6.718 3.12a2.499 2.499 0 0 1 0 1.504l6.718 3.12a2.5 2.5 0 1 1-.488.876l-6.718-3.12a2.5 2.5 0 1 1 0-3.256l6.718-3.12A2.5 2.5 0 0 1 11 2.5zm-8.5 4a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3zm11 5.5a1.5 1.5 0 1 0 0 3 1.5 1.5 0 0 0 0-3z"></path>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                    
                                    <div class="pt-2">
                                        <!-- <strong class="d-block list-inline-item" style="text-align-last: end;">
                                            <a class="text-decoration-none text-capitalize" style="font-size: larger; font-variant: petite-caps; color: var(--text-color)"><?=$p->getOwner()?></a>
                                        </strong> -->
                                        <p class="d-block mb-2" style="font-size: 14px;"><?=$p->getPostText()?></p>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <?php
							}
						?>
                    </div>
                    <!-- END OF POSTS -->
					<!-- Mrs-Footer Image -->
					<img class="w-100 hidden-img" src="<?=get_config('base_path')?>assets/images/Footer/part-1.gif">
                    	<!-- Mrs-Footer Image -->
					</div>
				</div>
			</div>
		</div>