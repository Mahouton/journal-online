<!-- Modal pour le formulaire d'ajout d'une catégorie -->
<div class="container-fluid">
    <div class="modal fade" tabindex="-1" role="dialog" id="modalCreateCat">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Enregistrement</h3>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulaire d'ajout -->
                    <form id="form-create-categorie" method="post">

                        <div class="container">

                            <div class="mb-3">
                                <label for="name" class="form-label">Nom</label>
                                <input id="name" type="text" class="form-control" placeholder="Entrer le name"
                                    aria-label="Entrer le name" name="name">
                            </div>
                            <div class="-3mb">
                                <label for="icon_name" class="form-label">Icône</label>
                                <select id="icon_name" class="form-select" name="icon_name">
                                    <option value="">Choisir une icône</option>
                                    <option value="fa-book">Livre</option>
                                    <option value="fa-journal">Journal</option>
                                    <option value="fa-comments">Discussion</option>
                                    <option value="fa-film">Film</option>
                                    <option value="fa-music">Musique</option>
                                </select>


                            </div>
                            <div id="selected-icon" class="col-md-4 offset-md-4">
                                <!-- L'icône sélectionnée sera affichée ici -->
                            </div>


                        </div>
                        <br>

                        <button id="enregistrer" name="enregistrer" type="submit"
                            class="btn btn-primary">Enregistrer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal pour affcher une erreur lors de l'ajout d'une catégorie-->
<div class="modal fade" id="modalCategorieError" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">ATTENTION</h1>
                <button id="CloseCatError" type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="categorieError-container" class="alert alert-danger alert-dismissible fade show" role="alert">
                </div>
            </div>
        </div>
    </div>
</div>