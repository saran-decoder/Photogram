<?php
    // TODO: Fix this user account list bug
    $Useraccount = User::getUserAccount();
    foreach ($Useraccount as $u) {
?>
    <div class="content-sidebar z-1 position-fixed d-none">
        <div class="content-sidebar-title p-2 py-3">
            <button type="button" class="conversation-back text d-inline m-0 me-2 w-auto">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
                </svg>
            </button>
            <?php
                $group_info = Group::getAllGroupinfo();
                while ($group_info) {
                    $G = Group::getAllGroupinfo('owner');
            ?>
            <img class="content-message-image" src="<?=$G['g_avatar']?>" alt="">
            <div class="d-flex flex-column">
                <span class="g_name"><?=$G['g_title']?></span>
            <?php break; }?>
            <?php
                $count = User::getAccountCount();
                foreach ($count as $c) {
            ?>
                <span class="content-message-text"><?=$c['owner']?> Members</span>
            <?php } ?>
            </div>
        </div>
        <div class="content-messages">
            <ul class="content-messages-list">
                <li>
                    <a href="../profile/<?=$u['owner']?>">
                        <img class="content-message-image" src="<?=$u['avatar']?>" alt="">
                        <span class="content-message-info">
                            <span class="content-message-name"><?=$u['owner']?></span>
                            <span class="content-message-text"><?=$u['bio']?></span>
                        </span>
                        <span class="content-message-more">
                            <span class="content-message-unread">owner</span>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
<?php } ?>