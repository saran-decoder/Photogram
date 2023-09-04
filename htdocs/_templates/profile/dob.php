<div class="col-md-12" id="dobClass">
    <?php
        if (isset($_POST['day'])) {
            $dob = $_POST['dob'];
            Profile::dob($dob);
        }
    ?>
    <form class="row" method="post" action="">
        <div class="form-dob">
            <input type="date" class="dob" name="dob" style="border: none;" placeholder="mm-dd-yyyy" required>
        </div>
        <div class="d-flex justify-content-end position-absolute" style="right: 0; top: 18%;">
            <button class="btn text bg-success" type="submit" name="day">Save</button>
        </div>
	</form>
</div>