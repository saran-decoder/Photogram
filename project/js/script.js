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



// Function to set a cookie
function setCookie(name, value, daysToExpire) {
    var expires = "";
    
    if (daysToExpire) {
      var date = new Date();
      date.setTime(date.getTime() + (daysToExpire * 24 * 60 * 60 * 1000));
      expires = "; expires=" + date.toUTCString();
    }
  
    document.cookie = name + "=" + value + expires + "; path=/";
}  