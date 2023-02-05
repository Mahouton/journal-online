function displaySuccess(message) {
    var successContainer = $("#message-container");
    successContainer.empty();
    successContainer.append("<p class='success'>" + message + "</p>");
    successContainer.show();
}

function displayError(message) {
    var errorContainer = $("#message-container");
    errorContainer.empty();
    errorContainer.append("<p class='error'>" + message + "</p>");
    errorContainer.show();
}

