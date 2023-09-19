<div class="conversation" id="conversation-1">
    <div class="conversation-top">
        <button type="button" class="conversation-back text">
            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
            </svg>
        </button>
        <div class="conversation-user">
            <img class="conversation-user-image" src="../assets/images/default/AI.jpg" alt="">
            <div>
                <div class="conversation-user-name">Discussion AI</div>
                <div class="conversation-user-status text-capitalize">Welcome <?=Session::getUser()->getUsername()?></div>
            </div>
        </div>
    </div>
    <div class="conversation-main d-flex flex-column-reverse">
        <ul class="conversation-wrapper">
            <!-- <div class="coversation-divider"><span>Today</span></div> -->
            <li class="conversation-item me">
                <div class="conversation-item-side">
                    <img class="conversation-item-image" src="../assets/images/default/AI.jpg" alt="...">
                </div>
                <div class="conversation-item-content">
                    <div class="conversation-item-wrapper">
                        <div class="conversation-item-box">
                            <div class="conversation-item-text">
                                <p class="m-0">Hi i am test this message receiver reply ai</p>
                                <div class="conversation-item-time ms-4">12:30</div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
            <li class="conversation-item">
                <?php
                    $profile = Profile::getProfile();
                    while ($profile) {
                        $p = Profile::getProfile('owner');
                ?>
                <div class="conversation-item-side">
                    <a href="profile<?=get_config('base_path');?><?=$p['owner']?>">
                        <img class="conversation-item-image" src="<?=$p['avatar']?>" alt="">
                    </a>
                </div>
                <?php break; } ?>
                <div class="conversation-item-content">
                    <div class="conversation-item-wrapper">
                        <div class="conversation-item-box">
                            <div class="conversation-item-text">
                                <p class="m-0 me-2">You're Message</p>
                                <div class="d-flex justify-content-end">
                                    <div class="conversation-item-time">12:30</div>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-all ms-1" viewBox="0 0 16 16">
                                        <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
                                        <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
    <div class="conversation-form">
        <div class="conversation-form-group">
            <textarea class="conversation-form-input ps-3" rows="1" placeholder="Ask You're Any Querys..."></textarea>
        </div>
        <button type="button" class="conversation-form-button conversation-form-submit text">
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
                <path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
            </svg>
        </button>
    </div>
</div>