					<!-- START OF POSTS -->
					<div class="d-flex flex-column position-relative"> <!-- style="z-index: -1;" -->
						<?php
							$posts = Post::getAllPosts();
							use Carbon\Carbon;

							foreach ($posts as $post) {
								$p = new Post($post['id']);
								$uploaded_time = Carbon::parse($p->getUploadedTime());
								$uploaded_time_str = $uploaded_time->diffForHumans();
						?>                    
                        <div class="card rounded-0" id="post-<?=$post['id']?>">
                            <div class="p-2">
                                <div class="d-flex flex-row align-items-center">
                                    <div class="rounded-circle overflow-hidden d-flex justify-content-center align-items-center post-profile-photo mr-3" style="width: 2.8rem;height: 2.4rem;">
                                        <img src="assets/images/profiles/profile-1.jpg" alt="..." style="transform: scale(1); width: 100%;">
                                    </div>
                                    <strong class="font-weight-bold mx-2 w-100 d-flex flex-column">
                                        <a class="text-decoration-none text-capitalize" style="font-variant: petite-caps; color: var(--text-color);"><?=$p->getOwner()?></a>
                                        <small class="text-muted" style="color: var(--timer-color) !important; font-size: x-small;"><?=$uploaded_time_str?></small>
                                    </strong>
                                    <a id="dell"><button class="btn p-0 mb-1 text" style="margin-left: 0rem; border: none;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="1.5em" height="1.5em" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
                                            <path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"></path>
                                        </svg>
                                    </button></a>
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
                                                    <svg width="1.6em" height="1.6em" viewBox="0 0 16 16" class="bi bi-heart text" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M8 2.748l-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"></path>
                                                    </svg>
                                                </button>
                                                <strong class="d-block">100M</strong>
                                            </li>
                                            <li class="list-inline-item d-flex align-items-center mb-1">
                                                <button class="btn p-0 list-inline-item">
                                                    <svg width="1.6em" height="1.6em" viewBox="0 0 16 16" class="bi bi-chat text" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                                                        <path fill-rule="evenodd" d="M2.678 11.894a1 1 0 0 1 .287.801 10.97 10.97 0 0 1-.398 2c1.395-.323 2.247-.697 2.634-.893a1 1 0 0 1 .71-.074A8.06 8.06 0 0 0 8 14c3.996 0 7-2.807 7-6 0-3.192-3.004-6-7-6S1 4.808 1 8c0 1.468.617 2.83 1.678 3.894zm-.493 3.905a21.682 21.682 0 0 1-.713.129c-.2.032-.352-.176-.273-.362a9.68 9.68 0 0 0 .244-.637l.003-.01c.248-.72.45-1.548.524-2.319C.743 11.37 0 9.76 0 8c0-3.866 3.582-7 8-7s8 3.134 8 7-3.582 7-8 7a9.06 9.06 0 0 1-2.347-.306c-.52.263-1.639.742-3.468 1.105z"></path>
                                                    </svg>
                                                </button>
                                                <strong class="d-block">10</strong>
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
                                        <strong class="d-block list-inline-item" style="text-align-last: end;">
                                            <a class="text-decoration-none text-capitalize" style="font-size: larger; font-variant: petite-caps; color: var(--text-color)"><?=$p->getOwner()?></a>
                                        </strong>
                                        <p class="d-block mb-1" style="font-size: large;"><?=$p->getPostText()?></p>
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