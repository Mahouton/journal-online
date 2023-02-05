<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
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
                </ul>
            </div>
        </div>
    </nav>
    <header class="masthead" style="background-image: url('assets/img/header-bg-1.jpg');">
        <div class="container">
            <div class="intro-text">
                <div id="success" class="alert alert-success alert-dismissible fade show" role="alert">Hey
                    <strong id="greatUser"> </strong><br> Votre compte a été créé avec succès! Vous pouvez vous connecter.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <div class="intro-lead-in"><span>Bienvenue sur Journal-Online!</span></div>
                <div class="intro-heading text-uppercase"><span>Enchanté de vous rencontrer</span></div>
                <a class="btn btn-light btn-xl text-uppercase" role="button" href="#journaux">Se connecter
                </a>
                <a class="btn btn-secondary btn-xl text-uppercase" role="button" href="#journaux" data-bs-toggle="modal"
                    data-bs-target="#modalCreate">Créer
                    un compte
                </a>
            </div>
        </div>
    </header>
    <section id="categories">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase section-heading">Catégories</h2>
                    <h3 class="text-muted section-subheading">Ci-dessous la liste des catégories de journaux</h3>
                </div>
            </div>

        </div>
    </section>
    <section class="bg-light" id="journaux">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="text-uppercase section-heading">Journaux</h2>
                    <h3 class="text-muted section-subheading">Ci-dessous la liste des journaux publiés</h3>
                </div>
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
                            <h5 class="card-title">Description de l'application</h5>
                            <p class="card-text">Cette application permet aux utilisateurs de créer et de gérer leurs
                                propres entrées de journal en ligne. Les entrées peuvent être classées par catégories et
                                filtrées pour une recherche plus facile. Les utilisateurs peuvent également joindre des
                                images à leurs entrées.</p>
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
    <script src="assets/bootstrap/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/script.min.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/users.js"></script>

</body>

</html>