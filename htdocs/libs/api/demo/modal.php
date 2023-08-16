<?php

// https://domain/api/posts/delete
${basename(__FILE__, '.php')} = function () {
    $id = "modal_".md5((string)microtime());
    ?>

<!-- Button trigger modal -->
<br>
<button type="button" class="btn btn-primary" data-bs-toggle="modal"
	data-bs-target="#<?=$id?>">
	Launch API demo modal #<?=$id?>
</button>

<!-- Modal -->
<div class="modal fade" id="<?=$id?>" tabindex="-1"
	aria-labelledby="<?=$id?>Label" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="<?=$id?>Label">Modal
					title</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				This is loaded from API, time is
				<?=date('r')?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
				<button type="button" class="btn btn-primary">Save changes</button>
			</div>
		</div>
	</div>
</div>
<?php
};
?>