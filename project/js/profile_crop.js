$(document).ready(function(){
    $profile_image_crop = $('#pick_view').croppie({
        enableExif: true,
        viewport: {
            width: 300,
            height: 300,
            // square & circle
            type: 'circle'
        },
        boundary: {
            width: 300,
            height: 300
        }
    });

    $('.file#profile_pick').on('change', function () { 
        var reader = new FileReader();
        var input = this;

        reader.onload = function (e) {
            // Validate file type
            if (!isValidImageType(input)) {
                new Toast('File Validation', 'now', 'Invalid file type. Please select an image.', 'text-danger').show();
                $('#uploadprofilepick.modal').modal('hide');
            }

            $profile_image_crop.croppie('bind', {
                url: e.target.result
            }).then(function(){
                console.log('jQuery bind complete');
            });         
        }

        reader.readAsDataURL(this.files[0]);
        $('#uploadprofilepick.modal').modal('show');
    });
    
    $('#update-profile-pick').on('click', function () {

        $profile_image_crop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function(response) {
            $.ajax({
                url: '/api/profile/avatar',
                type: "POST",
                data: {'profile_pick': response},
                success:function(data) {
                    console.log('Server Response:', data);
                    $('#uploadprofilepick.modal').modal('hide');
                    location.reload();
                }
            });
        });
    });

    // Function to validate image type
    function isValidImageType(input) {
        var allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
        var fileType = input.files[0].type;
        
        return allowedTypes.includes(fileType);
    }
});



$(document).ready(function(){
    $banner_image_crop = $('#banner_view').croppie({
        enableExif: true,
        viewport: {
            width: 300,
            height: 100,
            // square & circle
            type: 'square'
        },
        boundary: {
            width: 300,
            height: 300
        }
    });

    $('.file#banner').on('change', function () { 
        var reader = new FileReader();
        var input = this;

        reader.onload = function (e) {
            // Validate file type
            if (!isValidImageType(input)) {
                new Toast('File Validation', 'now', 'Invalid file type. Please select an image.', 'text-danger').show();
                $('#banner.modal').modal('hide');
            }

            $banner_image_crop.croppie('bind', {
                url: e.target.result
            }).then(function(){
                console.log('jQuery bind complete');
            });
        }

        reader.readAsDataURL(this.files[0]);
        $('#banner.modal').modal('show');
    });
    
    $('#update-banner-pick').on('click', function () {

        $banner_image_crop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function(response) {
            $.ajax({
                url: '/api/profile/banner',
                type: "POST",
                data: {'banner_pick': response},
                success:function(data) {
                    console.log('Server Response:', data);
                    $('#banner.modal').modal('hide');
                    location.reload();
                }
            });
        });
    });

    // Function to validate image type
    function isValidImageType(input) {
        var allowedTypes = ['image/jpeg', 'image/png', 'image/jpg', 'image/gif'];
        var fileType = input.files[0].type;
        
        return allowedTypes.includes(fileType);
    }
});