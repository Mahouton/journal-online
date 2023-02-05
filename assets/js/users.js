function createUser() {
    $("#form-create-user").submit(function (e) {
        e.preventDefault(); // Empêcher la soumission de formulaire par défaut

        // Récupérer les valeurs du formulaire
        //var valider = $('#valider').val();
        var username = $("#username").val();
        var password = $("#password").val();
        var email = $("#email").val();

        // Validation des données
        if (username.length === 0) {
            displayError("Le nom d'utilisateur est obligatoire");
            return;
        }
        if (password.length === 0) {
            displayError("Le mot de passe est obligatoire");
            return;
        }
        if (email.length === 0) {
            displayError("L'adresse email n'est pas valide");
            return;
        }

        // Hasher le mot de passe
        //password = hashPassword(password);

        // Préparer les données à envoyer au serveur
        var data = {
            username: username,
            password: password,
            email: email
        };

        // Envoyer les données au serveur via AJAX
        $.ajax({
            type: 'POST',
            url: '/journal-online/controller/users/createUser.php',
            data: data,
            dataType: 'json',
            encode: true
        })
            .done(function (response) {
                if (response.status == 'success') {
                    $('#modalCreate').modal('hide');
                    $('#modalCreate input[type="text"], #modalCreate input[type="email"], #modalCreate input[type="password"]').val('');

                    $('#greatUser').append(response.username); 
                    displaySuccess("Utilisateur créé avec succès");

                    setTimeout(function(){
                        location.reload();
                    }, 5000);

                } else {
                    displayError("Erreur lors de la création de l'utilisateur");

                }
            })

            .fail(function (jqXHR, textStatus, errorThrown) {
                displayError("Erreur lors de la requête AJAX : " + errorThrown);
              });
    });
}
