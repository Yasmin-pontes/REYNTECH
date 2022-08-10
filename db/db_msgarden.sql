
CREATE SCHEMA IF NOT EXISTS db_msgarden DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE db_msgarden;

-- -----------------------------------------------------
-- Table tb_imagem
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS tb_imagem (
  cd_imagem INT NOT NULL AUTO_INCREMENT,
  ft_produto_principal LONGBLOB NOT NULL,
  ft_produto_secundario1 LONGBLOB NULL,
  ft_produto_secundario2 LONGBLOB NULL,
  ft_produto_secundario3 LONGBLOB NULL,
  ft_usuario LONGBLOB NULL,
  PRIMARY KEY (cd_imagem)   
);


-- -----------------------------------------------------
-- Table tb_usuario
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS tb_usuario (
  cd_usuario INT NOT NULL AUTO_INCREMENT,
  nm_usuario VARCHAR(50) NOT NULL,
  dt_ingresso DATE NOT NULL,
  ds_email VARCHAR(60) NOT NULL,
  ds_email_recuperacao VARCHAR(60) NULL,
  ds_senha VARCHAR(20) NOT NULL,
  nr_celular INT NOT NULL,
  id_imagem_usuario INT NOT NULL,
  PRIMARY KEY (cd_usuario),
  
  FOREIGN KEY (id_imagem_usuario)
  REFERENCES tb_imagem (cd_imagem)
);


-- -----------------------------------------------------
-- Table tb_admin
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS tb_admin (
  cd_admin INT NOT NULL AUTO_INCREMENT,
  nm_admin VARCHAR(50) NOT NULL,
  ds_senha VARCHAR(20) NOT NULL,
  PRIMARY KEY (cd_admin)   
);


-- -----------------------------------------------------
-- Table tb_categoria
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS tb_categoria (
  cd_categoria INT NOT NULL AUTO_INCREMENT,
  nm_categoria VARCHAR(45) NOT NULL,
  PRIMARY KEY (cd_categoria)   
);


-- -----------------------------------------------------
-- Table tb_produto
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS tb_produto (
  cd_produto INT NOT NULL AUTO_INCREMENT,
  nm_produto VARCHAR(45) NOT NULL,
  vl_preco DECIMAL(9,2) NOT NULL,
  ds_produto LONGTEXT NOT NULL,
  qtd_produto INT NOT NULL,
  PRIMARY KEY (cd_produto),
  
  id_categoria INT NOT NULL,
  id_imagem_produto INT NOT NULL,
  
  FOREIGN KEY (id_categoria)
  REFERENCES tb_categoria (cd_categoria),
  
  FOREIGN KEY (id_imagem_produto)
  REFERENCES tb_imagem (cd_imagem)
);


-- -----------------------------------------------------
-- Table tb_curiosidade
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS tb_curiosidade (
  cd_curiosidade INT NOT NULL AUTO_INCREMENT,
  nm_curiosidade VARCHAR(45) NOT NULL,
  ds_descricao LONGTEXT NOT NULL,
  id_categoria INT NOT NULL,
  id_imagem_curiosidade INT NOT NULL,
  PRIMARY KEY (cd_curiosidade),
  
  FOREIGN KEY (id_categoria)
  REFERENCES tb_categoria (cd_categoria),
  
  FOREIGN KEY (id_imagem_curiosidade)
  REFERENCES tb_imagem (cd_imagem)
);


-- -----------------------------------------------------
-- Table tb_pedido
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS tb_pedido (
  cd_pedido INT NOT NULL AUTO_INCREMENT,
  dt_pedido DATETIME NOT NULL,
  PRIMARY KEY (cd_pedido)   
);


-- -----------------------------------------------------
-- Table tb_produto_pedido
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS tb_produto_pedido (
  id_produto INT NOT NULL,
  id_pedido INT NOT NULL,
  PRIMARY KEY (id_produto, id_pedido),
  
    FOREIGN KEY (id_produto)
    REFERENCES tb_produto (cd_produto),
    
    FOREIGN KEY (id_pedido)
    REFERENCES tb_pedido (cd_pedido)
    
);

