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
            $('#characterLeft').text("You're have reached the limit");
            $('#characterLeft').addClass('red');
        } else {
            var ch = max - len;
            $('#characterLeft').text(ch);
            $('#characterLeft').removeClass('red');            
        }
    });    
});




$(document).ready(function() {
    $('#post').click(function() {
        $(this).html('<div class="spinner-grow text-primary"></div>');
        setTimeout(() => {
            console.log('This Working!');
        }, 5000);
    });
});







$('#dell').on('click', function(){
    post_id = $(this).parent().attr('data-id');
    d = new Dialog("Delete Post", "Are you sure want to delete this post");
    d.setButtons([
        {
            'name': "Delete",
            "class": "btn-danger",
            "onClick": function(event){
                console.log(`Assume this post ${post_id} is deleted`);
                // $(`#post-${post_id}`).remove();
                
                $.post('/api/posts/delete',
                {
                    id: post_id
                }, function(data, textSuccess, xhr){
                    console.log(textSuccess);
                    console.log(data);

                    if(textSuccess =="success" ){ //means 200
                        $(`#post-${post_id}`).remove();
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

$.post('/api/posts/count', {
    id: 10
}, function(data) {
    console.log(data);
    $('#total-posts').html("Total Posts: " + data.count);
});