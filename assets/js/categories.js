//Validation du formulaire avec jQuery Validate
$(document).ready(function () {
    //Formulaire de nouvelle catégorie
    $('#form-create-categorie').validate({
        rules: {
            name: {
                required: true,
            },
            icon_name: {
                required: true,
            },
        },
        messages: {
            name: 'Le name est obligatoire.',
            icon_name: 'Une icône est obligatoire.',
        }
    });

});

// Fonction pour créer une catégorie
function createCategorie() {
    $('#form-create-categorie').submit(function (e) {
        e.preventDefault();

        // Si le formulaire est valide
        if ($('#form-create-categorie').valid()) {



            // Récupérer les valeurs du formulaire
            var name = $("#name").val();
            var icon_name = $("#icon_name").val();

            // Préparer les données à envoyer au serveur
            var data = {
                name: name,
                icon_name: icon_name,
            };

            // Envoyer les données au serveur via AJAX
            $.ajax({
                type: 'POST',
                url: '/journal-online/controller/categories/createCategorie.php',
                data: data,
                dataType: 'json',
                encode: true
            })

                .done(function (response) {
                    if (response.status == 'success') {
                        $('#modalCreateCat').modal('hide');
                        $('#modalCreateCat input[type="text"]').val('');

                        displayCategorie();

                    }

                    if (response.status == 'error') {
                        errorMessage = response.message || "Une erreur inconnue s\'est produite";
                        displayError(errorMessage, '#categorieError-container');
                        $('#modalCreateCat').modal('hide');
                        
                        $('#modalCategorieError').modal('show');

                        $('#CloseCatError').click(function(){
                            location.reload();
                        });
                    }

                });


        }
    });

}

// Fonction pour afficher les catégories
function displayCategorie() {
    var displayData="true";
    $.ajax({
        url: '/journal-online/controller/categories/display.php',
        type: 'post',
        data:{
            displaySend: displayData
        },
        success: function(data, status){
        $('#listOfCategories').html(data);
    }
    });
}