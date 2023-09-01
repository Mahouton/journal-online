<!-- Modal pour le formulaire de connexion d'un user -->
<div class="container-fluid">
    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" role="dialog"
        id="modalLogin">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h2 class="modal-title">Connexion</h2>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- Formulaire de connexion -->
                    <form id="form-login-user" method="post">

                        <div class="container">
                            <div class="mb-3">
                                <label for="loginEmail" class="form-label">Email *</label>
                                <input class="form-control" type="email" name="loginEmail" id="loginEmail">
                            </div>
                            <div class="mb-3">
                                <label for="loginPassword" class="form-label">Mot de passe *</label>
                                <input class="form-control" type="password" name="loginPassword" id="loginPassword">
                            </div>
                        </div>
                        <br>
                        <button id="connecter" name="connecter" type="submit" class="btn btn-primary">Connecter</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal pour affcher une erreur lors de la connexion d'un user-->
<div class="modal fade" id="loginError" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">ATTENTION</h1>
                <button id="btnCloseError" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="login-message-container" class="alert alert-danger alert-dismissible fade show" role="alert">
                </div>
            </div>
        </div>
    </div>
</div>