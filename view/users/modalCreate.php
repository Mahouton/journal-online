<!-- Modal pour le formulaire d'ajout d'un user -->
<div class="container-fluid">
    <div class="modal fade" tabindex="-1" role="dialog" id="modalCreate">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Inscription</h3>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulaire d'ajout -->
                    <form id="createForm" method="post" action="">

                        <div class="container">
                            <div class="mb-3">
                                <label for="nom" class="form-label">Nom Complet</label>
                                <input class="form-control" type="text" name="nom" id="nom" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email *</label>
                                <input class="form-control" type="email" name="email" id="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de passe</label>
                                <input class="form-control" type="password" name="password" id="password"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="passwordRepeat" class="form-label">Répéter Mot de passe</label>
                                <input class="form-control" type="password" name="passwordRepeat" id="passwordRepeat"
                                    required>
                            </div>
                        </div>
                        <br>

                        <button id="valider" name="valider" type="submit" class="btn btn-primary"
                            onclick="createUser()">Valider</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>