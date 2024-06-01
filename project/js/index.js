/** Variables */
let files = [],
dragArea = document.querySelector('.drag-area'),
input = document.querySelector('.drag-area input'),
select = document.querySelector('.drag-area .input_btn'),
icon = document.querySelector('.upload_ico'),
class_add = document.querySelector('.sys_upload'),
command_display = document.querySelector('.form-group'),
class_ctrl = document.querySelector('.sys_controler'),
container = document.querySelector('.containers'),
imageCount = document.querySelector('.image-count'),
text_msg = document.querySelector('.form-group.col-md-12'),
submit_btn = document.querySelector('.submit');

/** CLICK LISTENER */
// select.addEventListener('click', () => input.click());
if (select && input) {
    select.addEventListener('click', () => {
      console.log('Select clicked!');
      input.click();
    });
}

/* INPUT CHANGE EVENT */
if (input && files) {
    input.addEventListener('change', () => {
        let file = input.files;

        // if user select no image
        if (file.length == 0) return;

        for(let i = 0; i < file.length; i++) {
            console.log(file.length[i]);
            if (file[i].type.split("/")[0] != 'image') continue;
            if (!files.some(e => e.name == file[i].name)) files.push(file[i])
        }
        showImages();
    });
}

/** SHOW IMAGES */
function showImages() {
    container.innerHTML = files.reduce((prev, curr) => { // index
        return `${prev}
        <div class="image form__image-container js-remove-image">
            <img class="form__image" src="${URL.createObjectURL(curr)}" auto="format" fit="crop" draggable="false"/>
            <p>${files.length}</p>
        </div>`
    }, '');
    dragArea.classList.remove('center');
    class_add.classList.remove('sys_upload');
    class_ctrl.classList.remove('sys_controler');
    class_add.classList.add('dd_upload');
    submit_btn.classList.add('d-flex');
    text_msg.classList.add('d-block');

    command_display.classList.remove('d-none');
}

/* DRAG & DROP */
if (dragArea) {
    dragArea.addEventListener('dragover', e => {
        e.preventDefault()
        icon.classList.add('dragover')
    })
}

/* DRAG LEAVE */
if (dragArea) {
    dragArea.addEventListener('dragleave', e => {
        e.preventDefault()
        icon.classList.remove('dragover')
    });
}

/* DROP EVENT */
if (dragArea && files) {
    dragArea.addEventListener('drop', e => {
        e.preventDefault()
        icon.classList.remove('dragover');
        input.classList.add('invalid-input');

        let file = e.dataTransfer.files;
        for (let i = 0; i < file.length; i++) {
            /** Check selected file is image */
            if (file[i].type.split("/")[0] != 'image') continue;

            if (!files.some(e => e.name == file[i].name)) files.push(file[i])
        }
        showImages();
    });
}


// This is the Text length calculat Javascript
$(document).ready(function(){ 
    $('#characterLeft').text('200');
    $('#message').keydown(function () {
        var max = 200;
        var len = $(this).val().length;
        // console.log(len);
        if (len >= max) {
            $('#characterLeft').html("<b class='text-danger'>You're have reached the limit</b>");
            $('#characterLeft').addClass('red');
        } else {
            var ch = max - len;
            $('#characterLeft').text(ch);
            $('#characterLeft').removeClass('red');            
        }
    });    
});


// This is the post upload button spinner
$(document).ready(function() {
    $('#share-memory').click(function() {
        $(this).html('<div class="spinner-grow text-primary"></div>');
        setTimeout(() => {
            console.log('This Working!');
        }, 5000);
    });
});


// This is the post dropdown menu toggleclass jquery
$(document).ready(function() {
    $('.btn-group').click(function() {
      $('.dropdown-menu-left').toggleClass('show');
    });
});


