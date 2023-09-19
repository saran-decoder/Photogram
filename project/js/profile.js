// This is edit profile image preview jquery
$(document).ready(function() {
    let profileinput = $('.file-input'),
        selectinput = $('.profile_input'),
        curElement = $('.view_image'); // Cache the image element
    
    /** CLICK LISTENER */
    selectinput.click(function() {
        console.log('Update image clicked!');
        profileinput.click();
        console.log('Opening Your File & Processing!');
    });

    $(profileinput).change(function(){
        console.log('File image select & Opened!');
        var reader = new FileReader();

        reader.onload = function (e) {
            // Check if the event has a target result
            if (e.target.result) {
                // Create a Blob URL from the loaded data and set it as the image source
                curElement.attr('src', URL.createObjectURL(new Blob([e.target.result])));
            }
        };

        // read the image file as a data URL
        reader.readAsArrayBuffer(this.files[0]);
    });
});


// This is edit profile user info update menu 'active' class add & remove jquery
$(document).ready(function() {

    // Define an array of section IDs for easier management
    var sections = ['bio', 'user', 'email', 'num', 'gen', 'dob', 'link', 'pass'];

    // Click event handler for the icons
    $.each(sections, function(index, section) {
        $('#' + section + 'RightIcon').click(function() {
            $('#' + section + 'DownIcon, #' + section + 'Class').addClass('active');
            $.each(sections, function(i, otherSection) {
                if (otherSection !== section) {
                    $('#' + section + 'RightIcon, #' + otherSection + 'DownIcon, #' + otherSection + 'Class').removeClass('active');
                    $('#' + otherSection + 'RightIcon').addClass('active');
                }
            });
            console.log('Yeah this righticon working cool...');
        });

        $('#' + section + 'DownIcon').click(function() {
            $('#' + section + 'RightIcon').addClass('active');
            $('#' + section + 'DownIcon, #' + section + 'Class').removeClass('active');
            console.log('Yeah this downicon working cool...');
        });
    });

});



let pressTimer;
$(".longPress").mouseup(function () {
  clearTimeout(pressTimer);
  return false;
}).mousedown(function () {
  pressTimer = window.setTimeout(function () {
    window.location.href = "#";
  }, 1000);
  return false;
});




$(document).ready(function() {
    let clickCount = 0;

    $('.longPress').click(function() {
        clickCount++;

        if (clickCount === 2) {
            // Double-click do any event
            alert('Hai Baby!');
        }
    });
});