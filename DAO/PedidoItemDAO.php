<?php

	Class PedidoItemDAO extends Conexao {

		public function __construct() {
			parent::conecta();
		}

		public function salvar(PedidoItem $pedidoItem) {

			if (($pedidoItem->getIdProduto()&&$pedidoItem->getIdPedido())) {             
				$query = $this->conexao->prepare("UPDATE pedidoItem SET preco = :preco, quantidade = :quantidade WHERE idProduto = :idProduto AND idPedido = :idPedido");
				$parametros = array(
					":idPedido" => $pedidoItem->getIdPedido(), 
					":idProduto" => $pedidoItem->getIdProduto(),
					":preco" => $pedidoItem->getPreco(), 
					":quantidade" => $pedidoItem->getQuantidade()
				);
				$query->execute($parametros);           
			} else {
				$query = $this->conexao->prepare("INSERT INTO pedidoItem (idProduto, idPedido, preco, quantidade) VALUES (:idProduto, :idPedido, :preco, :quantidade)");
				$parametros = array(
					":idPedido" => $pedidoItem->getIdPedido(), 
					":idProduto" => $pedidoItem->getIdProduto(),
					":preco" => $pedidoItem->getPreco(), 
					":quantidade" => $pedidoItem->getQuantidade()
				);
				$query->execute($parametros);
			}

		}

		public function excluir( $idProduto, $idPedido ) {

			$query = $this->conexao->prepare("DELETE FROM pedidoItem WHERE idProduto = :idProduto AND idPedido = :idPedido");
			$parametros = array(":idPedido" => $idPedido, ":idProduto" => $idProduto);
			$query->execute($parametros);           

		}

		public function listar( $idPedido ) {

			$query = $this->conexao->prepare("SELECT * FROM pedidoItem WHERE idPedido = :idPedido");
			$parametros = array(":idPedido" => $idPedido);
			$query->execute($parametros);

			$pedidoItens = array();

			while ( $resultado = $query->fetch ( PDO::FETCH_OBJ ) ) { 

				$pedidoItem = new PedidoItem;
				$pedidoItem->setIdPedido($resultado->idpedido);
				$pedidoItem->setIdProduto($resultado->idproduto);
				$pedidoItem->setPreco($resultado->preco);
				$pedidoItem->setQuantidade($resultado->quantidade);

				$pedidoItens[] = $pedidoItem;
			}
			
			return $pedidoItens;

		}

		public function recuperar( $idPedido, $idProduto ) {

			$query = $this->conexao->prepare("SELECT * FROM pedidoItem WHERE idPedido = :idPedido AND idProduto = :idProduto");
			$parametros = array(":idPedido" => $idPedido, ":idProduto" => $idProduto);
			$query->execute($parametros);

			if ($resultado = $query->fetch(PDO::FETCH_OBJ)) {

				$pedidoItem = new PedidoItem;
				$pedidoItem->setIdPedido($resultado->idpedido);
				$pedidoItem->setIdProduto($resultado->idproduto);
				$pedidoItem->setPreco($resultado->preco);
				$pedidoItem->setQuantidade($resultado->quantidade);


				return $pedidoItem;
			}

		}

	}

?>