$(document).ready(function(){
    $blog_image_crop = $('.bv#preview_blogs').croppie({
        enableExif: true,
        viewport: {
            width: 300,
            height: 200,
            // square & circle
            type: 'square'
        },
        boundary: {
            width: 300,
            height: 300
        }
    });

    $('.file#blog_image').on('change', function () { 
        var reader = new FileReader();
        var input = this;

        reader.onload = function (e) {
            // Validate file type
            if (!isValidImageType(input)) {
                new Toast('File Validation', 'now', 'Invalid file type. Please select an image.', 'text-danger').show();
                $('.modal#uploadblog').modal('hide');
            }

            $blog_image_crop.croppie('bind', {
                url: e.target.result
            }).then(function(){
                console.log('jQuery bind complete');
            });         
        }

        reader.readAsDataURL(this.files[0]);
        $('.modal#uploadblog').modal('show');
    });
    
    $('#share-blog').on('click', function () {
        var blogTitle = $("#blog-title").val();
        var blogText  = $("#blog-text").val();

        $blog_image_crop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function(response) {
            // Create a FormData object
            const blogData = new FormData();
            blogData.append('blog_title', blogTitle);
            blogData.append('blog_text', blogText);
            blogData.append('blog_image', response);

            // Make the fetch request
            fetch('/api/posts/blogs', {
                method: 'POST',
                body: blogData,
            })
            .then(data => {
                console.log('Server Response:', data);
                $('.modal#uploadblog').modal('hide');
                location.reload(); // Reloads the current page
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
});