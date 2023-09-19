<?php
    if (isset($_POST['g_title'])) {
        $title = $_POST['title'];
        Group::GroupTitle($title);
    }

    $group_info = Group::getAllGroupinfo();
    while ($group_info) {
        $t = Group::getAllGroupinfo('owner');
?>
<div class="content-sidebar z-1 position-fixed d-none">
    <div class="content-sidebar-title p-2 d-block">
        <form class="row" method="post" action="">
            <div class="d-flex align-items-end flex-column py-5">
                <input type="text" class="form-control" name="title" placeholder="Enter Your Group Name" value="<?=$t['g_title']?>" required>
                <button class="btn text bg-success mt-2 px-3 py-1" type="submit" name="g_title">Save</button>
            </div>
        </form>
    </div>
</div>
<?php break; } ?>