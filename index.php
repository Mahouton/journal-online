<?php
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="robots" content="noindex">
    <title>Home - Journal-Online</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/styles.min.css">
    <link rel="stylesheet" href="assets/css/styles.css">
</head>

<body id="page-top" data-bs-spy="scroll" data-bs-target="#mainNav" data-bs-offset="54">
    <nav class="navbar navbar-dark navbar-expand-lg fixed-top bg-dark" id="mainNav">
        <div class="container"><a class="navbar-brand" href="#page-top">Journal-Online</a><button
                data-bs-toggle="collapse" data-bs-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right"
                type="button" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><i
                    class="fa fa-bars"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto text-uppercase">
                    <li class="nav-item"><a class="nav-link" href="#journaux">journaux</a></li>
                    <li class="nav-item"><a class="nav-link" href="#categories">Categories</a></li>
                    <li class="nav-item"><a class="nav-link" href="#apropos">A propos</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact">Contact</a></li>
                    <?php if (isset($_SESSION['auth']) && $_SESSION['auth'] == true) {
                        ?>
                        <li class="nav-item"><a class="nav-link" href="controller/users/logout.php">Déconnexion</a></li>

                    <?php
                    } else {
                        ?>
                        <li class="nav-item"><a class="nav-link" href="#" data-bs-toggle="modal"
                                data-bs-target="#modalLogin">Connexion</a></li>
                    <?php
                    } ?>
                </ul>
            </div>
        </div>
    </nav>
    <header class="masthead" style="background-image: url('assets/img/header-bg-1.jpg');">
        <div class="container">
            <div class="intro-text">
                <div id="success" class="alert alert-success alert-dismissible fade show" role="alert">Hey
                    <strong id="greatUser"> </strong><br> Votre compte a été créé avec succès! <br>Vous pouvez vous
                    connecter.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <div class="intro-lead-in"><span>Bienvenue <strong style="color:yellow">
                            <?php if (isset($_SESSION['name']))
                                echo "@ ".$_SESSION['name'] ?></strong> sur
                                Journal-Online!</span></div>
                    <div class="intro-heading text-uppercase"><span>Ravi de vous rencontrer</span></div>
                <?php if (!isset($_SESSION['auth'])) {
                                ?>
                    <a id="btnmodalLogin" class="btn btn-light btn-xl text-uppercase" role="button" href="#"
                        data-bs-toggle="modal" data-bs-target="#modalLogin">Se connecter
                    </a>
                    <a id="btnmodalCreate" class="btn btn-secondary btn-xl text-uppercase" role="button" href="#journaux"
                        data-bs-toggle="modal" data-bs-target="#modalCreate">Créer
                        un compte
                    </a>
                <?php } ?>
            </div>
        </div>
    </header>
    <section id="categories">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase section-heading">Catégories</h2>

                    <?php if (isset($_SESSION['auth'])) {
                        ?>
                        <button class="btn btn-secondary mb-3" data-bs-toggle="modal" data-bs-target="#modalCreateCat">Ajouter <i
                                class="fa fa-plus"></i> </button>
                    <?php } ?>
                    <h3 class="text-muted section-subheading ">Ci-dessous la liste des catégories de journaux</h3>
                </div>
            </div>
            <div class="row text-center" id="listOfCategories">

            </div>

        </div>
    </section>
    <section class="bg-light" id="journaux">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase section-heading">Journaux</h2>
                    <?php if (isset($_SESSION['auth'])) {
                        ?>
                        <button class="btn btn-secondary mb-3" data-bs-toggle="modal" data-bs-target="#modalCreateEntries">Publier un journal <i
                                class="fa fa-plus"></i> </button>
                    <?php } ?>
                    <h3 class="text-muted section-subheading">Ci-dessous la liste des journaux publiés</h3>
                </div>
            </div>
            <div class="row text-center" id="listOfEntries">
                        
            </div>
        </div>
    </section>
    <section id="apropos">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase">A propos</h2>
                    <h3 class="text-muted section-subheading"></h3>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <details>
                                <summary>
                                    <h5 class="card-title">Description de l'application</h5>
                                </summary>
                                <p class="card-text">
                                    Cette application permet aux utilisateurs de créer et de gérer
                                    leurs propres entrées de journal en ligne. <br>
                                    Les entrées peuvent être classées par
                                    catégories et
                                    filtrées pour une recherche plus facile.<br>Les utilisateurs peuvent également
                                    joindre des
                                    images à leurs entrées.
                                </p>
                            </details>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>



    <footer>
        <div class="container" id="contact">
            <div class="row">
                <div class="col-md-4"><span class="copyright">Copyright&nbsp;© Journal-Online 2023</span></div>
                <div class="col-md-4">
                    <ul class="list-inline social-buttons">
                        <li class="list-inline-item"><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fa fa-linkedin"></i></a></li>
                    </ul>
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li class="list-inline-item"><a href="#">Privacy Policy</a></li>
                        <li class="list-inline-item"><a href="#">Terms of Use</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <?php include('view/users/modalCreate.php') ?>
    <?php include('view/users/modalLogin.php') ?>
    <?php include('view/categories/modalCreate.php') ?>
    <?php include('view/entries/modalCreate.php') ?>
    <script src="assets/bootstrap/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/jquery.validate.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/tinymce/js/tinymce/tinymce.min.js"></script>
    <script src="assets/js/initTinymce.js"></script>
    <script src="assets/js/script.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/users.js"></script>
    <script src="assets/js/categories.js"></script>
    <script src="assets/js/entries.js"></script>
    <script>
        createUser();
        loginUser();
        createCategorie();
        displayCategorie();
        createEntries();
        displayEntries();
        var selector = document.getElementById("icon_name");
        var iconContainer = document.getElementById("selected-icon");

        selector.addEventListener("change", function () {
            var selectedValue = selector.value;
            iconContainer.innerHTML = "<span class='fa-stack fa-3x'><i class='fa fa-circle fa-stack-2x text-primary'></i> <i class='fa " + selectedValue + " fa-stack-1x fa-inverse'></i></span>";
        });
    </script>

</body>

</html>