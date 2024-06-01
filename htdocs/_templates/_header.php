<?php
    use Carbon\Carbon;
    $loggedInProfile = Profile::getProfile();
    while ($loggedInProfile) {
        $profile = Profile::getProfile('owner');
        $uploaded_time = Carbon::parse($profile['uploaded_time']);
        $uploaded_time_str = $uploaded_time->Format('j M Y \a\t g:i A');
?>
        <!-- Left Side Navbar Started -->
        <div class="flex-column p-0 bg-body-tertiary left">
            <a href="<?=get_config('base_path');?>profile<?=get_config('base_path');?><?=$profile['owner']?>" class="user-pro d-none align-items-center p-2 rounded-3 link-body-emphasis text-decoration-none">
                <img class="rounded-circle mx-2" src="<?=$profile['avatar']?>" width="40" alt="">
                <div class="d-flex flex-column user-pro-name">
                    <span class="fs-6"><?=$profile['owner']?></span>
                    <span><small class="time-date"><?=$uploaded_time_str?></small></span>
                </div>
            </a>
            <b class="my-3 d-none side-head">Menu</b>
            <div class="menu-bar rounded-3 mb-auto">
                <ul class="p-0 m-0">
                    <li class="nav-link mt-2 mx-2">
                        <a href="/">
                            <svg class="icons" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M5 22h14a2 2 0 0 0 2-2v-9a1 1 0 0 0-.29-.71l-8-8a1 1 0 0 0-1.41 0l-8 8A1 1 0 0 0 3 11v9a2 2 0 0 0 2 2m5-2v-5h4v5zm-5-8.59l7-7l7 7V20h-3v-5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v5H5z"/>
                            </svg>
                            <span class="text nav-text">Home</span>
                        </a>
                    </li>
                    <li class="nav-link mt-2 mx-2 nav-search">
                        <a type="button">
                            <svg class="icons" xmlns="http://www.w3.org/2000/svg" width="23" height="23" viewBox="0 0 24 24">
                                <g fill="none" stroke="currentColor" stroke-width="2">
                                    <circle cx="11" cy="11" r="7"/>
                                    <path stroke-linecap="round" d="M11 8a3 3 0 0 0-3 3m12 9l-3-3"/>
                                </g>
                            </svg>
                            <span class="text nav-text">Search</span>
                        </a>
                    </li>
                    <li class="nav-link mt-2 mx-2">
                        <a href="<?=get_config('base_path');?>discussion">
                            <svg class="icons" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M5 18v3.766l1.515-.909L11.277 18H16c1.103 0 2-.897 2-2V8c0-1.103-.897-2-2-2H4c-1.103 0-2 .897-2 2v8c0 1.103.897 2 2 2zM4 8h12v8h-5.277L7 18.234V16H4z"/>
                                <path fill="currentColor" d="M20 2H8c-1.103 0-2 .897-2 2h12c1.103 0 2 .897 2 2v8c1.103 0 2-.897 2-2V4c0-1.103-.897-2-2-2"/>
                            </svg>
                            <span class="text nav-text">Discussion</span>
                        </a>
                    </li>
                    <li class="nav-link mt-2 mx-2">
                        <a href="<?=get_config('base_path');?>Notification">
                            <svg class="icons" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                                <path fill="currentColor" d="M10 21h4c0 1.1-.9 2-2 2s-2-.9-2-2m11-2v1H3v-1l2-2v-6c0-3.1 2-5.8 5-6.7V4c0-1.1.9-2 2-2s2 .9 2 2v.3c3 .9 5 3.6 5 6.7v6zm-4-8c0-2.8-2.2-5-5-5s-5 2.2-5 5v7h10z"/>
                            </svg>
                            <span class="text nav-text">Notifications</span>
                        </a>
                    </li>
                    <li class="nav-link mt-2 mx-2 d-block nav-smr">
                        <a type="button">
                            <label class="upload-area">
                                <input type="file" accept="image/*" name="post_image" class="file" id="post_image" multiple required hidden>
                                <span class="upload-button">
                                    <svg class="icons" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 48 48">
                                        <g fill="none">
                                            <path fill="currentColor" d="M44 24a2 2 0 1 0-4 0zM24 8a2 2 0 1 0 0-4zm15 32H9v4h30zM8 39V9H4v30zm32-15v15h4V24zM9 8h15V4H9zm0 32a1 1 0 0 1-1-1H4a5 5 0 0 0 5 5zm30 4a5 5 0 0 0 5-5h-4a1 1 0 0 1-1 1zM8 9a1 1 0 0 1 1-1V4a5 5 0 0 0-5 5z"/>
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="4" d="m6 35l10.693-9.802a2 2 0 0 1 2.653-.044L32 36m-4-5l4.773-4.773a2 2 0 0 1 2.615-.186L42 31m-5-13V6m-5 5l5-5l5 5"/>
                                        </g>
                                    </svg>
                                </span>
                            </label>
                            <span class="text nav-text">Uploads</span>
                        </a>
                    </li>
                    <li class="nav-link m-2 d-none nav-setting">
                        <a href="<?=get_config('base_path');?>settings">
                            <svg class="icons" xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24">
                                <g fill="none" stroke="currentColor" stroke-width="2">
                                    <path d="M3.082 13.945c-.529-.95-.793-1.426-.793-1.945c0-.519.264-.994.793-1.944L4.43 7.63l1.426-2.381c.559-.933.838-1.4 1.287-1.66c.45-.259.993-.267 2.08-.285L12 3.26l2.775.044c1.088.018 1.631.026 2.08.286c.45.26.73.726 1.288 1.659L19.57 7.63l1.35 2.426c.528.95.792 1.425.792 1.944c0 .519-.264.994-.793 1.944L19.57 16.37l-1.426 2.381c-.559.933-.838 1.4-1.287 1.66c-.45.259-.993.267-2.08.285L12 20.74l-2.775-.044c-1.088-.018-1.631-.026-2.08-.286c-.45-.26-.73-.726-1.288-1.659L4.43 16.37z"/>
                                    <circle cx="12" cy="12" r="3"/>
                                </g>
                            </svg>
                            <span class="text nav-text">Settings</span>
                        </a>
                    </li>
                    <li class="nav-link m-2 d-block nav-smr">
                        <a href="<?=get_config('base_path');?>profile<?=get_config('base_path');?><?=$profile['owner']?>" class="justify-content-center">
                            <img class="rounded-circle" src="<?=$profile['avatar']?>" width="25" alt="">
                            <span class="text nav-text"><?=$profile['owner']?></span>
                        </a>
                    </li>
                </ul>
            </div>

            <b class="my-4 mb-4 d-none side-head">Avatar</b>
            <div class="nav-avatar d-none align-items-end justify-content-center rounded-5 position-relative overflow-visible hcf-masonry-card">
                <img src="/assets/images/Footer/avatar.png" width="250" class="card-img img-fluid" alt="Photogram">
                <div class="text nav-link d-none align-items-center avatar-title">
                    <a href="/" class="d-flex align-items-center justify-content-center text-decoration-none">
                        <span class="fs-4 hidden-text text card-img img-fluid">𝓹𝓱𝓸𝓽𝓸𝓰𝓻𝓪𝓶</span>
                    </a>
                </div>
            </div>
        </div>
        <!-- Left Side Navbar Ended -->
<?php break; } ?>