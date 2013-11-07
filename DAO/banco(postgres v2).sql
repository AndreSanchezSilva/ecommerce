

--
-- Table structure for table `cliente`
--

CREATE TABLE cliente (  idCliente BIGSERIAL NOT NULL ,
  nome VARCHAR(100) NULL ,
  email VARCHAR(150) NULL ,
  senha VARCHAR(20) NULL ,
  cpf VARCHAR(14) NULL ,
  cep VARCHAR(9) NULL ,
  logradouro VARCHAR(100) NULL ,
  numero VARCHAR(20) NULL ,
  complemento VARCHAR(50) NULL ,
  bairro VARCHAR(50) NULL ,
  estado CHAR(2) NULL ,
  cidade VARCHAR(100) NULL ,
  telefone VARCHAR(20) NULL ,
  celular VARCHAR(20) NULL ,
  PRIMARY KEY (idCliente)
); 


--
-- Table structure for table `grupo`
--

CREATE TABLE grupo (  idGrupo BIGSERIAL NOT NULL ,
  nome VARCHAR(50) NULL ,
  PRIMARY KEY (idGrupo)
); 


--
-- Table structure for table `pedido`
--

CREATE TABLE pedido (  idPedido BIGSERIAL NOT NULL ,
  idCliente BIGINT NOT NULL ,
  dataPedido TIMESTAMP NULL ,
  PRIMARY KEY (idPedido),FOREIGN KEY (idCliente) REFERENCES cliente ( idCliente ) ON UPDATE NO ACTION ON DELETE NO ACTION
); 
CREATE INDEX pedido_compra_FKIndex1 ON pedido (idCliente);


--
-- Table structure for table `subgrupo`
--

CREATE TABLE subgrupo (  idSubGrupo BIGSERIAL NOT NULL ,
  idGrupo BIGINT NOT NULL ,
  descricao VARCHAR(50) NULL ,
  PRIMARY KEY (idSubGrupo),FOREIGN KEY (idGrupo) REFERENCES grupo ( idGrupo ) ON UPDATE NO ACTION ON DELETE NO ACTION
); 
CREATE INDEX subgrupo_subGrupo_FKIndex1 ON subgrupo (idGrupo);


--
-- Table structure for table `produto`
--

CREATE TABLE produto (  idProduto BIGSERIAL NOT NULL ,
  idSubGrupo BIGINT NOT NULL ,
  nome VARCHAR(100) NULL ,
  preco NUMERIC(10,2) NULL ,
  detalhes TEXT NULL ,
  PRIMARY KEY (idProduto),FOREIGN KEY (idSubGrupo) REFERENCES subgrupo ( idSubGrupo ) ON UPDATE NO ACTION ON DELETE NO ACTION
); 
CREATE INDEX produto_produto_FKIndex1 ON produto (idSubGrupo);


--
-- Table structure for table `pedidoitem`
--

CREATE TABLE pedidoitem (  idProduto BIGINT NOT NULL ,
  idPedido BIGINT NOT NULL ,
  preco NUMERIC(10,2) NULL ,
  quantidade BIGINT NULL ,FOREIGN KEY (idPedido) REFERENCES pedido ( idPedido ) ON UPDATE NO ACTION ON DELETE NO ACTION,FOREIGN KEY (idProduto) REFERENCES produto ( idProduto ) ON UPDATE NO ACTION ON DELETE NO ACTION
); 
CREATE INDEX pedidoitem_compraItem_FKIndex1 ON pedidoitem (idPedido);
CREATE INDEX pedidoitem_compraItem_FKIndex2 ON pedidoitem (idProduto);


--
-- Table structure for table `produtofoto`
--

CREATE TABLE produtofoto (  idFoto BIGSERIAL NOT NULL ,
  idProduto BIGINT NOT NULL ,
  url VARCHAR(100) NULL ,
  PRIMARY KEY (idFoto),FOREIGN KEY (idProduto) REFERENCES produto ( idProduto ) ON UPDATE NO ACTION ON DELETE NO ACTION
); 
CREATE INDEX produtofoto_produtoFoto_FKIndex1 ON produtofoto (idProduto);


--
-- Table structure for table `usuario`
--

CREATE TABLE usuario (  idUsuario BIGSERIAL NOT NULL ,
  nome VARCHAR(100) NULL ,
  email VARCHAR(200) NULL ,
  usuario VARCHAR(20) NULL ,
  senha VARCHAR(20) NULL ,
  PRIMARY KEY (idUsuario)
); 

