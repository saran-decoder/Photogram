<div class="col-md-12" id="numClass">
    <?php
        if (isset($_POST['num'])) {
            $phone = $_POST['phone'];
            Profile::phone($phone);
        }
    ?>
    <form class="row" method="post" action="">
        <div class="input-group">
            <span class="input-group-text text">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-phone" viewBox="0 0 16 16">
                    <path d="M11 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h6zM5 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H5z"/>
                    <path d="M8 14a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                </svg>
            </span>
            <input type="phone" name="phone" class="form-control" placeholder="Enter Your Phone Number" required>
            <button class="btn text bg-success m-2" type="submit" name="num">Save</button>
        </div>
    </form>
</div>