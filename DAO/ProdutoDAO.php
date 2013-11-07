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
			}

		}

		public function excluir( $idProduto ) {

			$query = $this->conexao->prepare("DELETE FROM produto WHERE idProduto = :idProduto");
			$parametros = array(":idProduto" => $idProduto);
			$query->execute($parametros);           

		}

		public function listar() {

			$query = $this->conexao->query("SELECT * FROM produto ORDER BY nome");
			$produtos = Array();

			while ( $resultado = $query->fetch ( PDO::FETCH_OBJ ) ) {

				$produto = new Produto;
				$produto->setIdProduto($resultado->idproduto);
				$produto->setIdSubGrupo($resultado->idsubgrupo);
				$produto->setNome($resultado->nome);
				$produto->setPreco($resultado->preco);
				$produto->setDetalhes($resultado->detalhes);

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

				return $produto;
			}

		}

	}

?>