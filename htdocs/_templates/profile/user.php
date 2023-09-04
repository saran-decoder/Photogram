<div class="col-md-12" id="userClass">
    <?php
        if (isset($_POST['user'])) {
            $username = $_POST['username'];
            Profile::username($username);
        }
    ?>
    <form class="row" method="post" action="">
        <div class="input-group">
            <span class="input-group-text text">@</span>
            <input type="text" name="username" class="form-control" placeholder="Enter Your Username" required>
            <button class="btn text bg-success m-2" type="submit" name="user">Save</button>
        </div>
    </form>
</div>