<main class="d-flex flex-nowrap vh-100">

    <?php
        Session::loadTemplate('_header');
        $porfile = Profile::getProfile();
    ?>

    <style>
        textarea.form-control::placeholder {
            color: var(--timer-color);
        }
    </style>

    <div class="post-box overflow-auto">

        <!-- Start: AI Discussion -->
        <div class="conversation d-flex flex-column justify-content-center h-100">

            <!-- Start: Chat Header -->
            <div class="chat-header py-2 w-webkit">
                <!-- Content -->
                <div class="col-8 col-xl-12">
                    <div class="d-flex align-items-center">
                        <!-- Title -->
                        <!-- Close: btn -->
                        <a class="ps-2 pb-1 icon-lg text" href="/" data-toggle-chat="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
                        </a>
                        <!-- Close: btn -->
                        <div class="col-xl-6">
                            <div class="d-flex align-items-center">
                                <div class="col-auto px-3">
                                    <div class="avatar d-xl-inline-block">
                                        <img class="avatar-img" src="../assets/images/default/AI.jpg" alt="">
                                    </div>
                                </div>

                                <div class="col overflow-hidden">
                                    <span class="text-truncate mb-0">Discussion AI</span>
                                    <p class="text-truncate mb-0">Welcome <?=$porfile['owner']?></p>
                                </div>
                            </div>
                        </div>
                        <!-- Title -->
                    </div>
                </div>
                <!-- Content -->
            </div>
            <!-- End: CHat Header -->

            <!-- Start: Chat Body position-fixed -->
            <div class="chat-body overflow-scroll h-100 px-3">
                <div class="chat-body-inner">
                    <div class="my-3" id="chat-body-inner">
                        <h5 class="text-muted text-center mt-4" id="NDC">No Discussion's</h5>
                        <!-- Adding Message -->
                    </div>
                </div>
            </div>
            <!-- End: Chat Body -->

            <!-- Start: Chat Footer -->
            <div class="chat-footer pb-2">
                <div class="chat-form rounded-pill bg-dark" id="chat-form">
                    <div class="row align-items-center gx-0">
                        <div class="col-auto">
                            <a href="#" class="btn btn-icon btn-link text-body rounded-circle">
                                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 20 20">
                                    <path fill="currentColor" d="M10 5.5a4.5 4.5 0 1 1-9 0a4.5 4.5 0 0 1 9 0m-4-2a.5.5 0 0 0-1 0V5H3.5a.5.5 0 0 0 0 1H5v1.5a.5.5 0 0 0 1 0V6h1.5a.5.5 0 0 0 0-1H6zm8 .5h-3.207a5.466 5.466 0 0 0-.393-1H14a3 3 0 0 1 3 3v8a3 3 0 0 1-3 3H6a3 3 0 0 1-3-3v-3.6c.317.162.651.294 1 .393V14c0 .373.102.722.28 1.02l4.669-4.588a1.5 1.5 0 0 1 2.102 0l4.67 4.588A1.99 1.99 0 0 0 16 14V6a2 2 0 0 0-2-2m0 3.5a1.5 1.5 0 1 1-3 0a1.5 1.5 0 0 1 3 0m-1 0a.5.5 0 1 0-1 0a.5.5 0 0 0 1 0m-8.012 8.226A1.99 1.99 0 0 0 6 16h8c.37 0 .715-.1 1.012-.274l-4.662-4.58a.5.5 0 0 0-.7 0z"/>
                                </svg>
                            </a>
                        </div>
                        <div class="col">
                            <div class="input-group">
                                <textarea class="form-control px-0" autocomplete="off" placeholder="Type You're Message" id="chat-input" rows="1" style="resize: none;" data-autosize="true" spellcheck="false"></textarea>
                            </div>
                        </div>
                        <div class="col-auto">
                            <button class="btn btn-icon btn-primary rounded-circle ms-3" id="send-chat">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End: Chat Footer -->

        </div>
        <!-- End: AI Discussion -->

    </div>

    <?php Session::loadTemplate('index/search'); ?>

</main>