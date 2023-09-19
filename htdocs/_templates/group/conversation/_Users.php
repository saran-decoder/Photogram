<?php
	$group_data = Group::getAllGroupinfo();
    while ($group_data) {
        $data = Group::getAllGroupinfo('owner');
?>
<div class="conversation" id="conversation-2">
	<div class="conversation-top">
		<button type="button" class="conversation-back text">
			<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-chevron-left" viewBox="0 0 16 16">
				<path fill-rule="evenodd" d="M11.354 1.646a.5.5 0 0 1 0 .708L5.707 8l5.647 5.646a.5.5 0 0 1-.708.708l-6-6a.5.5 0 0 1 0-.708l6-6a.5.5 0 0 1 .708 0z"/>
			</svg>
		</button>
		<div class="conversation-user">
			<img class="conversation-user-image" src="<?=$data['g_avatar']?>" alt="">
			<div>
				<div class="conversation-user-name"><?=$data['g_title']?></div>
				<?php
					$count = User::getAccountCount();
                	foreach ($count as $c) {
            	?>
				<div class="conversation-user-status online"><?=$c['owner']?> Members</div>
				<?php } ?>
			</div>
		</div>
		<div class="conversation-buttons">
			<div class="conversation-item-dropdown">
				<button type="button" class="conversation-item-dropdown-toggle text">
					<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-three-dots-vertical" viewBox="0 0 16 16">
						<path d="M9.5 13a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0zm0-5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"></path>
					</svg>
				</button>
				<ul class="conversation-item-dropdown-list">
					<li><a href="#" class="text">Edit Group</a></li>
					<li><a href="#" class="text">Edit Group</a></li>
				</ul>
			</div>
		</div>
	</div>
	<div class="conversation-main d-flex flex-column-reverse">
		<ul class="conversation-wrapper">
			<div class="coversation-divider"><span>Today</span></div>
			<li class="conversation-item me">
				<div class="conversation-item-side">
					<a href="#" class="position-fixed conversation-image z-1">
						<img class="conversation-item-image" src="../assets/images/default/AI.jpg" alt="...">
					</a>
					<div class="remove-msg text-danger">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
							<path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
						</svg>
					</div>
				</div>
				<div class="conversation-item-content">
					<div class="conversation-item-wrapper">
						<div class="conversation-item-box">
							<div class="conversation-item-text">
								<a href="#" class="text conversation-user">Username</a>
								<p class="m-0">Hi i am test this message receiver ui</p>
								<div class="conversation-item-time ms-4">12:30</div>
							</div>
						</div>
					</div>
				</div>
			</li>
			<li class="conversation-item">
				<div class="conversation-item-side">
					<img class="conversation-item-image" src="../assets/images/default/profile-1.jpg" alt="">
				</div>
				<div class="conversation-item-content">
					<div class="conversation-item-wrapper">
						<div class="conversation-item-box">
							<div class="conversation-item-text">
								<p class="m-0 me-2">Hi Bro i am test this message sender ui</p>
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
	<?php
		if (isset($_POST['g_msg'])) {
			$message = $_POST['g_message'];
			Group::sendMessage($message);
		}
	?>
	<form class="row" method="post" action="">
		<div class="conversation-form-more">
			<div class="conversation-form-group-more">
				<div class="more-conversation">
					<a class="more-conversation-icon mb-2">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 16 16">
							<path d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2Zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672Z"/>
							<path d="M13.5 9a.5.5 0 0 1 .5.5V11h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V12h-1.5a.5.5 0 0 1 0-1H13V9.5a.5.5 0 0 1 .5-.5Z"/>
						</svg>
					</a>
					Gallery
				</div>
				<div class="more-conversation">
					<a class="more-conversation-icon mb-2">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 16 16">
							<path d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2Zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672Z"/>
							<path d="M13.5 9a.5.5 0 0 1 .5.5V11h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V12h-1.5a.5.5 0 0 1 0-1H13V9.5a.5.5 0 0 1 .5-.5Z"/>
						</svg>
					</a>
					Document
				</div>
				<div class="more-conversation">
					<a class="more-conversation-icon mb-2">
						<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 16 16">
							<path d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2Zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672Z"/>
							<path d="M13.5 9a.5.5 0 0 1 .5.5V11h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V12h-1.5a.5.5 0 0 1 0-1H13V9.5a.5.5 0 0 1 .5-.5Z"/>
						</svg>
					</a>
					Document
				</div>
			</div>
		</div>
		<div class="conversation-form">
			<div class="conversation-form-group">
				<button type="button" class="conversation-form-button text more-dropdown">
					<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-folder-plus" viewBox="0 0 16 16">
						<path d="m.5 3 .04.87a1.99 1.99 0 0 0-.342 1.311l.637 7A2 2 0 0 0 2.826 14H9v-1H2.826a1 1 0 0 1-.995-.91l-.637-7A1 1 0 0 1 2.19 4h11.62a1 1 0 0 1 .996 1.09L14.54 8h1.005l.256-2.819A2 2 0 0 0 13.81 3H9.828a2 2 0 0 1-1.414-.586l-.828-.828A2 2 0 0 0 6.172 1H2.5a2 2 0 0 0-2 2Zm5.672-1a1 1 0 0 1 .707.293L7.586 3H2.19c-.24 0-.47.042-.683.12L1.5 2.98a1 1 0 0 1 1-.98h3.672Z"/>
						<path d="M13.5 9a.5.5 0 0 1 .5.5V11h1.5a.5.5 0 1 1 0 1H14v1.5a.5.5 0 1 1-1 0V12h-1.5a.5.5 0 0 1 0-1H13V9.5a.5.5 0 0 1 .5-.5Z"/>
					</svg>
				</button>
				<textarea class="conversation-form-input" rows="1" placeholder="Message" name="g_message"></textarea>
			</div>
			<button type="submit" name="g_msg" class="conversation-form-button conversation-form-submit text">
				<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-send-fill" viewBox="0 0 16 16">
					<path d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z"/>
				</svg>
			</button>
		</div>
	</form>
</div>
<?php break; } ?>