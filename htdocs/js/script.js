var darkSwitch = document.getElementById("darkSwitch");
window.addEventListener("load",( function() {
    if(darkSwitch) {
        initTheme();
        darkSwitch.addEventListener("change",( function() {
            resetTheme()
        }))
    }
}));

function initTheme() {
    var darkThemeSelected = localStorage.getItem("darkSwitch")!==null && localStorage.getItem("darkSwitch")==="dark";
    darkSwitch.checked = darkThemeSelected;
    darkThemeSelected ? document.body.setAttribute("class","dark") : document.body.removeAttribute("class")
}

function resetTheme() {
    if(darkSwitch.checked) {
        document.body.setAttribute("class","dark");
        localStorage.setItem("darkSwitch","dark")
    } else {
        document.body.removeAttribute("class");
        localStorage.removeItem("darkSwitch")
    }
}


// This is the status Next and prey button javascript
(function($) {

	$(".card-body").on('scroll', function() {
    	$val = $(this).scrollLeft();

    	if($(this).scrollLeft() + $(this).innerWidth()>=$(this)[0].scrollWidth){
          $(".nav-next").hide();
        } else {
    		$(".nav-next").show();
    	}

    	if($val == 0){
    		$(".nav-prev").hide();
    	} else {
    		$(".nav-prev").show(null);
    	}
  	});
	// console.log( 'init-scroll: ' + $(".nav-next").scrollLeft() );
	$(".nav-next").on("click", function(){
		$(".card-body").animate( { scrollLeft: '+=460' }, 200);
		
	});
	$(".nav-prev").on("click", function(){
		$(".card-body").animate( { scrollLeft: '-=460' }, 200);
	});

})(jQuery);


















// //
// $.post('/api/posts/count', {
//     id: 10
// }, function(data) {
//     console.log(data);
//     $('#total-posts').html("Total posts: " + data.count);
// });

// $(document).ready(function(){
//     // $('#fileupload').redy('click', function(){
//     //     d = new Dialog("Upload Post", "Are you sure want to remove this post");
//     //     d.setButtons([
//     //         {
//     //             'name': "Upload",
//     //             "class": "btn-success",
//     //             "type": "submit",
//     //             "onClick": "submit"
//     //         },
//     //         {
//     //             'name': "Cancel",
//     //             "class": "btn-secondary",
//     //             "onClick": function(event){
//     //                 $(event.data.modal).modal('hide');
//     //             }
//     //         }
//     //     ]);
//     //     d.show();
//     // });
//     dialog("Notify", "Page finished loading");
// });