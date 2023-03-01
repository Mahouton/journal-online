<?php
require_once(dirname(__FILE__) . '/../../controller/entries/categoriesData.php');
?>

<!-- Modal pour le formulaire d'ajout d'un Journal -->
<div class="container-fluid">
    <div class="modal fade" tabindex="-1" role="dialog" id="modalCreateEntries" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-xl" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Publication</h2>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body mb-3">
                    <!-- Formulaire d'ajout -->
                    <form id="form-create-entries" method="post" class="row gx-3 gy-2 align-items-center">

                        <div class="col-sm-3">
                            <label class="" for="titre">
                                <h5>Titre</h5>
                            </label>
                            <div class="input-group">
                                <div class="input-group-text"></div>
                                <input type="text" class="form-control" id="titre" placeholder="Titre" name="titre">
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <label class="" for="categorie">
                                <h5>Catégorie</h5>
                            </label>
                            <select class="form-select" id="categorie" name="categorie">
                                <option value="">Choisir...</option>
                                <?php foreach ($result as $data) { ?>
                                    <option value="<?= $data['category_id'] ?>">
                                        <?= $data['name']; ?>
                                    </option>
                                <?php } ?>
                            </select>
                        </div>

                </div>
                <div class="container">
                    <label for="contenu" class="form-label">
                        <h5>Contenu</h5>
                    </label>
                    <textarea name="contenu" id="contenu" cols="30" rows="10">Votre texte ici</textarea><br>
                    <button id="publier" name="publier" type="submit"
                        class="btn btn-secondary mb-3">Publier</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<!-- Modal pour affcher une erreur lors de l'ajout d'un Journal-->
<div class="modal fade" id="modalEntriesError" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">ATTENTION</h1>
                <button id="CloseEntriesError" type="button" class="btn-close" data-bs-dismiss="modal"
                    aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="entriesError-container" class="alert alert-danger alert-dismissible fade show" role="alert">
                </div>
            </div>
        </div>
    </div>
</div>