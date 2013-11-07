<?php

	Class ProdutoFotoDAO extends Conexao {

		public function __construct() {
			parent::conecta();
		}

		public function salvar(ProdutoFoto $produtoFoto) {

			if ($produtoFoto->getIdFoto()) {             
				$query = $this->conexao->prepare("UPDATE produtoFoto SET idProduto = :idProduto, url = :url WHERE idFoto = :idFoto");
				$parametros = array(
					":idFoto" => $produtoFoto->getIdFoto(), 
					":idProduto" => $produtoFoto->getIdProduto(), 
					":url" => $produtoFoto->getUrl()
				);
				$query->execute($parametros);           
			} else {
				$query = $this->conexao->prepare("INSERT INTO produtoFoto (idProduto, url) VALUES (:idProduto, :url)");
				$parametros = array(
					":idProduto" => $produtoFoto->getIdProduto(), 
					":url" => $produtoFoto->getUrl()
				);
				$query->execute($parametros);
			}

		}

		public function excluir( $idFoto ) {

			$query = $this->conexao->prepare("DELETE FROM produtoFoto WHERE idFoto = :idFoto");
			$parametros = array(":idFoto" => $idFoto);
			$query->execute($parametros);           

		}

		public function listar() {

			$query = $this->conexao->query("SELECT * FROM produtoFoto");
			$fotos = Array();

			while ( $resultado = $query->fetch ( PDO::FETCH_OBJ ) ) { 

				$foto = new ProdutoFoto;
				$foto->setIdFoto($resultado->idfoto);
				$foto->setIdProduto($resultado->idproduto);
				$foto->setUrl($resultado->url);

				$fotos[] = $foto;
			}
			
			return $fotos;

		}

		public function recuperar( $idFoto ) {

			$query = $this->conexao->prepare("SELECT * FROM produtoFoto WHERE idFoto = :idFoto");
			$parametros = array(":idFoto" => $idFoto);
			$query->execute($parametros);

			if ($resultado = $query->fetch(PDO::FETCH_OBJ)) {

				$foto = new ProdutoFoto;
				$foto->setIdFoto($resultado->idfoto);
				$foto->setIdProduto($resultado->idproduto);
				$foto->setUrl($resultado->url);

				return $foto;
			}

		}

	}

?>