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
							<h4 class="modal-title text"></h4>
						</div>
						<div class="modal-body text">
						</div>
						<div class="modal-footer">
						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- Post modal -->
		<div id="uploadimageModal" class="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-live="assertive" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title text">Image Crop & Post</h5>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-9 w-100">
								<style>textarea#post_message::placeholder{ color: var(--timer-color); }</style>
								<textarea class="form-control input-sm px-2" type="textarea" name="post_text" id="post_message" placeholder="What's on Your Mind?" maxlength="200" rows="6"></textarea>
								<span class="help-block d-flex justify-content-end">
									<p id="characterLeft" class="help-block" style="margin-top: -2rem; margin-right: 1rem; color: var(--text-color);">You have reached the limit</p>
								</span>
							</div>
							<div class="col">
								<div id="image_demo"></div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<a type="button" class="close btn btn-outline-secondary text" data-dismiss="modal" aria-label="Close">Close</a>
						<button class="btn btn-outline-success text" id="share-memory">Crop & Post</button>
					</div>
				</div>
			</div>
		</div>

		<!-- Blog modal -->
		<div id="uploadblog" class="modal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog" aria-live="assertive" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title text">Image Crop & Blog Post</h5>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col">
								<div class="bv" id="preview_blogs"></div>
							</div>
							<div class="col-9 w-100">
								<input class="form-control input-sm px-2 mb-3" id="blog-title" type="text" placeholder="Title" required>
								<style>textarea#post_message::placeholder{ color: var(--timer-color); }</style>
								<textarea class="form-control input-sm px-2" type="textarea" name="blog_text" id="blog-text" placeholder="Blog Content?" rows="6" required></textarea>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<a type="button" class="close btn btn-outline-secondary text" data-dismiss="modal" aria-label="Close">Close</a>
						<button class="btn btn-outline-success text" id="share-blog">Crop & blog Post</button>
					</div>
				</div>
			</div>
		</div>

	</body>


	<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.2/FileSaver.min.js"></script>
	<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
	<script src="<?=get_config('base_path')?>assets/dist/js/bootstrap.bundle.min.js"></script>
	<script src="<?=get_config('base_path')?>assets/dist/js/jquery-3.6.3.min.js"></script>

	<script src="/js/app.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>

	<!-- Flatpickr Date -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/flatpickr/4.2.3/flatpickr.js"></script>
	<script>
		$(".flatpickr").flatpickr({
			dateFormat: "Y-m-d"
    	});
	</script>

	<!-- This is Discuss ai reply text speak js -->
	<!-- <script src="https://code.responsivevoice.org/responsivevoice.js?key=bG4BIcnA"></script> -->

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


	<!-- fancybox -->
  	<script src='https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.1.20/jquery.fancybox.min.js'></script>
  	<!-- Fancybox js -->
  	<script>
		// fancybox insilaze & options //
		$("[data-fancybox]").fancybox({
			loop: true,
			hash: true,
			transitionEffect: "slide",
			clickContent: function(current, event) {
				return current.type === "image" ? "next" : false;
			}
		});
  	</script>
	
</html>