<main class="d-flex flex-nowrap vh-100">
    
    <?php Session::loadTemplate('_header'); ?>

    <style>
        .setting-form-control::placeholder {
            color: var(--timer-color);
        }
        @media (min-width: 992px) {
            .bg-body-tertiary {
                width: 332px !important;
            }
        }
    </style>

    <div class="d-flex flex-column-reverse justify-content-end overflow-auto main-display w-100">

        <div class="container overflow-auto">
            <!-- Row STARTED -->
            <div class="row">

                <!-- Main content START -->
                <div class="col p-0">
                    <!-- Setting Tab content START -->
                    <div class="tab-content">

                        <!-- Account setting tab START -->
                        <?php Session::loadTemplate('settings/account'); ?>
                        <!-- Account setting tab END -->

                        <!-- Password tab START -->
                        <?php Session::loadTemplate('settings/pass'); ?>
                        <!-- Password tab END -->

                    </div>
                    <!-- Setting Tab content END -->
                </div>

                
            </div>
            <!-- Row END -->
        </div>
        
        <!-- Sidenav START -->
        <div class="col-lg-3 side-setting">

            <div class="mx-0">
                <!-- Card START -->
                <div class="setting w-100">
                    <!-- Card body START -->
                    <div class="setting-body p-3 overflow-auto">
                        <!-- Side Nav START -->
                        <ul class="nav-icon list-unstyled d-flex m-0 border-0" role="tablist">
                            <li class="nav-item mb-0 me-4">
                                <a class="nav-link text d-flex align-items-center justify-content-center p-2 mb-0 active" data-bs-toggle="pill" href="#nav-account-tab" role="tab" aria-controls="account" aria-selected="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 16 16">
                                        <path fill="currentColor" d="M16 7.992C16 3.58 12.416 0 8 0S0 3.58 0 7.992c0 2.43 1.104 4.62 2.832 6.09c.016.016.032.016.032.032c.144.112.288.224.448.336c.08.048.144.111.224.175A7.98 7.98 0 0 0 8.016 16a7.98 7.98 0 0 0 4.48-1.375c.08-.048.144-.111.224-.16c.144-.111.304-.223.448-.335c.016-.016.032-.016.032-.032c1.696-1.487 2.8-3.676 2.8-6.106m-8 7.001c-1.504 0-2.88-.48-4.016-1.279c.016-.128.048-.255.08-.383a4.17 4.17 0 0 1 .416-.991c.176-.304.384-.576.64-.816c.24-.24.528-.463.816-.639c.304-.176.624-.304.976-.4A4.15 4.15 0 0 1 8 10.342a4.185 4.185 0 0 1 2.928 1.166c.368.368.656.8.864 1.295c.112.288.192.592.24.911A7.03 7.03 0 0 1 8 14.993m-2.448-7.4a2.49 2.49 0 0 1-.208-1.024c0-.351.064-.703.208-1.023c.144-.32.336-.607.576-.847c.24-.24.528-.431.848-.575c.32-.144.672-.208 1.024-.208c.368 0 .704.064 1.024.208c.32.144.608.336.848.575c.24.24.432.528.576.847c.144.32.208.672.208 1.023c0 .368-.064.704-.208 1.023a2.84 2.84 0 0 1-.576.848a2.84 2.84 0 0 1-.848.575a2.715 2.715 0 0 1-2.064 0a2.84 2.84 0 0 1-.848-.575a2.526 2.526 0 0 1-.56-.848zm7.424 5.306c0-.032-.016-.048-.016-.08a5.22 5.22 0 0 0-.688-1.406a4.883 4.883 0 0 0-1.088-1.135a5.207 5.207 0 0 0-1.04-.608a2.82 2.82 0 0 0 .464-.383a4.2 4.2 0 0 0 .624-.784a3.624 3.624 0 0 0 .528-1.934a3.71 3.71 0 0 0-.288-1.47a3.799 3.799 0 0 0-.816-1.199a3.845 3.845 0 0 0-1.2-.8a3.72 3.72 0 0 0-1.472-.287a3.72 3.72 0 0 0-1.472.288a3.631 3.631 0 0 0-1.2.815a3.84 3.84 0 0 0-.8 1.199a3.71 3.71 0 0 0-.288 1.47c0 .352.048.688.144 1.007c.096.336.224.64.4.927c.16.288.384.544.624.784c.144.144.304.271.48.383a5.12 5.12 0 0 0-1.04.624c-.416.32-.784.703-1.088 1.119a4.999 4.999 0 0 0-.688 1.406c-.016.032-.016.064-.016.08C1.776 11.636.992 9.91.992 7.992C.992 4.14 4.144.991 8 .991s7.008 3.149 7.008 7.001a6.96 6.96 0 0 1-2.032 4.907"/>
                                    </svg>
                                    <span class="d-none ms-3">Account</span>
                                </a>
                            </li>
                            <li class="nav-item mb-0 me-4">
                                <a class="nav-link text d-flex align-items-center justify-content-center p-2 mb-0" data-bs-toggle="pill" href="#nav-pass-tab" role="tab" aria-controls="password" aria-selected="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                                        <path fill="currentColor" d="M2 17h20v2H2zm1.15-4.05L4 11.47l.85 1.48l1.3-.75l-.85-1.48H7v-1.5H5.3l.85-1.47L4.85 7L4 8.47L3.15 7l-1.3.75l.85 1.47H1v1.5h1.7l-.85 1.48zm6.7-.75l1.3.75l.85-1.48l.85 1.48l1.3-.75l-.85-1.48H15v-1.5h-1.7l.85-1.47l-1.3-.75L12 8.47L11.15 7l-1.3.75l.85 1.47H9v1.5h1.7zM23 9.22h-1.7l.85-1.47l-1.3-.75L20 8.47L19.15 7l-1.3.75l.85 1.47H17v1.5h1.7l-.85 1.48l1.3.75l.85-1.48l.85 1.48l1.3-.75l-.85-1.48H23z"/>
                                    </svg>
                                    <span class="d-none ms-3">Change Password</span>
                                </a>
                            </li>
                            <li class="nav-item mb-0 me-4 cursor-pointer">
                                <a class="nav-link text-danger d-flex align-items-center justify-content-center p-2 mb-0" id="deactive">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 48 48">
                                        <path fill="currentColor" d="M20 10.5v.5h8v-.5a4 4 0 0 0-8 0m-2.5.5v-.5a6.5 6.5 0 1 1 13 0v.5h11.25a1.25 1.25 0 1 1 0 2.5h-2.917l-2 23.856A7.25 7.25 0 0 1 29.608 44H18.392a7.25 7.25 0 0 1-7.224-6.644l-2-23.856H6.25a1.25 1.25 0 1 1 0-2.5zm-3.841 26.147a4.75 4.75 0 0 0 4.733 4.353h11.216a4.75 4.75 0 0 0 4.734-4.353L36.324 13.5H11.676zM21.5 20.25a1.25 1.25 0 1 0-2.5 0v14.5a1.25 1.25 0 1 0 2.5 0zM27.75 19c.69 0 1.25.56 1.25 1.25v14.5a1.25 1.25 0 1 1-2.5 0v-14.5c0-.69.56-1.25 1.25-1.25"/>
                                    </svg>
                                    <span class="d-none ms-3">Close account</span>
                                </a>
                            </li>
                            <li class="nav-item mb-0 me-4">
                                <a class="nav-link text-danger d-flex align-items-center justify-content-center p-2 mb-0" href="<?=get_config('base_path');?>?logout">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 512 512">
                                        <path fill="currentColor" d="M217 28.098v455.804l142-42.597V70.697zm159.938 26.88l.062 2.327V87h16V55zM119 55v117.27h18V73h62V55zm258 50v16h16v-16zm0 34v236h16V139zm-240 58.727V233H41v46h96v35.273L195.273 256zM244 232c6.627 0 12 10.745 12 24s-5.373 24-12 24s-12-10.745-12-24s5.373-24 12-24M137 339.73h-18V448h18zM377 393v14h16v-14zm0 32v23h16v-23zM32 471v18h167v-18zm290.652 0l-60 18H480v-18z"/>
                                    </svg>
                                    <span class="d-none ms-3">Logout</span>
                                </a>
                            </li>
                        </ul>
                        <!-- Side Nav END -->
                    </div>
                    <!-- Card body END -->
                </div>
                <!-- Card END -->
            </div>
        </div>
        <!-- Sidenav END -->

    </div>

</main>