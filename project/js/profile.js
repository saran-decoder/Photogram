$(document).ready(function() {

    $("#Profile-Form1").submit(function() {

        var username, email, number;

        username = $('#profile-name').val();
        email = $('#profile-email').val();
        number = $('#profile-phone').val();

        // Validate user
        if (username === "") {
            displayError("Username should not be empty!", '#profile-name');
            return false;
        }

        // Validate email
        if (email === "") {
            displayError("Email address should not be empty!", '#profile-email');
            return false;
        }
        if (!isValidEmail(email)) {
            displayError('Please enter a valid email address!', '#profile-email');
            return false;
        }

        // Validate phone
        if (number === "") {
            displayError("Phone number should not be empty!", '#profile-phone');
            return false;
        }
    });

    $("#Profile-Form2").submit(function() {

        var currentPass, newPass;

        currentPass = $('#current-password').val();
        newPass = $('#new-password').val();
        confirmPass = $('#confirm-password').val();

        // Validate current
        if (currentPass === "") {
            displayError("Current password should not be empty!", '#current-password');
            return false;
        }

        // Validate new
        if (newPass === "") {
            displayError("New password should not be empty!", '#new-password');
            return false;
        }

        // Confirm password
        if (confirmPass === "") {
            displayError("Confirm password should not be empty!", '#confirm-password');
            return false;
        } else {
            if (newPass !== confirmPass) {
                displayError("Password and confirmation do not match.", '#confirm-password');
                return false;
            }
        }
    });

    function isValidEmail(email) {
        // Use a regular expression for basic email validation
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return emailRegex.test(email);
    }

    function displayError(errorMessage, elementId) {
        new Toast('Form Validation', 'now', errorMessage + ' *', 'text-danger').show();
        $(elementId).focus();
        console.log(errorMessage);
    }

});

