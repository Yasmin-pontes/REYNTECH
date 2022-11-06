 <!-- STYELE -->
<style>
    
    
    .navbar {
        background-color: rgba(0,0,0,0.2) !important;
    }

    a {
        color: #000 !important;
    }

    img{
        height:5%;
        width:5%;
    }

    li, a, .button-navbar {
    font-weight: 500;
    font-size: 16px;
    color: #fff;
    text-decoration: none;

}

.header-navbar {
    display:flex;
    justify-content: space-between;
    align-items: center;
    padding: 30px 10px;
}

.nav_links {
   list-style: none;

}

.nav_links li {
    display: inline-block;
    padding: 0px 20px;
    
    
}

.nav_links li a{
 transition: all 0.3s ease 0s;
}


.nav_links li a:hover {
    color: aqua;
}

.cta{
    padding:0px 25px;
}






  


</style>





<!-- NAVBAR -->
<?php include('header.php'); ?>
 <link rel="stylesheet" href="../css/estil.css">
        </head>
        <body>
            <header class="header-navbar">
               
                <img class="logo" src="../img/logo.png" alt="logo" >
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="fas fa-bars"></span>
                </button>
            <nav>
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="nav_links">
                  
                <li class="nav-item"><a class="nav-link" href="index.php">Home</a></li>
                <li  class="nav-item"><a class="nav-link" href="pag_produtos.php">Produtos</a></li>
                <li class="nav-item"><a class="nav-link" href="categorias.php">Categorias</a></li>
                <li class="nav-item"><a class="nav-link" href="contato.php">Contato</a></li>
                <li class="nav-item"><a class="nav-link" href="curiosidades.php">Curiosidades</a></li>


                <a class="cta" href="#">
            <i class="fas fa-moon"></i>
            </a>

            <a class="cta" href="login.php">
            <i class="fas fa-user"></i>
            </a>


            <a class="cta" href="#">
            <i class="fas fa-leaf"></i>
            </a>


                </ul>

                </div>  
         
                
            </nav>
            

           
         
          

         
            </header>
        </body>
        </html>
 
 <!-- FIM NAVBAR -->