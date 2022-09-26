<!-- HEADER -->
<?php include('pags/header.php'); ?>
<link rel="stylesheet" href="css/estilo.css">

<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid px-5">
            <a class="navbar-brand" href="#">M&S Garden</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Categorias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Contato</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Curiosidades</a>
                    </li>
                </ul>
                <form class="d-flex">
                    <a href="pags/login.php">
                        <button class="btn btn-outline-success me-3" type="button">Entrar</button>
                    </a>
                </form>
            </div>
        </div>
    </nav>

    <!-- FIM NAVBAR -->
    <a href="admin/login_admin.php"> ADM </a>


    <!-- INICIO DA HOME -->
    <div class="container-fluid main mb-5">
        <main>
            <h1 id="h1-index">M&S Garden</h1>
            <h3 id="h3-index">Plantamos com amor</h3>

            <figure>
                <img id="seta" data-aos="fade-down" src="img/seta.png" alt="seta">
            </figure>
        </main>
    </div>

    <div class="my-5">
        <h1 class="text-center my-5">Categorias</h1>

        <div class="container text-center mt-5">
            <div class="row">
                <div class="col-md-8 col-sm-7 border border-success" data-aos="fade-right">
                    <figure>
                        <img src="img/planta.jpg" alt="Planta" />
                        <figcaption>Planta</figcaption>
                    </figure>
                </div>
                <div class="col-6 col-md-4 col-sm-5 border border-success" data-aos="fade-left">
                    <figure>
                        <img src="img/planta.jpg" alt="Planta" />
                        <figcaption>Planta</figcaption>
                    </figure>
                </div>
            </div>

            <div class="row">
                <div class="col-6 col-md-4 col-sm-12 border border-success" data-aos="fade-right">
                    <figure>
                        <img src="img/planta.jpg" alt="Planta" />
                        <figcaption>Planta</figcaption>
                    </figure>
                </div>
                <div class="col-6 col-md-4 col-sm-4 border border-success" data-aos="fade-left">
                    <figure>
                        <img src="img/planta.jpg" alt="Planta" />
                        <figcaption>Planta</figcaption>
                    </figure>
                </div>
                <div class="col-6 col-md-4 col-sm-8 border border-success" data-aos="fade-left">
                    <figure>
                        <img src="img/planta.jpg" alt="Planta" />
                        <figcaption>Planta</figcaption>
                    </figure>
            </div>
            </div>

            <div class="row">
                <div class="col-6 border border-success" data-aos="fade-right">
                    <figure>
                        <img src="img/planta.jpg" alt="Planta" />
                        <figcaption>Planta</figcaption>
                    </figure>
                </div>
                <div class="col-6 border border-success"data-aos="fade-left">
                    <figure>
                        <img src="img/planta.jpg" alt="Planta" />
                        <figcaption>Planta</figcaption>
                    </figure>
                </div>
            </div>
        </div>
    </div>

    <!-- FIM DA HOME -->

    <figure class="pp">
        <img id="planta" data-aos="fade-right" src="img/planta.png" alt="planta">
    </figure>

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