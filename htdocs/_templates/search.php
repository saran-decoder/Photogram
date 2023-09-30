<?php Session::loadTemplate('_header'); ?>

<div class="container list p-0"> 
	<div class="search-layout h-100 w-100 position-absolute">
		<div class="rows justify-content-center">
			<div class="col col-10 p-0 w-100">
                <div class="overflow-hidden">
                    <div class="px-2 py-4">

                        <form autocomplete="off" id="form" class="d-flex align-items-center w-100">
                            <a href="/" class="text me-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="33" height="33" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
                                </svg>
                            </a>
                            <div class="text w-100">
                                <!-- <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                </svg> -->
                                <input id="search" type="search" name="search" class="search-input w-100" placeholder="Search..." required>
                            </div>
                        </form>

                        <div id="display"></div>

                        <!-- < ?php
                            if(isset($_GET['q']))
                            {
                                $conn = Database::getConnection();
                                $q = $_GET['q'];
                                $q = mysqli_real_escape_string($conn, $q);
                                // $q = htmlentities($q);
                                $sql = "SELECT * FROM `users` WHERE `owner` = '$q' OR `owner` like '%$q' OR `owner` like '$q%' OR `owner` like '%$q%'";
                                $res = mysqli_query($conn, $sql);
                                if(mysqli_num_rows($res) > 0)
                                {
                                    while($row = mysqli_fetch_assoc($res))
                                    {
                        ?> -->
                        <!-- <div class="list-group mt-4 position-absolute" id="output">
                            <div class="d-flex flex-row align-items-center">
                                <a href="profile/< ?=$row['owner']?>">
                                    <div class="rounded-circle overflow-hidden d-flex justify-content-center align-items-center post-profile-photo mr-3" style="width: 3rem;">
                                        <img src="< ?=$row['avatar']?>" alt="..." class="w-100">
                                    </div>
                                    <strong class="font-weight-bold mx-2 w-100 d-flex flex-column">
                                        <a class="text-decoration-none text-capitalize text">< ?=$row['owner']?></a>
                                        <small class="text-muted text" style="font-size: x-small;">< ?=$row['bio']?></small>
                                    </strong>
                                    <!- <div id="search-results"></div> ->
                                </a>
                            </div>
                        </div> -->

                        <!-- < ?php 
                                }
                            } else {
                                echo 'No users found.';
                            }
                        }
                        ?> -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script>
$(document).ready(function(){
$("#search").keyup(function()
{
var searchbox = $(this).val();
var dataString = 'q='+ searchbox;
if(searchbox=='')
{}
else
{
$.ajax({
type: "POST",
url: "search.php",
data: dataString,
cache: false,
success: function(html)
{
$("#display").html(html).show();
}
});
}return false;
});
});
</script>



<?php
    $conn = Database::getConnection();
    if(isset($_POST['q']))
    {
        // $q = mysqli_real_escape_string($_POST['q']);
        //Old query
        $sql = "SELECT * FROM `users` WHERE `owner` = '$q' OR `owner` like '%$q' OR `owner` like '$q%' OR `owner` like '%$q%'";
        $sql_rees = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_array($sql_res))
        {
            // $fname=$row['fname'];
            // $lname=$row['lname'];
            // $img=$row['img'];
            // $country=$row['country'];
            // $re_fname='<b>'.$q.'</b>';
            // $re_lname='<b>'.$q.'</b>';
            // $final_fname = str_ireplace($q, $re_fname, $fname);
            // $final_lname = str_ireplace($q, $re_lname, $lname);
?>
<div class="display_box" align="left">
    <img src="user_img/<?php echo $avatar; ?>" />
    <?php echo $owner; ?>&nbsp;
    <?php echo $bio; ?>
</div>
<?php
        }
    }
?>