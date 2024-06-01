        <!-- Center Post Scroller Started -->
        <div class="post-box overflow-scroll">
            <div class="p-2 px-3 pb-0 d-flex align-items-center justify-content-between m-head" role="tablist">
                <div>
                    <button class="btn text-white border-0 py-0 ps-0 active" data-bs-toggle="pill" href="#offcanvas-posts-tab" role="tab" aria-controls="offcanvas-posts-tab" aria-selected="true">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                                <g fill="none" stroke="currentColor" stroke-width="1.5">
                                    <path d="M5 11.5c0-1.886 0-2.828.586-3.414C6.172 7.5 7.114 7.5 9 7.5h6c1.886 0 2.828 0 3.414.586C19 8.672 19 9.614 19 11.5v1c0 1.886 0 2.828-.586 3.414c-.586.586-1.528.586-3.414.586H9c-1.886 0-2.828 0-3.414-.586C5 15.328 5 14.386 5 12.5z"/>
                                    <path stroke-linecap="round" d="M19 2v.5A2.5 2.5 0 0 1 16.5 5h-9A2.5 2.5 0 0 1 5 2.5V2m14 20v-.5a2.5 2.5 0 0 0-2.5-2.5h-9A2.5 2.5 0 0 0 5 21.5v.5" opacity=".5"/>
                                </g>
                            </svg>
                        </div>
                    </button>
                    <button class="btn text-white border-0 py-0" data-bs-toggle="pill" href="#offcanvas-blogs-tab" role="tab" aria-controls="offcanvas-blogs-tab" aria-selected="false">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 32 32">
                                <path fill="currentColor" d="M14.52 4.01a.507.507 0 0 0-.52.51V6.5c0 .28.22.5.5.5v.02c6.23.24 11.24 5.25 11.48 11.48H26c0 .28.22.5.5.5h1.98c.29 0 .52-.24.51-.52c-.27-7.86-6.61-14.2-14.47-14.47m0 5a.514.514 0 0 0-.52.51v1.98c0 .28.22.5.5.5v.03c3.47.23 6.24 3 6.47 6.47H21c0 .28.22.5.5.5h1.98c.28 0 .52-.24.51-.52c-.27-5.1-4.37-9.2-9.47-9.47M5.5 10c-.28 0-.5.22-.5.5v11c0 3.58 2.92 6.5 6.5 6.5s6.5-2.92 6.5-6.5s-2.92-6.5-6.5-6.5c-.28 0-.5.22-.5.5v3c0 .28.22.5.5.5a2.5 2.5 0 0 1 0 5A2.5 2.5 0 0 1 9 21.5v-11c0-.28-.22-.5-.5-.5z"/>
                            </svg>
                        </div>
                    </button>
                </div>
                <?php $profile = Profile::getProfile(); ?>
                <div>
                    <a type="button" class="user-pro-mob d-block">
                        <img class="rounded-circle" src="<?=$profile['avatar'];?>" width="25" alt="User Profile">
                    </a>
                </div>
                <div class="upload-btn-2 d-none">
                    <label class="upload-area">
                        <input type="file" accept="image/*" name="post_image" class="custom-file-input file pe-2" id="post_image" multiple required hidden>
                        <span class="upload-button d-flex">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="22" fill="currentColor" class="bi bi-plus-lg" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M8 2a.5.5 0 0 1 .5.5v5h5a.5.5 0 0 1 0 1h-5v5a.5.5 0 0 1-1 0v-5h-5a.5.5 0 0 1 0-1h5v-5A.5.5 0 0 1 8 2"/>
                            </svg>
                        </span>
                    </label>
                </div>
            </div>

            <div role="tablist">

            <?php
                Session::loadTemplate('index/posts');
                Session::loadTemplate("index/blogs");
            ?>

            </div>
        </div>
        <!-- Center Post Scroller Ended -->