// This is password hide and show jquery
$(document).ready(function() {
    $("#currentPassword").click(function() {
        var passwordField = $("#current-password");
        var passwordFieldType = passwordField.attr('type');
  
        if (passwordFieldType === 'password') {
            passwordField.attr('type', 'text');
            $(this).html('<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 16 16"><path fill="currentColor" d="M2.984 8.625v.003a.5.5 0 0 1-.612.355c-.431-.114-.355-.611-.355-.611l.018-.062s.026-.084.047-.145a6.7 6.7 0 0 1 1.117-1.982C4.096 5.089 5.605 4 8 4s3.904 1.089 4.802 2.183a6.7 6.7 0 0 1 1.117 1.982a4.077 4.077 0 0 1 .06.187l.003.013v.004l.001.002a.5.5 0 0 1-.966.258l-.001-.004l-.008-.025a4.872 4.872 0 0 0-.2-.52a5.696 5.696 0 0 0-.78-1.263C11.286 5.912 10.044 5 8 5c-2.044 0-3.285.912-4.028 1.817a5.7 5.7 0 0 0-.945 1.674a3.018 3.018 0 0 0-.035.109zM8 7a2.5 2.5 0 1 0 0 5a2.5 2.5 0 0 0 0-5M6.5 9.5a1.5 1.5 0 1 1 3 0a1.5 1.5 0 0 1-3 0"/></svg>');
        } else {
            passwordField.attr('type', 'password');
            $(this).html('<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 16 16"><path fill="currentColor" d="M1.48 1.48a.5.5 0 0 0-.049.65l.049.057l2.69 2.69A6.657 6.657 0 0 0 1.533 8.71a.5.5 0 0 0 .97.242a5.66 5.66 0 0 1 2.386-3.356l1.207 1.207a2.667 2.667 0 0 0 3.771 3.771l3.946 3.946a.5.5 0 0 0 .756-.65l-.049-.057l-4.075-4.076v-.001l-.8-.799l-1.913-1.913h.001l-1.92-1.919v-.001l-.755-.754l-2.871-2.87a.5.5 0 0 0-.707 0m5.323 6.03l2.356 2.357A1.667 1.667 0 0 1 6.802 7.51M8 3.667c-.667 0-1.314.098-1.926.283l.825.824a5.669 5.669 0 0 1 6.6 4.181a.5.5 0 0 0 .97-.242A6.669 6.669 0 0 0 8 3.667m.13 2.34l2.534 2.533A2.668 2.668 0 0 0 8.13 6.006"/></svg>');
        }
    });
    $("#newPassword").click(function() {
        var passwordField = $("#new-password");
        var passwordFieldType = passwordField.attr('type');
  
        if (passwordFieldType === 'password') {
            passwordField.attr('type', 'text');
            $(this).html('<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 16 16"><path fill="currentColor" d="M2.984 8.625v.003a.5.5 0 0 1-.612.355c-.431-.114-.355-.611-.355-.611l.018-.062s.026-.084.047-.145a6.7 6.7 0 0 1 1.117-1.982C4.096 5.089 5.605 4 8 4s3.904 1.089 4.802 2.183a6.7 6.7 0 0 1 1.117 1.982a4.077 4.077 0 0 1 .06.187l.003.013v.004l.001.002a.5.5 0 0 1-.966.258l-.001-.004l-.008-.025a4.872 4.872 0 0 0-.2-.52a5.696 5.696 0 0 0-.78-1.263C11.286 5.912 10.044 5 8 5c-2.044 0-3.285.912-4.028 1.817a5.7 5.7 0 0 0-.945 1.674a3.018 3.018 0 0 0-.035.109zM8 7a2.5 2.5 0 1 0 0 5a2.5 2.5 0 0 0 0-5M6.5 9.5a1.5 1.5 0 1 1 3 0a1.5 1.5 0 0 1-3 0"/></svg>');
        } else {
            passwordField.attr('type', 'password');
            $(this).html('<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 16 16"><path fill="currentColor" d="M1.48 1.48a.5.5 0 0 0-.049.65l.049.057l2.69 2.69A6.657 6.657 0 0 0 1.533 8.71a.5.5 0 0 0 .97.242a5.66 5.66 0 0 1 2.386-3.356l1.207 1.207a2.667 2.667 0 0 0 3.771 3.771l3.946 3.946a.5.5 0 0 0 .756-.65l-.049-.057l-4.075-4.076v-.001l-.8-.799l-1.913-1.913h.001l-1.92-1.919v-.001l-.755-.754l-2.871-2.87a.5.5 0 0 0-.707 0m5.323 6.03l2.356 2.357A1.667 1.667 0 0 1 6.802 7.51M8 3.667c-.667 0-1.314.098-1.926.283l.825.824a5.669 5.669 0 0 1 6.6 4.181a.5.5 0 0 0 .97-.242A6.669 6.669 0 0 0 8 3.667m.13 2.34l2.534 2.533A2.668 2.668 0 0 0 8.13 6.006"/></svg>');
        }
    });
    $("#confirmPassword").click(function() {
        var passwordField = $("#confirm-password");
        var passwordFieldType = passwordField.attr('type');
  
        if (passwordFieldType === 'password') {
            passwordField.attr('type', 'text');
            $(this).html('<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 16 16"><path fill="currentColor" d="M2.984 8.625v.003a.5.5 0 0 1-.612.355c-.431-.114-.355-.611-.355-.611l.018-.062s.026-.084.047-.145a6.7 6.7 0 0 1 1.117-1.982C4.096 5.089 5.605 4 8 4s3.904 1.089 4.802 2.183a6.7 6.7 0 0 1 1.117 1.982a4.077 4.077 0 0 1 .06.187l.003.013v.004l.001.002a.5.5 0 0 1-.966.258l-.001-.004l-.008-.025a4.872 4.872 0 0 0-.2-.52a5.696 5.696 0 0 0-.78-1.263C11.286 5.912 10.044 5 8 5c-2.044 0-3.285.912-4.028 1.817a5.7 5.7 0 0 0-.945 1.674a3.018 3.018 0 0 0-.035.109zM8 7a2.5 2.5 0 1 0 0 5a2.5 2.5 0 0 0 0-5M6.5 9.5a1.5 1.5 0 1 1 3 0a1.5 1.5 0 0 1-3 0"/></svg>');
        } else {
            passwordField.attr('type', 'password');
            $(this).html('<svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 16 16"><path fill="currentColor" d="M1.48 1.48a.5.5 0 0 0-.049.65l.049.057l2.69 2.69A6.657 6.657 0 0 0 1.533 8.71a.5.5 0 0 0 .97.242a5.66 5.66 0 0 1 2.386-3.356l1.207 1.207a2.667 2.667 0 0 0 3.771 3.771l3.946 3.946a.5.5 0 0 0 .756-.65l-.049-.057l-4.075-4.076v-.001l-.8-.799l-1.913-1.913h.001l-1.92-1.919v-.001l-.755-.754l-2.871-2.87a.5.5 0 0 0-.707 0m5.323 6.03l2.356 2.357A1.667 1.667 0 0 1 6.802 7.51M8 3.667c-.667 0-1.314.098-1.926.283l.825.824a5.669 5.669 0 0 1 6.6 4.181a.5.5 0 0 0 .97-.242A6.669 6.669 0 0 0 8 3.667m.13 2.34l2.534 2.533A2.668 2.668 0 0 0 8.13 6.006"/></svg>');
        }
    });
});  


