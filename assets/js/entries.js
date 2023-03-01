//Validation du formulaire avec jQuery Validate
$(document).ready(function () {
  //Formulaire de nouvelle catégorie
  $('#form-create-entries').validate({
      rules: {
        titre: {
              required: true,
          },
          categorie: {
              required: true,
          },
          contenu: {
            required: true,
        },
      },
      messages: {
          titre: 'Le titre est obligatoire.',
          categorie: 'Veuillez choisir une catégorie.',
          contenu: 'Veuillez saisir votre texte',
      }
  });

});

// Fonction pour créer une entrée
function createEntries() {
  $('#form-create-entries').submit(function (e) {
      e.preventDefault();

      // Si le formulaire est valide
      if ($('#form-create-entries').valid()) {



          // Récupérer les valeurs du formulaire
          var titre = $("#titre").val();
          var categorie = $("#categorie").val();
          
          var content = tinymce.activeEditor.getContent();

          // Préparer les données à envoyer au serveur
          var data = {
              titre: titre,
              categorie: categorie,
              contenu: content
          };

          // Envoyer les données au serveur via AJAX
          $.ajax({
              type: 'POST',
              url: '/journal-online/controller/entries/createEntries.php',
              data: data,
              dataType: 'json',
              encode: true
          })

              .done(function (response) {
                  if (response.status == 'success') {
                      $('#modalCreateEntries').modal('hide');
                      $('#modalCreateEntries input[type="text"]', '#modalCreateEntries select').val('');

                      //displayCategorie();

                  }

                  if (response.status == 'error') {
                      errorMessage = response.message || "Une erreur inconnue s\'est produite";
                      displayError(errorMessage, '#entriesError-container');
                      $('#modalCreateEntries').modal('hide');
                      
                      $('#modalEntriesError').modal('show');

                      $('#CloseEntriesError').click(function(){
                          location.reload();
                      });
                  }

              });


      }
  });

}

// Fonction pour afficher les entrées
function displayEntries() {
    var displayData="true";
    $.ajax({
        url: '/journal-online/controller/entries/display.php',
        type: 'post',
        data:{
            displaySend: displayData
        },
        success: function(data, status){
        $('#listOfEntries').html(data);
    }
    });
}