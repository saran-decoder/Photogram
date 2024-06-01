                <div class="album py-5 w-100" id="offcanvas-blogs-tab" role="tabpanel">
                    <div class="container">
                        <div class="row">
                            <?php
                                $blogs = Post::getAllBlogs();
                                use Carbon\Carbon;

                                if (!empty($blogs)) {
                                    foreach ($blogs as $blog) {
                                        $b = new Post($blog['id']);
                                        $uploaded_time = Carbon::parse($b->getUploadedTime());
                                        $uploaded_time_str = $uploaded_time->Format("M j, Y");
                            ?>
                            <div class="col-lg-6 col-md-6 col-sm-12 pt-4 wrap" id="blog-<?=$blog['id']?>">
                                <div class="blog-card-list" data-id="<?=$blog['id']?>">
                                    <article class="blog-card">
                                        <figure class="blog-card-image viewer">
                                            <img src="<?=$blog['banner']?>" class="w-100" alt="Banner background Image">
                                        </figure>
                                        <div class="blog-card-header">
                                            <a type="text" class="text"><?=$blog['title']?></a>
                                            <?php
                                                if (Session::isAuthenticated()) {
                                                    $is_like = new BlogLike($blog['id']);
                                                    if ($is_like->is_liked() ? $is_like->is_liked()['owner'] : 0 == Session::getUser()->getUsername()) {
                                                        if ($is_like->is_liked()['status'] == 'liked') {
                                            ?>
                                            <!-- unlike button -->
                                            <button class="icon-button blog-like liked b-liked" id="like-<?=$blog['id']?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 48 48">
                                                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M44 19c0-6.075-4.925-11-11-11c-3.72 0-7.01 1.847-9 4.674A10.987 10.987 0 0 0 15 8C8.925 8 4 12.925 4 19c0 11 13 21 20 23.326c1.194-.397 2.562-1.016 4.01-1.826M34.959 27l6.878 8.5m.001-8.5l-6.879 8.5"/>
                                                </svg>
                                            </button>
                                            <button class="icon-button blog-like b-like d-none" id="like-<?=$blog['id']?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" display="block" id="Heart">
                                                    <path d="M7 3C4.239 3 2 5.216 2 7.95c0 2.207.875 7.445 9.488 12.74a.985.985 0 0 0 1.024 0C21.125 15.395 22 10.157 22 7.95 22 5.216 19.761 3 17 3s-5 3-5 3-2.239-3-5-3z" />
                                                </svg>
                                            </button>
                                            <?php } else { ?>
                                            <!-- like button -->
                                            <button class="icon-button blog-like b-like" id="like-<?=$blog['id']?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" display="block" id="Heart">
                                                    <path d="M7 3C4.239 3 2 5.216 2 7.95c0 2.207.875 7.445 9.488 12.74a.985.985 0 0 0 1.024 0C21.125 15.395 22 10.157 22 7.95 22 5.216 19.761 3 17 3s-5 3-5 3-2.239-3-5-3z" />
                                                </svg>
                                            </button>
                                            <button class="icon-button blog-like b-liked d-none" id="like-<?=$blog['id']?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 48 48">
                                                    <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M44 19c0-6.075-4.925-11-11-11c-3.72 0-7.01 1.847-9 4.674A10.987 10.987 0 0 0 15 8C8.925 8 4 12.925 4 19c0 11 13 21 20 23.326c1.194-.397 2.562-1.016 4.01-1.826M34.959 27l6.878 8.5m.001-8.5l-6.879 8.5"/>
                                                </svg>
                                            </button>
                                            <?php
                                                    }
                                                        } else { ?>
                                            <!-- like button -->
                                            <button class="icon-button blog-like" id="like-<?=$blog['id']?>">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" display="block" id="Heart">
                                                    <path d="M7 3C4.239 3 2 5.216 2 7.95c0 2.207.875 7.445 9.488 12.74a.985.985 0 0 0 1.024 0C21.125 15.395 22 10.157 22 7.95 22 5.216 19.761 3 17 3s-5 3-5 3-2.239-3-5-3z" />
                                                </svg>
                                            </button>
                                            <?php } } ?>
                                        </div>
                                        <div class="blog-card-footer">
                                            <div class="blog-card-meta blog-card-meta">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                                    <path fill="currentColor" d="m20.975 12.185l-.739-.128zm-.705 4.08l-.74-.128zM6.938 20.477l-.747.065zm-.812-9.393l.747-.064zm7.869-5.863l.74.122zm-.663 4.045l.74.121zm-6.634.411l-.49-.568zm1.439-1.24l.49.569zm2.381-3.653l-.726-.189zm.476-1.834l.726.188zm1.674-.886l-.23.714zm.145.047l.229-.714zM9.862 6.463l.662.353zm4.043-3.215l-.726.188zm-2.23-1.116l-.326-.675zM3.971 21.471l-.748.064zM3 10.234l.747-.064a.75.75 0 0 0-1.497.064zm17.236 1.823l-.705 4.08l1.478.256l.705-4.08zm-6.991 9.193H8.596v1.5h4.649zm-5.56-.837l-.812-9.393l-1.495.129l.813 9.393zm11.846-4.276c-.507 2.93-3.15 5.113-6.286 5.113v1.5c3.826 0 7.126-2.669 7.764-6.357zM13.255 5.1l-.663 4.045l1.48.242l.663-4.044zm-6.067 5.146l1.438-1.24l-.979-1.136L6.21 9.11zm4.056-5.274l.476-1.834l-1.452-.376l-.476 1.833zm1.194-2.194l.145.047l.459-1.428l-.145-.047zm-1.915 4.038a8.378 8.378 0 0 0 .721-1.844l-1.452-.377A6.878 6.878 0 0 1 9.2 6.11zm2.06-3.991a.885.885 0 0 1 .596.61l1.452-.376a2.385 2.385 0 0 0-1.589-1.662zm-.863.313a.515.515 0 0 1 .28-.33l-.651-1.351c-.532.256-.932.73-1.081 1.305zm.28-.33a.596.596 0 0 1 .438-.03l.459-1.428a2.096 2.096 0 0 0-1.548.107zm2.154 8.176h5.18v-1.5h-5.18zM4.719 21.406L3.747 10.17l-1.494.129l.971 11.236zm-.969.107V10.234h-1.5v11.279zm-.526.022a.263.263 0 0 1 .263-.285v1.5c.726 0 1.294-.622 1.232-1.344zM14.735 5.343a5.533 5.533 0 0 0-.104-2.284l-1.452.377a4.03 4.03 0 0 1 .076 1.664zM8.596 21.25a.916.916 0 0 1-.911-.837l-1.494.129a2.416 2.416 0 0 0 2.405 2.208zm.03-12.244c.68-.586 1.413-1.283 1.898-2.19L9.2 6.109c-.346.649-.897 1.196-1.553 1.76zm13.088 3.307a2.416 2.416 0 0 0-2.38-2.829v1.5c.567 0 1 .512.902 1.073zM3.487 21.25c.146 0 .263.118.263.263h-1.5c0 .682.553 1.237 1.237 1.237zm9.105-12.105a1.583 1.583 0 0 0 1.562 1.84v-1.5a.083.083 0 0 1-.082-.098zm-5.72 1.875a.918.918 0 0 1 .316-.774l-.98-1.137a2.418 2.418 0 0 0-.83 2.04z"/>
                                                </svg>
                                                <p class="m-0" id="b-like-count-<?=$blog['id']?>"><?=$blog['like_count']?></p>
                                            </div>
                                            <div class="blog-card-meta blog-card-meta">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" display="block" id="Calendar">
                                                    <rect x="2" y="4" width="20" height="18" rx="4" />
                                                    <path d="M8 2v4" />
                                                    <path d="M16 2v4" />
                                                    <path d="M2 10h20" />
                                                </svg>
                                                <?=$uploaded_time_str?>
                                            </div>
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div id="blog-<?=$blog['id']?>" class="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-live="assertive" aria-hidden="true">
                                <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                                    <div class="modal-content">
                                        <div class="container-fluid">
                                            <div class="row">
                                                <div class="col col-lg-12 p-0">
                                                    <div class="position-relative">
                                                        <button type="button" class="close text profile-icon position-absolute mt-2 ms-2" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                                                    <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"></path>
                                                                </svg>
                                                            </span>
                                                        </button>
                                                        <!-- Start dropdown menu -->
                                                        <button type="button" class="button dd text profile-icon position-absolute custom-right mt-2 me-2" id="blog-<?=$blog['id']?>">
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-three-dots" viewBox="0 0 16 16">
                                                                <path d="M3 9.5a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3m5 0a1.5 1.5 0 1 1 0-3 1.5 1.5 0 0 1 0 3"/>
                                                            </svg>
                                                        </button>
                                                        <div class="dropdown mt-3 me-3" id="blog-<?=$blog['id']?>">
                                                            <a class="dropdown-item" type="button">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 48 48" class="pe-2 pb-1">
                                                                    <path fill="currentColor" d="M31.605 6.838a1.25 1.25 0 0 0-2.105.912v5.472c-.358.008-.775.03-1.24.072c-1.535.142-3.616.526-5.776 1.505c-4.402 1.995-8.926 6.374-9.976 15.56a1.25 1.25 0 0 0 2.073 1.075c4.335-3.854 8.397-5.513 11.336-6.219a17.713 17.713 0 0 1 3.486-.497l.097-.003v5.535a1.25 1.25 0 0 0 2.105.912l12-11.25a1.25 1.25 0 0 0 0-1.824zm-.999 8.904l.02.002h.002h-.001A1.25 1.25 0 0 0 32 14.5v-3.865L40.922 19L32 27.365V23.5c0-.63-.454-1.16-1.095-1.24h-.003l-.004-.001l-.01-.001l-.028-.003a8.425 8.425 0 0 0-.41-.03a13.505 13.505 0 0 0-1.134-.006c-.966.034-2.33.17-3.983.566c-2.68.643-6.099 1.971-9.778 4.653c1.486-6.08 4.863-8.958 7.96-10.362c1.841-.834 3.635-1.168 4.975-1.292c.668-.062 1.216-.07 1.591-.064a9.837 9.837 0 0 1 .525.022M12.25 8A6.25 6.25 0 0 0 6 14.25v21.5A6.25 6.25 0 0 0 12.25 42h21.5A6.25 6.25 0 0 0 40 35.75V33.5a1.25 1.25 0 0 0-2.5 0v2.25a3.75 3.75 0 0 1-3.75 3.75h-21.5a3.75 3.75 0 0 1-3.75-3.75v-21.5a3.75 3.75 0 0 1 3.75-3.75h8.25a1.25 1.25 0 1 0 0-2.5z"/>
                                                                </svg>Share this post
                                                            </a>
                                                            <hr class="m-1">
                                                            <?php
                                                                if (Session::isOwnerOf($blog['author'])) {
                                                            ?>
                                                            <div data-id="<?=$blog['id']?>">
                                                                <a class="dropdown-item text-danger" id="blog-dell">
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
                                                    <img src="<?=$blog['banner']?>" class="custom-wh" alt="Banner background Image">
                                                </div>
                                                <div class="col col-lg-12 p-3">     
                                                    <div class="font-weight-bold w-100 d-flex align-items-center justify-content-between blog-card-list" data-id="<?=$blog['id']?>">
                                                        <a class="text-decoration-none d-flex align-items-center text-capitalize text user-name">
                                                            <p class="text m-0"><?=$blog['title']?></p>
                                                        </a>
                                                        <ul class="list-inline d-flex flex-row align-items-center m-0">
                                                            <li class="list-inline-item d-flex align-items-end">
                                                                <?php
                                                                    if (Session::isAuthenticated()) {
                                                                        $is_like = new BlogLike($blog['id']);
                                                                        if ($is_like->is_liked() ? $is_like->is_liked()['owner'] : 0 == Session::getUser()->getUsername()) {
                                                                            if ($is_like->is_liked()['status'] == 'liked') {
                                                                ?>
                                                                <!-- unlike button -->
                                                                <button class="icon-button blog-like liked b-liked" id="like-<?=$blog['id']?>">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 48 48">
                                                                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M44 19c0-6.075-4.925-11-11-11c-3.72 0-7.01 1.847-9 4.674A10.987 10.987 0 0 0 15 8C8.925 8 4 12.925 4 19c0 11 13 21 20 23.326c1.194-.397 2.562-1.016 4.01-1.826M34.959 27l6.878 8.5m.001-8.5l-6.879 8.5"/>
                                                                    </svg>
                                                                </button>
                                                                <button class="icon-button blog-like b-like d-none" id="like-<?=$blog['id']?>">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" display="block" id="Heart">
                                                                        <path d="M7 3C4.239 3 2 5.216 2 7.95c0 2.207.875 7.445 9.488 12.74a.985.985 0 0 0 1.024 0C21.125 15.395 22 10.157 22 7.95 22 5.216 19.761 3 17 3s-5 3-5 3-2.239-3-5-3z" />
                                                                    </svg>
                                                                </button>
                                                                <?php } else { ?>
                                                                <!-- like button -->
                                                                <button class="icon-button blog-like b-like" id="like-<?=$blog['id']?>">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" display="block" id="Heart">
                                                                        <path d="M7 3C4.239 3 2 5.216 2 7.95c0 2.207.875 7.445 9.488 12.74a.985.985 0 0 0 1.024 0C21.125 15.395 22 10.157 22 7.95 22 5.216 19.761 3 17 3s-5 3-5 3-2.239-3-5-3z" />
                                                                    </svg>
                                                                </button>
                                                                <button class="icon-button blog-like b-liked d-none" id="like-<?=$blog['id']?>">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 48 48">
                                                                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M44 19c0-6.075-4.925-11-11-11c-3.72 0-7.01 1.847-9 4.674A10.987 10.987 0 0 0 15 8C8.925 8 4 12.925 4 19c0 11 13 21 20 23.326c1.194-.397 2.562-1.016 4.01-1.826M34.959 27l6.878 8.5m.001-8.5l-6.879 8.5"/>
                                                                    </svg>
                                                                </button>
                                                                <?php
                                                                        }
                                                                            } else { ?>
                                                                <!-- like button -->
                                                                <button class="icon-button blog-like b-like" id="like-<?=$blog['id']?>">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" display="block" id="Heart">
                                                                        <path d="M7 3C4.239 3 2 5.216 2 7.95c0 2.207.875 7.445 9.488 12.74a.985.985 0 0 0 1.024 0C21.125 15.395 22 10.157 22 7.95 22 5.216 19.761 3 17 3s-5 3-5 3-2.239-3-5-3z" />
                                                                    </svg>
                                                                </button>
                                                                <button class="icon-button blog-like b-liked d-none" id="like-<?=$blog['id']?>">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 48 48">
                                                                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="M44 19c0-6.075-4.925-11-11-11c-3.72 0-7.01 1.847-9 4.674A10.987 10.987 0 0 0 15 8C8.925 8 4 12.925 4 19c0 11 13 21 20 23.326c1.194-.397 2.562-1.016 4.01-1.826M34.959 27l6.878 8.5m.001-8.5l-6.879 8.5"/>
                                                                    </svg>
                                                                </button>
                                                                <?php } } ?>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <p class="time-date m-0"><?=$uploaded_time_str?></p>
                                                    <p class="text m-0 mt-2"><?=$blog['content']?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal Ends -->
                            <?php
                                    }
                                } else {
                            ?>
                                <h5 class="text-muted text-center mt-4">No Blog's Posted Yet.</h5>
                            <?php
                                }
                            ?>
                        </div>
                    </div>
                </div>