// This is user all session delete jquery api calling
$(document).on('click', '.tab-pane #das', function(){
    id = $(this).closest('.device').data('id');
    d = new Dialog("Clear All Session", "Are you sure want to clear this sessions");
    d.setButtons([
        {
            'name': "Clear All",
            "class": "btn-danger",
            "onClick": function(event){
                console.log(`Assume this session ${id} is not delete`);
                
                $.post('/api/profile/das',
                {
                    id: id
                }, function(data, textSuccess, xhr){
                    console.log('HTTP Status:', xhr.status);
                    console.log('Response:', data);

                    if(textSuccess == "success"){ //means 200
                        console.log('All most working cool.');
                        window.location.reload();
                    }
                });

                $(event.data.modal).modal('hide')
            }
        },
        {
            'name': "Cancel",
            "class": "btn-secondary",
            "onClick": function(event){
                $(event.data.modal).modal('hide');
            }
        }
    ]);
    d.show();
});



// This is Testing
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


// This is the user post image show js
$(document).on('click', '.hcf-masonry-card.rounded', function() {
    // Extract the post ID from the clicked element's id attribute
    var postId = $(this).attr("id").split('-')[1];
    
    // Show the modal corresponding to the post ID
    $('#post-' + postId + '.modal').modal('show');
});
$(document).on('click', '.modal-content .close', function() {
    // Find the closest modal to the clicked close button
    var modal = $(this).closest('.modal');

    // Hide the modal
    $(modal).modal('hide');
});

// This is the user blog image show js
$(document).on('click', '.blog-card-image.viewer', function() {
    // Extract the post ID from the clicked element's data-id attribute
    var blogId = $(this).closest(".blog-card-list").data("id");
    if (blogId) {
        // Show the modal corresponding to the post ID
        $('#blog-' + blogId + '.modal').modal('show');
    } else {
        console.error("Clicked element does not have a data-id attribute.");
    }
});


// This is the Text length calculat Javascript
$(document).ready(function () {
    var maxLength = 300; // Change this to your desired character limit

    $('#profile-bio').on('input', function () {
        var value = $(this).val();
        var length = value.length;
        var lengthRemaining = maxLength - length;

        if (lengthRemaining < 0) {
            $(this).val(value.substring(0, maxLength)); // truncate the input
            $('#profile-bio-len').html("<small class='text-danger'>You've reached the limit</small>");
            $('#profile-bio-len').addClass('red');
        } else {
            $('#profile-bio-len').text(lengthRemaining);
            $('#profile-bio-len').removeClass('red');
        }
    });
});


// This is the post upload button spinner
$(document).ready(function() {
    $('#share-blog').click(function() {
        $(this).html('<div class="spinner-grow text-primary"></div>');
        setTimeout(() => {
            console.log('This Working!');
        }, 5000);
    });
});


// This is the blogs like jquery
$(document).on("click", "button.blog-like", function () {
    var blog_id = $(this).closest(".blog-card-list").data("id");
    // Check if blog_id is retrieved correctly
    var like_id = "#like-" + blog_id;
    var like_count = '#b-like-count-' + blog_id;

    if ($(like_id).hasClass("b-liked")) {
        $('.b-liked'+like_id).removeClass('d-none');
        $('.b-like'+like_id).addClass('d-none');
    } else {
        $('.b-liked'+like_id).addClass('d-none');
        $('.b-like'+like_id).removeClass('d-none');
    }

    if ($(like_id).hasClass("liked")) {
        $(like_id).removeClass("liked");
        // $(like_id).removeClass("text-danger");
        $('.b-liked'+like_id).addClass('d-none');
        $('.b-like'+like_id).removeClass('d-none');
        like = $(like_count).html();
        like = parseInt(like) - 1;
        $(like_count).text(like);
        $.post("/api/posts/b_unlike", { id: blog_id }, function (data) {
            console.log(data);
        });
    } else {
        $(like_id).addClass("liked");
        // $(like_id).addClass("text-danger");
        $('.b-liked'+like_id).removeClass('d-none');
        $('.b-like'+like_id).addClass('d-none');
        like = $(like_count).html();
        like = parseInt(like) + 1;
        $(like_count).text(like);
        $.post("/api/posts/b_like", { id: blog_id }, function (data) {
            console.log(data);
        });
    }
});