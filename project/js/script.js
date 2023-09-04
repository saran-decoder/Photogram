$(document).ready(function() {
    const darkSwitch = $("#darkSwitch");

    // Check if the user has a theme preference in local storage
    const darkThemeSelected = localStorage.getItem("darkSwitch") === "dark";

    // Initialize theme based on the preference
    if (darkThemeSelected) {
        $("body").addClass("dark");
    }

    // Handle theme toggle checkbox change
    darkSwitch.change(function() {
        if (this.checked) {
            $("body").addClass("dark");
            localStorage.setItem("darkSwitch", "dark");
        } else {
            $("body").removeClass("dark");
            localStorage.removeItem("darkSwitch");
        }
    });
});


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