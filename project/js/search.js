// This is searching user profile side arr 'active' & 'off' class add & remove jquery
$(document).ready(function() {
    // Click event handler for the icons
    $('.arr_container').click(function() {
        var uid = $(this).attr('id');
        $(this).addClass('active_arr');
        $('#' + uid + "-down").addClass('active');
        $('#' + uid + "-down").removeClass('off');
    });

    $('.cancel').click(function() {
        var uid = $(this).attr('id');
        $('.arr_container').removeClass('active_arr');
        $('#' + uid + "-down").addClass('off');
        $('#' + uid + "-down").removeClass('active');
    });
});


// This is The Searching Jquery
$("#search").on("keyup", filter);
function filter() {
    var term = $("#search").val().toLowerCase();
    $(".list-item").each(function() {
        var listItem = $(this);
        if (listItem.html().toLowerCase().indexOf(term) !== -1) {
            listItem.css("display", "block");
        } else {
            listItem.css("display", "none");
        }
    });
}