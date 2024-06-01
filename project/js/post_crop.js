$(document).ready(function(){
    var $posts_image_crop = $('.modal #image_demo').croppie({
        enableExif: true,
        viewport: {
            width: 300,
            height: 300,
            type: 'square' // square or circle
        },
        boundary: {
            width: 300,
            height: 300
        }
    });

    $('.file#post_image').on('change', function () { 
        var reader = new FileReader();
        var input = this;

        reader.onload = function (e) {
            // Validate file type
            if (!isValidImageType(input)) {
                new Toast('File Validation', 'now', 'Invalid file type. Please select an image.', 'text-danger').show();
                $('.modal#uploadimageModal').modal('hide');
                return;
            }

            $posts_image_crop.croppie('bind', {
                url: e.target.result
            }).then(function(){
                console.log('jQuery bind complete');
            });         
        }

        reader.readAsDataURL(this.files[0]);
        $('.modal#uploadimageModal').modal('show');
    });
    
    $('#share-memory').on('click', function () {
        var postText = $("#post_message").val();

        $posts_image_crop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function(response) {
            // Create a FormData object
            const formData = new FormData();
            formData.append('post_image', response);
            formData.append('post_text', postText);
    
            // Make the fetch request
            fetch('/api/posts/memorys', {
                method: 'POST',
                body: formData,
            })
            .then(data => {
                console.log('Server Response:', data);
                $('.modal#uploadimageModal').modal('hide');
            })
            .catch(error => console.error('Error:', error));
        });
    });

    // Function to validate image type
    function isValidImageType(input) {
        var allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
        var fileType = input.files[0].type;
        
        return allowedTypes.includes(fileType);
    }

    // Drag and drop functionality
    var dropZone = $('.post-box');

    dropZone.on('dragover', function (e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).addClass('dragging');
    });

    dropZone.on('dragleave', function (e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).removeClass('dragging');
    });

    dropZone.on('drop', function (e) {
        e.preventDefault();
        e.stopPropagation();
        $(this).removeClass('dragging');
        var files = e.originalEvent.dataTransfer.files;
        handleFiles(files);
    });

    function handleFiles(files) {
        if (files.length > 0) {
            var file = files[0];
            var input = $('#post_image').get(0);
            var dataTransfer = new DataTransfer();
            dataTransfer.items.add(file);
            input.files = dataTransfer.files;

            var reader = new FileReader();
            reader.onload = function (e) {
                // Validate file type
                if (!isValidImageType(input)) {
                    new Toast('File Validation', 'now', 'Invalid file type. Please select an image.', 'text-danger').show();
                    $('.modal#uploadimageModal').modal('hide');
                    return;
                }

                $posts_image_crop.croppie('bind', {
                    url: e.target.result
                }).then(function(){
                    console.log('jQuery bind complete');
                });
            }

            reader.readAsDataURL(file);
            $('.modal#uploadimageModal').modal('show');
        }
    }
});