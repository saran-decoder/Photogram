<div class="col-md-12" id="genClass">
	<?php
        if (isset($_POST['gen'])) {
            $gender = $_POST['gender'];
            Profile::gender($gender);
        }
    ?>
    <form class="row" method="post" action="">
        <div class="form-row flex-center">
			<input type="radio" name="gender" id="Male" value="Male" class="form-inputs" required>
			<label for="Male" class="form-label m-0">Male</label>
		</div>
		<div class="form-row flex-center ms-1">
			<input type="radio" name="gender" id="Female" value="Female" class="form-inputs" required>
			<label for="Female" class="form-label m-0">Female</label>
		</div>
        <div class="d-flex justify-content-end position-absolute" style="right: 0; top: 18%;">
            <button class="btn text bg-success" type="submit" name="gen">Save</button>
        </div>
	</form>
</div>