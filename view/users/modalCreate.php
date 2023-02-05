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
                    <form id="form-create-user" method="post">

                        <div class="container">
                            <div class="mb-3">
                                <label for="username" class="form-label">Nom Complet</label>
                                <input class="form-control" type="text" name="username" id="username" >
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email *</label>
                                <input class="form-control" type="email" name="email" id="email" >
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Mot de passe *</label>
                                <input class="form-control" type="password" name="password" id="password"
                                    >
                            </div>
                           <!-- <div class="mb-3">
                                <label for="passwordRepeat" class="form-label">Répéter Mot de passe *</label>
                                <input class="form-control" type="password" name="passwordRepeat" id="passwordRepeat"
                                    >
                            </div>
                            -->
                        </div>
                        <br>
                        <div class="" role="alert" id="message-container" > 
                        </div>
                        <button id="valider" name="valider" type="submit" class="btn btn-primary"
                            onclick="createUser()">Valider</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>