// This is user post delete jquery api calling
$(document).on('click', '.container #dell', function(){
    post_id = $(this).parent().attr('data-id');
    d = new Dialog("Delete Post", "Are you sure want to delete this post");
    d.setButtons([
        {
            'name': "Delete",
            "class": "btn-danger",
            "onClick": function(event){
                console.log(`Assume this post ${post_id} is deleted`);
                
                $.post('/api/posts/delete',
                {
                    id: post_id
                }, function(data, textSuccess, xhr){
                    console.log(textSuccess);
                    console.log(data);

                    if(textSuccess =="success" ){ //means 200
                        $(`#post-${post_id}.modal`).modal('hide');
                        $(`#post-${post_id}`).remove();
                    }
                });

                $(event.data.modal).modal('hide');
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


// This is user blog delete jquery api calling
$(document).on('click', '.modal #blog-dell', function(){
    blog_id = $(this).parent().attr('data-id');
    d = new Dialog("Delete Blog", "Are you sure want to delete this blog");
    d.setButtons([
        {
            'name': "Delete",
            "class": "btn-danger",
            "onClick": function(event){
                console.log(`Assume this blog ${blog_id} is deleted`);
                
                $.post('/api/posts/b_delete',
                {
                    id: blog_id
                }, function(data, textSuccess, xhr){
                    console.log(textSuccess);
                    console.log(data);

                    if(textSuccess =="success" ){ //means 200
                        $(`#blog-${blog_id}.modal`).modal('hide');
                        $(`#blog-${blog_id}`).remove();
                    }
                });

                $(event.data.modal).modal('hide');
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


// This is the like & unlike button api call jquery
// $(document).ready(function() {
//     let clickCount = 0;

//     $('.longPress').click(function() {
//         clickCount++;

//         if (clickCount === 2) {
//             // Double-click do any event
//             alert('Hai Baby!');
//         }
//     });
// });

$(document).on("click", "button.btn-like", function () {
    post_id = $(this).parents("div").attr("data-id");
    like_id = "#like-" + post_id;
    like_count = '#like-count-' + post_id;

    if ($(like_id).hasClass("liked")) {
        $(like_id).removeClass("liked");
        $(like_id).removeClass("text-danger");
        $('.icon-liked'+like_id).addClass('d-none');
        $('.icon-like'+like_id).removeClass('d-none');
        like = $(like_count).html();
        like = parseInt(like) - 1;
        $(like_count).text(like);
        $.post("/api/posts/unlike", { id: post_id }, function (data) {
            console.log(data);
        });
    } else {
        $(like_id).addClass("liked");
        $(like_id).addClass("text-danger");
        $('.icon-liked'+like_id).removeClass('d-none');
        $('.icon-like'+like_id).addClass('d-none');
        like = $(like_count).html();
        like = parseInt(like) + 1;
        $(like_count).text(like);
        $.post("/api/posts/like", { id: post_id }, function (data) {
            console.log(data);
        });
    }
});


// This is Hide Headers on scroll down in mobile responsive
var didScroll;
var lastScrollTop = 0;
var delta = 5;
var navbarHeight = $('header').outerHeight();

$(window).scroll(function(event){
    didScroll = true;
});

setInterval(function() {
    if (didScroll) {
        hasScrolled();
        didScroll = false;
    }
}, 100);

function hasScrolled() {
    var st = $(this).scrollTop();
    
    // Make sure they scroll more than delta
    if(Math.abs(lastScrollTop - st) <= delta)
        return;
    
    // If they scrolled down and are past the navbar, add class .nav-up.
    // This is necessary so you never see what is "behind" the navbar.
    if (st > lastScrollTop && st > navbarHeight){
        // Scroll Down
        $('.menu-links').addClass('menu-down');
		$('.profile-nav').addClass('profile-up');
    } else {
        // Scroll Up
        if(st + $(window).height() < $(document).height()) {
            $('.menu-links').removeClass('menu-down');
			   $('.profile-nav').removeClass('profile-up');
        }
    }
    
    lastScrollTop = st;
}


// This is called api and fetch total post count
$.post('/api/profile/count', {
    id: 10
}, function(data) {
    console.log(data);
    $('#total-posts').html("Total Posts: " + data.count);
});


// New UI Post Dropdown Hidden and other thinks JS
$(document).ready(function() {
    $('.button.dd').click(function(event) {
        event.stopPropagation(); // Prevent the document click event from being triggered immediately
        var post_id = $(this).attr("id");
        console.log('This is the post id ' + post_id);
        $(".dropdown").not("#" + post_id).removeClass("open"); // Close other dropdowns
        $(".dropdown#" + post_id).toggleClass("open");
    });

    $(".dropdown a").click(function() {
        $(".dropdown a").removeClass("clicked");
        $(this).toggleClass("clicked");
    });

    // Close the dropdown when clicking outside
    $(document).click(function(event) {
        if (!$(event.target).closest('.dropdown').length) {
            // If the clicked element is outside the dropdown, close it
            $(".dropdown").removeClass("open");
        }
    });
});


// Side menu bar hidden js
$(document).ready(function(){
    $(".user-pro-mob").on("click", function(){
        $('.bg-body-tertiary.left').toggleClass("hidden");
    });
});

// Search hidden and show js
$(document).ready(function(){
    $(".nav-search, .search-back").on("click", function(){
        $('.bg-body-tertiary.right').toggleClass("hidden");
    });
});

// Post Download's JQuery
$(document).ready(function() {
    $('.post-download').on('click', function() {
        var post_id = $(this).attr("id");
        let imagePath = $('#img-'  + post_id).attr('src');
        let fileName = getFileName(imagePath);
        saveAs(imagePath, fileName);
    });
});

function getFileName(str) {
    return str.substring(str.lastIndexOf('/') + 1);
}