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


	<script src="https://cdn.jsdelivr.net/npm/masonry-layout@4.2.2/dist/masonry.pkgd.min.js" integrity="sha384-GNFwBvfVxBkLMJpYMOABq3c+d3KnQxudP/mGPkzpZSTYykLBNsZEnG2D9G/X/+7D" crossorigin="anonymous" async></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
	<script src="<?=get_config('base_path')?>assets/dist/js/bootstrap.bundle.min.js"></script>
	<script src="<?=get_config('base_path')?>assets/dist/js/jquery-3.6.3.min.js"></script>

	<script src="/js/app.min.js"></script>
	
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

				// set a cookie 
				setCookie('fingerprint', visitorId, 1);
			})
	</script>

</html>