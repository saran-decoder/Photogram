            <div class="tab-pane fade active show" id="posts" role="tabpanel">
                <div class="container">
                    <div class="row gy-3 g-md-3 hcf-isotope-grid" data-masonry='{"percentPosition": true }'>
                        <?php
                            $userPosts = Post::getUserposts();
                            use Carbon\Carbon;
                            
                            if (!empty($userPosts)) {
                                foreach ($userPosts as $post) {
                                    $p = new Post($post['id']);
                                    $uploaded_time = Carbon::parse($p->getUploadedTime());
                                    $uploaded_time_str = $uploaded_time->diffForHumans();
                        ?>
                        <div class="col-12 col-md-6 col-lg-4 hcf-isotope-item" id="post-<?=$blog['id']?>">
                            <a class="hcf-masonry-card rounded rounded-4" type="button" id="post-<?=$post['id']?>">
                                <img class="card-img img-fluid" loading="lazy" src="<?=$post['image_uri']?>" alt="Your Post">
                            </a>
                            <!-- Modal -->
                            <div id="post-<?=$post['id']?>" class="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-live="assertive" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col col-lg-6 p-0"> <!--  col-md-auto col-lg-auto  -->
                                                    <div class="position-relative">
                                                        <button type="button" class="close text profile-icon position-absolute mt-2 ms-2" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                                                    <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"></path>
                                                                </svg>
                                                            </span>
                                                        </button>
                                                        <!-- Start dropdown menu -->
                                                        <button type="button" class="button dd text profile-icon position-absolute custom-right mt-2 me-2" id="post-<?=$post['id']?>">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                                                <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3"/>
                                                            </svg>
                                                        </button>
                                                        <div class="dropdown mt-3 me-3" id="post-<?=$post['id']?>">
                                                            <a class="dropdown-item post-download" type="button" id="post-<?=$post['id']?>">
                                                                <svg class="pe-2 pb-1" xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24">
                                                                    <g fill="none" stroke="currentColor" stroke-linecap="round" stroke-width="1.5">
                                                                        <path d="M22 12c0 4.714 0 7.071-1.465 8.535C19.072 22 16.714 22 12 22s-7.071 0-8.536-1.465C2 19.072 2 16.714 2 12s0-7.071 1.464-8.536C4.93 2 7.286 2 12 2"/>
                                                                        <path d="m2 12.5l1.752-1.533a2.3 2.3 0 0 1 3.14.105l4.29 4.29a2 2 0 0 0 2.564.222l.299-.21a3 3 0 0 1 3.731.225L21 18.5"/>
                                                                        <path stroke-linejoin="round" d="M17 11V2m0 9l3-3m-3 3l-3-3"/>
                                                                    </g>
                                                                </svg>Download post
                                                            </a>
                                                            <a class="dropdown-item" type="button">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 48 48" class="pe-2 pb-1">
                                                                    <path fill="currentColor" d="M31.605 6.838a1.25 1.25 0 0 0-2.105.912v5.472c-.358.008-.775.03-1.24.072c-1.535.142-3.616.526-5.776 1.505c-4.402 1.995-8.926 6.374-9.976 15.56a1.25 1.25 0 0 0 2.073 1.075c4.335-3.854 8.397-5.513 11.336-6.219a17.713 17.713 0 0 1 3.486-.497l.097-.003v5.535a1.25 1.25 0 0 0 2.105.912l12-11.25a1.25 1.25 0 0 0 0-1.824zm-.999 8.904l.02.002h.002h-.001A1.25 1.25 0 0 0 32 14.5v-3.865L40.922 19L32 27.365V23.5c0-.63-.454-1.16-1.095-1.24h-.003l-.004-.001l-.01-.001l-.028-.003a8.425 8.425 0 0 0-.41-.03a13.505 13.505 0 0 0-1.134-.006c-.966.034-2.33.17-3.983.566c-2.68.643-6.099 1.971-9.778 4.653c1.486-6.08 4.863-8.958 7.96-10.362c1.841-.834 3.635-1.168 4.975-1.292c.668-.062 1.216-.07 1.591-.064a9.837 9.837 0 0 1 .525.022M12.25 8A6.25 6.25 0 0 0 6 14.25v21.5A6.25 6.25 0 0 0 12.25 42h21.5A6.25 6.25 0 0 0 40 35.75V33.5a1.25 1.25 0 0 0-2.5 0v2.25a3.75 3.75 0 0 1-3.75 3.75h-21.5a3.75 3.75 0 0 1-3.75-3.75v-21.5a3.75 3.75 0 0 1 3.75-3.75h8.25a1.25 1.25 0 1 0 0-2.5z"/>
                                                                </svg>Share this post
                                                            </a>
                                                            <hr class="m-1">
                                                            <?php
                                                                if (Session::isOwnerOf($p->getOwner())) {
                                                            ?>
                                                            <div data-id="<?=$post['id']?>">
                                                                <a class="dropdown-item text-danger" id="dell">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-trash3 pe-2 pb-1" viewBox="0 0 16 16">
                                                                        <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"></path>
                                                                    </svg>Delete post
                                                                </a>
                                                            </div>
                                                            <?php
                                                                } else {
                                                            ?>
                                                            <a class="dropdown-item text-danger" type="button">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle pe-2 pb-1" viewBox="0 0 16 16">
                                                                    <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.146.146 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.163.163 0 0 1-.054.06.116.116 0 0 1-.066.017H1.146a.115.115 0 0 1-.066-.017.163.163 0 0 1-.054-.06.176.176 0 0 1 .002-.183L7.884 2.073a.147.147 0 0 1 .054-.057zm1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566z"/>
                                                                    <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                                                                </svg>Report post
                                                            </a>
                                                            <?php } ?>
                                                        </div>
                                                        <!-- End dropdown menu -->
                                                    </div>
                                                    <img class="custom-wh" id="img-post-<?=$post['id']?>" src="<?=$post['image_uri']?>" alt="User Post">
                                                </div>
                                                <div class="col col-lg-6 p-3">     
                                                    <div class="font-weight-bold w-100 d-flex align-items-center justify-content-between" data-id="<?=$post['id']?>">
                                                        <a href="<?=get_config('base_path');?>profile<?=get_config('base_path');?><?=$post['owner']?>" class="text-decoration-none d-flex align-items-center text-capitalize text user-name">
                                                            <img class="rounded-circle me-2" src="<?=$p->getAvatar();?>" width="35" alt="">
                                                            <p class="user-name m-0"><?=$post['owner']?></p>
                                                        </a>
                                                        <ul class="list-inline d-flex flex-row align-items-center m-0">
                                                            <li class="list-inline-item d-flex align-items-end">
                                                                <?php
                                                                    if (Session::isAuthenticated()) {
                                                                        $islike = new Like($post['id']);
                                                                        if ($islike->is_liked() ? $islike->is_liked()['owner'] : 0 == Session::getUser()->getUsername()) {
                                                                            if ($islike->is_liked()['status'] == 'liked') {
                                                                ?>
                                                                <!-- unlike button -->
                                                                <button class="btn p-0 list-inline-item me-2 text-danger btn-like liked icon-liked" id="like-<?=$post['id']?>">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 48 48">
                                                                        <path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="3.35" d="M15 8C8.925 8 4 12.925 4 19c0 11 13 21 20 23.326C31 40 44 30 44 19c0-6.075-4.925-11-11-11c-3.72 0-7.01 1.847-9 4.674A10.987 10.987 0 0 0 15 8"></path>
                                                                    </svg>
                                                                </button>
                                                                <button class="btn p-0 list-inline-item me-2 btn-like liked d-none icon-like" id="like-<?=$post['id']?>">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                                                                        <path fill="currentColor" d="m8.962 18.91l.464-.588zM12 5.5l-.54.52a.75.75 0 0 0 1.08 0zm3.038 13.41l.465.59zm-5.612-.588C7.91 17.127 6.253 15.96 4.938 14.48C3.65 13.028 2.75 11.335 2.75 9.137h-1.5c0 2.666 1.11 4.7 2.567 6.339c1.43 1.61 3.254 2.9 4.68 4.024zM2.75 9.137c0-2.15 1.215-3.954 2.874-4.713c1.612-.737 3.778-.541 5.836 1.597l1.08-1.04C10.1 2.444 7.264 2.025 5 3.06C2.786 4.073 1.25 6.425 1.25 9.137zM8.497 19.5c.513.404 1.063.834 1.62 1.16c.557.325 1.193.59 1.883.59v-1.5c-.31 0-.674-.12-1.126-.385c-.453-.264-.922-.628-1.448-1.043zm7.006 0c1.426-1.125 3.25-2.413 4.68-4.024c1.457-1.64 2.567-3.673 2.567-6.339h-1.5c0 2.198-.9 3.891-2.188 5.343c-1.315 1.48-2.972 2.647-4.488 3.842zM22.75 9.137c0-2.712-1.535-5.064-3.75-6.077c-2.264-1.035-5.098-.616-7.54 1.92l1.08 1.04c2.058-2.137 4.224-2.333 5.836-1.596c1.659.759 2.874 2.562 2.874 4.713zm-8.176 9.185c-.526.415-.995.779-1.448 1.043c-.452.264-.816.385-1.126.385v1.5c.69 0 1.326-.265 1.883-.59c.558-.326 1.107-.756 1.62-1.16z"/>
                                                                    </svg>
                                                                </button>
                                                                <?php } else { ?>
                                                                <!-- liked button -->
                                                                <button class="btn p-0 list-inline-item me-2 btn-like" id="like-<?=$post['id']?>">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                                                                        <path fill="currentColor" d="m8.962 18.91l.464-.588zM12 5.5l-.54.52a.75.75 0 0 0 1.08 0zm3.038 13.41l.465.59zm-5.612-.588C7.91 17.127 6.253 15.96 4.938 14.48C3.65 13.028 2.75 11.335 2.75 9.137h-1.5c0 2.666 1.11 4.7 2.567 6.339c1.43 1.61 3.254 2.9 4.68 4.024zM2.75 9.137c0-2.15 1.215-3.954 2.874-4.713c1.612-.737 3.778-.541 5.836 1.597l1.08-1.04C10.1 2.444 7.264 2.025 5 3.06C2.786 4.073 1.25 6.425 1.25 9.137zM8.497 19.5c.513.404 1.063.834 1.62 1.16c.557.325 1.193.59 1.883.59v-1.5c-.31 0-.674-.12-1.126-.385c-.453-.264-.922-.628-1.448-1.043zm7.006 0c1.426-1.125 3.25-2.413 4.68-4.024c1.457-1.64 2.567-3.673 2.567-6.339h-1.5c0 2.198-.9 3.891-2.188 5.343c-1.315 1.48-2.972 2.647-4.488 3.842zM22.75 9.137c0-2.712-1.535-5.064-3.75-6.077c-2.264-1.035-5.098-.616-7.54 1.92l1.08 1.04c2.058-2.137 4.224-2.333 5.836-1.596c1.659.759 2.874 2.562 2.874 4.713zm-8.176 9.185c-.526.415-.995.779-1.448 1.043c-.452.264-.816.385-1.126.385v1.5c.69 0 1.326-.265 1.883-.59c.558-.326 1.107-.756 1.62-1.16z"/>
                                                                    </svg>
                                                                </button>
                                                                <?php
                                                                    }
                                                                        } else { ?>
                                                                <!-- liked button -->
                                                                <button class="btn p-0 list-inline-item me-2 btn-like" id="like-<?=$post['id']?>">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" viewBox="0 0 24 24">
                                                                        <path fill="currentColor" d="m8.962 18.91l.464-.588zM12 5.5l-.54.52a.75.75 0 0 0 1.08 0zm3.038 13.41l.465.59zm-5.612-.588C7.91 17.127 6.253 15.96 4.938 14.48C3.65 13.028 2.75 11.335 2.75 9.137h-1.5c0 2.666 1.11 4.7 2.567 6.339c1.43 1.61 3.254 2.9 4.68 4.024zM2.75 9.137c0-2.15 1.215-3.954 2.874-4.713c1.612-.737 3.778-.541 5.836 1.597l1.08-1.04C10.1 2.444 7.264 2.025 5 3.06C2.786 4.073 1.25 6.425 1.25 9.137zM8.497 19.5c.513.404 1.063.834 1.62 1.16c.557.325 1.193.59 1.883.59v-1.5c-.31 0-.674-.12-1.126-.385c-.453-.264-.922-.628-1.448-1.043zm7.006 0c1.426-1.125 3.25-2.413 4.68-4.024c1.457-1.64 2.567-3.673 2.567-6.339h-1.5c0 2.198-.9 3.891-2.188 5.343c-1.315 1.48-2.972 2.647-4.488 3.842zM22.75 9.137c0-2.712-1.535-5.064-3.75-6.077c-2.264-1.035-5.098-.616-7.54 1.92l1.08 1.04c2.058-2.137 4.224-2.333 5.836-1.596c1.659.759 2.874 2.562 2.874 4.713zm-8.176 9.185c-.526.415-.995.779-1.448 1.043c-.452.264-.816.385-1.126.385v1.5c.69 0 1.326-.265 1.883-.59c.558-.326 1.107-.756 1.62-1.16z"/>
                                                                    </svg>
                                                                </button>
                                                                <?php } } ?>
                                                                <div class="text" id="like-count-<?=$post['id']?>"><?=$p->getLikeCount()?></div>
                                                            </li>
                                                            <!-- TODO: Implement the command code -->
                                                        </ul>
                                                    </div>
                                                    <p class="text m-0 mt-2"><?=$post['post_text']?></p>
                                                    <p class="time-date m-0 text-end"><?=$uploaded_time_str?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Ends -->
                        </div>
                        <?php
                                }
                            } else {
                        ?>
                            <h5 class="text-muted text-center mt-4">No Post's</h5>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>