function displaySuccess(message) {
    $('#success').css("display", "block");
}


function displayError(message, id) {
    $(id).append(message);
    $(id).css("display", "block");
}



