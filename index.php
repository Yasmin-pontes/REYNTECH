<!-- HEADER -->
<?php include('pags/header.php'); ?>

<!-- FAVICON -->
<link rel="apple-touch-icon" sizes="180x180" href="assets/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="assets/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="assets/favicon-16x16.png">
<link rel="manifest" href="assets/site.webmanifest">

<!-- STYELE -->
<link rel="stylesheet" href="css/estilo.css">

<style>
    .navbar {
        background-color: rgba(0,0,0,0.2) !important;
    }

    a {
        color: black !important;
    }
</style>

<body>

    <!-- NAVBAR -->
    <div class="fundo-home">
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="container-fluid px-5">
                <a class="navbar-brand" href="#" class="nav-msgarden">M&S Garden</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pags/pag_produtos.php">Produtos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pags/categorias.php">Categorias</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pags/contato.php">Contato</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="pags/curiosidades.php">Curiosidades</a>
                        </li>
                    </ul>
                    <form class="d-flex">
                        <a href="pags/login.php">
                            <button class="btn btn-outline-success me-3" type="button">Entrar</button>
                        </a>
                        <a href="admin/login_admin.php">
                            <button class="btn btn-outline-success me-3" type="button">Admin</button>
                        </a>
                    </form>
                </div>
            </div>
        </nav>
        <!-- FIM NAVBAR -->


        <!-- INICIO DA HOME -->
        <div class="container-fluid main mb-5">
            <main>
                <h1 id="h1-index">M&S Garden</h1>
                <h3 id="h3-index">Plantamos com amor...</h3>

                <figure class="mt-4">
                    <a href="#inicio">
                        <img id="seta" data-aos="fade-down" src="img/seta.png" alt="seta">
                    </a>
                </figure>
            </main>
        </div>
    </div>

    <div class="py-5">  
        <a id="inicio">
            <h1 class="text-center my-5 titulo">Categorias</h1>
        </a>

        <div class="container text-center mt-5">
            <div class="row">
                <div class="col-md-8 col-sm-6 col-12 border border-success" data-aos="fade-right">
                    <figure>
                        <img src="img/planta.jpg" alt="Planta" />
                        <figcaption>Planta</figcaption>
                    </figure>
                </div>
                <div class="col-6 col-md-4 col-sm-6 col-12 border border-success" data-aos="fade-left">
                    <figure>
                        <img src="img/planta.jpg" alt="Planta" />
                        <figcaption>Planta</figcaption>
                    </figure>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-12 col-12 border border-success" data-aos="fade-right">
                    <figure>
                        <img src="img/planta.jpg" alt="Planta" />
                        <figcaption>Planta</figcaption>
                    </figure>
                </div>
                <div class="col-md-4 col-sm-4 col-12 border border-success" data-aos="fade-left">
                    <figure>
                        <img src="img/planta.jpg" alt="Planta" />
                        <figcaption>Planta</figcaption>
                    </figure>
                </div>
                <div class="col-md-4 col-sm-8 col-12 border border-success" data-aos="fade-left">
                    <figure>
                        <img src="img/planta.jpg" alt="Planta" />
                        <figcaption>Planta</figcaption>
                    </figure>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-12 border border-success" data-aos="fade-right">
                    <figure>
                        <img src="img/planta.jpg" alt="Planta" />
                        <figcaption>Planta</figcaption>
                    </figure>
                </div>
                <div class="col-md-6 col-12 border border-success" data-aos="fade-left">
                    <figure>
                        <img src="img/planta.jpg" alt="Planta" />
                        <figcaption>Planta</figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </div>

    <!-- FIM DA HOME -->

    <!-- <figure class="pp">
        <img id="planta" data-aos="fade-right" src="img/planta.png" alt="planta">
    </figure> -->

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 1000,
        });
    </script>

    <!-- FOOTER -->
    <?php include('pags/footer.php'); ?>
</body>

</html>