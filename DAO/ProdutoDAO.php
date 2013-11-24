<?php

	Class ProdutoDAO extends Conexao {

		public function __construct() {
			parent::conecta();
		}

		public function salvar(Produto $produto) {

			if ($produto->getIdProduto()) {             
				$query = $this->conexao->prepare("UPDATE produto SET idSubGrupo = :idSubGrupo, nome = :nome, preco = :preco, detalhes = :detalhes WHERE idProduto = :idProduto");
				$parametros = array(
					":idProduto" => $produto->getIdProduto(),
					":idSubGrupo" => $produto->getIdSubGrupo(),
					":nome" => $produto->getNome(), 
					":preco" => $produto->getPreco(),
					":detalhes" => $produto->getDetalhes()
				);
				$query->execute($parametros); 
				        
			} else {
				$query = $this->conexao->prepare("INSERT INTO produto (idSubGrupo, nome, preco, detalhes) VALUES (:idSubGrupo, :nome, :preco, :detalhes)");
				$parametros = array(
					":idSubGrupo" => $produto->getIdSubGrupo(),
					":nome" => $produto->getNome(), 
					":preco" => $produto->getPreco(),
					":detalhes" => $produto->getDetalhes()
				);
				$query->execute($parametros);
				$idProduto = $this->conexao->lastInsertId();
				if (is_array($produto->getFotos())) {
					$fotos = $produto->getFotos();
				    foreach ($fotos as $foto) {
				    	$query = $this->conexao->prepare("INSERT INTO produtoFoto (idProduto, url) VALUES (:idProduto, :url)");
						$parametros = array(
							":idProduto" => $idProduto,
							":url" => $foto
						);
						$query->execute($parametros);
				    }
				}  
			}

		}

		public function excluir( $idProduto ) {

			$query = $this->conexao->prepare("DELETE FROM produto WHERE idProduto = :idProduto");
			$parametros = array(":idProduto" => $idProduto);
			$query->execute($parametros);           

		}

		public function listar() {

			$query = $this->conexao->query("SELECT p.*, (SELECT url FROM produtoFoto WHERE idProduto = p.idProduto ORDER BY idFoto LIMIT 1) AS foto FROM produto p ORDER BY p.nome");
			$produtos = Array();

			while ( $resultado = $query->fetch ( PDO::FETCH_OBJ ) ) {

				$produto = new Produto;
				$produto->setIdProduto($resultado->idproduto);
				$produto->setIdSubGrupo($resultado->idsubgrupo);
				$produto->setNome($resultado->nome);
				$produto->setPreco($resultado->preco);
				$produto->setDetalhes($resultado->detalhes);
				$produto->setFotos(Array($resultado->foto));

				$produtos[] = $produto;
			}
			
			return $produtos;

		}

		public function listarPorGrupo( $idGrupo ) {

			$query = $this->conexao->prepare("SELECT p.*, (SELECT url FROM produtoFoto WHERE idProduto = p.idProduto ORDER BY idFoto LIMIT 1) AS foto FROM produto p 
				INNER JOIN subGrupo sg ON sg.idSubGrupo = p.idSubGrupo 
				INNER JOIN grupo g ON sg.idGrupo = g.idGrupo WHERE g.idGrupo = :idGrupo");
			$parametros = array(":idGrupo" => $idGrupo);
			$query->execute($parametros);

			$produtos = Array();

			while ( $resultado = $query->fetch ( PDO::FETCH_OBJ ) ) {

				$produto = new Produto;
				$produto->setIdProduto($resultado->idproduto);
				$produto->setIdSubGrupo($resultado->idsubgrupo);
				$produto->setNome($resultado->nome);
				$produto->setPreco($resultado->preco);
				$produto->setDetalhes($resultado->detalhes);
				$produto->setFotos(Array($resultado->foto));

				$produtos[] = $produto;
			}
			
			return $produtos;

		}

		public function listarPorSubGrupo( $idSubGrupo ) {

			$query = $this->conexao->prepare("SELECT p.*, (SELECT url FROM produtoFoto WHERE idProduto = p.idProduto ORDER BY idFoto LIMIT 1) AS foto FROM produto p WHERE p.idSubGrupo = :idSubGrupo");
			$parametros = array(":idSubGrupo" => $idSubGrupo);
			$query->execute($parametros);

			$produtos = Array();

			while ( $resultado = $query->fetch ( PDO::FETCH_OBJ ) ) {

				$produto = new Produto;
				$produto->setIdProduto($resultado->idproduto);
				$produto->setIdSubGrupo($resultado->idsubgrupo);
				$produto->setNome($resultado->nome);
				$produto->setPreco($resultado->preco);
				$produto->setDetalhes($resultado->detalhes);
				$produto->setFotos(Array($resultado->foto));

				$produtos[] = $produto;
			}
			
			return $produtos;

		}

		public function recuperar( $idProduto ) {

			$query = $this->conexao->prepare("SELECT * FROM produto WHERE idProduto = :idProduto");
			$parametros = array(":idProduto" => $idProduto);
			$query->execute($parametros);

			if ($resultado = $query->fetch(PDO::FETCH_OBJ)) {

				$produto = new Produto;
				$produto->setIdProduto($resultado->idproduto);
				$produto->setIdSubGrupo($resultado->idsubgrupo);
				$produto->setNome($resultado->nome);
				$produto->setPreco($resultado->preco);
				$produto->setDetalhes($resultado->detalhes);

				$query = $this->conexao->prepare("SELECT url FROM produtoFoto WHERE idProduto = :idProduto ORDER BY idFoto");
				$parametros = array(":idProduto" => $idProduto);
				$query->execute($parametros);

				$fotos = array();

				while ( $resultadoFotos = $query->fetch ( PDO::FETCH_OBJ ) ) {
					$fotos[] = $resultadoFotos->url;
				}

				$produto->setFotos($fotos);

				return $produto;
			}

		}

	}

?>