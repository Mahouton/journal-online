function displaySuccess(message) {
    $('#success').css("display", "block");
}
function displayError(message) {
    var errorContainer = $("#message-container");
    errorContainer.empty();

    errorContainer.append("<p class='error'>" + message + "</p>");
    errorContainer.show();
}

