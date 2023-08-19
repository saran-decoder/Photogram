<!doctype html>
<html lang="en">

	<?php Session::loadTemplate('_head'); ?>

	<body>
	
		<?php
			if (Session::$isError) {
				Session::loadTemplate('_error');
			} else {
				Session::loadTemplate(Session::currentScript());
			}
		?>

		<!-- This is plays cloneing this temp dialogs -->
		<div id="modalsGarbage">
			<div class="modal fade animate__animated" id="dummy-dialog-modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-live="assertive" aria-hidden="true" style="padding-right: 0px;">
				<div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
					<div class="modal-content blur">
						<div class="modal-header">
							<h4 class="modal-title"></h4>
						</div>
						<div class="modal-body">
						</div>
						<div class="modal-footer">
						</div>
					</div>
				</div>
			</div>
		</div>

	</body>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
	<script src="<?=get_config('base_path')?>assets/dist/js/bootstrap.bundle.min.js"></script>
	<script src="<?=get_config('base_path')?>assets/dist/js/jquery-3.6.3.min.js"></script>

	<!-- <script src="/js/ad.js"></script> -->
	<script src="/js/toast.js"></script>
	<script src="/js/dialog.js"></script>

	<script src="./js/index.js"></script>
	<script src="./js/script.js"></script>
	<script>
		// Initialize the agent at application startup.
		const fpPromise = import('https://openfpcdn.io/fingerprintjs/v3')
			.then(FingerprintJS => FingerprintJS.load())

		// Get the visitor identifier when you need it.
		fpPromise
			.then(fp => fp.get())
			.then(result => {
				// This is the visitor identifier:
				const visitorId = result.visitorId
				// console.log(visitorId)
				// $('#fingerprint').val(visitorId);
				// set a cookie 
				setCookie('fingerprint', visitorId, 1);
			})
	</script>

</html>