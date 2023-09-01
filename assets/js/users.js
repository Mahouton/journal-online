//Validation du formulaire avec jQuery Validate
$(document).ready(function () {
    //Formulaire d'inscription
    $('#form-create-user').validate({
        rules: {
            username: {
                required: true,
            },
            password: {
                required: true,
            },
            passwordRepeat: {
                equalTo: "#password"
            },
            email: {
                required: true,
                email: true
            },
        },
        messages: {
            username: 'Le nom d\'utilisateur est obligatoire.',
            password: 'Le mot de passe est obligatoire.',
            passwordRepeat: 'Entrer la même valeur du mot de passe.',
            email: {
                required: "L'adresse email est obligatoire.",
                email: "Adresse email non valide."
            },
        }
    });

    //Formulaire de connexion
    $('#form-login-user').validate({
        rules: {
            loginPassword: {
                required: true,
            },
            loginEmail: {
                required: true,
                email: true
            },
        },
        messages: {
            loginPassword: 'Le mot de passe est obligatoire.',
            loginEmail: {
                required: "L'adresse email est obligatoire.",
                email: "Adresse email non valide."
            },
        }
    });
});

// Fonction pour créer un compte utilisateur
function createUser() {
    $('#form-create-user').submit(function (e) {
        e.preventDefault();

        // Si le formulaire est valide
        if ($('#form-create-user').valid()) {



            // Récupérer les valeurs du formulaire
            var username = $("#username").val();
            var password = $("#password").val();
            var email = $("#email").val();

            // Préparer les données à envoyer au serveur
            var data = {
                username: username,
                password: password,
                email: email
            };

            // Envoyer les données au serveur via AJAX
            $.ajax({
                type: 'POST',
                url: '/../../controller/users/createUser.php',
                data: data,
                dataType: 'json',
                encode: true
            })

                .done(function (response) {
                    if (response.status == 'success') {
                        $('#modalCreate').modal('hide');
                        $('#modalCreate input[type="text"], #modalCreate input[type="email"], #modalCreate input[type="password"]').val('');

                        $('#greatUser').append(response.username);
                        displaySuccess();
                        $('#btnmodalCreate').hide();
                        /*setTimeout(function () {
                           
                       }, 7000);*/

                    }

                    if (response.status == 'error') {
                        errorMessage = response.message || "Une erreur inconnue s\'est produite";
                        displayError(errorMessage, '#message-container');
                        $('#modalCreate').modal('hide');
                        
                        $('#SignupError').modal('show');

                        $('#btnCloseError2').click(function(){
                            location.reload();
                        });
                    }

                });


        }
    });

}

// Fonction pour la connexion d'un utilisateur
function loginUser() {
    $('#form-login-user').submit(function (e) {
        e.preventDefault();

        // Si le formulaire est valide
        if ($('#form-login-user').valid()) {



            // Récupérer les valeurs du formulaire
            var password = $("#loginPassword").val();
            var email = $("#loginEmail").val();

            // Préparer les données à envoyer au serveur
            var data = {
                password: password,
                email: email
            };

            // Envoyer les données au serveur via AJAX
            $.ajax({
                type: 'POST',
                url: '../../controller/users/loginUser.php',
                data: data,
                dataType: 'json',
                encode: true
            })

                .done(function (response) {
                    if (response.status == 'success') {
                        $('#modalLogin').modal('hide');
                        $('#modalLogin input[type="email"], #modalLogin input[type="password"]').val('');
                        location.reload();
                    }

                    if (response.status == 'error') {
                        errorMessage = response.message || "Une erreur inconnue s\'est produite";

                        $('#modalLogin').modal('hide');
                        displayError(errorMessage, '#login-message-container');
                        $('#loginError').modal('show');

                        $('#btnCloseError').click(function(){
                            location.reload();
                        });
                    }

                });


        }
    });

}