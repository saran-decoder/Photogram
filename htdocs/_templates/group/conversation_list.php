<?php
    $group_info = Group::getAllGroupinfo();
    while ($group_info) {
        $G = Group::getAllGroupinfo('owner');
?>
<div class="content-sidebar z-1 position-fixed d-block">
    <div class="content-sidebar-title">Discuss</div>
        <div class="content-messages">
            <ul class="content-messages-list">
                <li>
                    <a href="#" data-conversation="#conversation-1">
                        <img class="content-message-image" src="../assets/images/default/AI.jpg" alt="">
                        <span class="content-message-info">
                            <span class="content-message-name">Discussion AI</span>
                        </span>
                    </a>
                </li>
                <li class="content-message-title mx-3"><span>Recently</span></li>
                <li>
                    <a href="discussion/<?=$G['id']?>">
                        <img class="content-message-image" src="<?=$G['g_avatar']?>" alt="">
                        <span class="content-message-info">
                            <span class="content-message-name"><?=$G['g_title']?></span>
                            <span class="content-message-text">Group Incomming Last Message</span>
                        </span>
                        <span class="content-message-more">
                            <span class="content-message-unread">9+</span>
                        </span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<?php break; } ?>