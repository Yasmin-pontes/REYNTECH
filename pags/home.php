<!-- HEADER -->
<?php include('header.php'); ?>

<body>
    Bem vindo a Home, <?php echo $_SESSION['email']; ?>.
    
    <p>
        <a href="conta.php">Conta</a>
    </p>

    <p>
        <a href="../php/logout.php">Sair</a>
    </p>
</body>
</html>