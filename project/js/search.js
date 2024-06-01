// This is The Searching Jquery
// Store the initial display status of each list item
// Store the initial display status as a data attribute
$(".search-txt").on("input", filter);

function filter() {
    var term = $(".search-txt").val().toLowerCase();
    var noResultsMessage = $(".no-results-message");

    var anyListItemVisible = false;

    $(".list-item").each(function() {
        var listItem = $(this);

        // If the search term is empty, use the initial display status
        if (term === "") {
            listItem.css("display", listItem.data('initial-display'));
            listItem.css("display", "block");
            anyListItemVisible = true;
        } else {
            // Otherwise, filter based on the search term
            if (listItem.text().toLowerCase().indexOf(term) !== -1) {
                listItem.css("display", "block");
                anyListItemVisible = true;
            } else {
                listItem.css("display", "none");
            }
        }
    });

    // Show or hide the "No results found" message based on visibility of list items
    noResultsMessage.css("display", anyListItemVisible ? "none" : "flex");
}