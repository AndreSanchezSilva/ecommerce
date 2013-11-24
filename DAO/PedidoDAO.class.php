<?php

	Class PedidoDAO extends Conexao {

		public function __construct() {
			parent::conecta();
		}

		public function salvar(Pedido $pedido) {

			if ($pedido->getIdPedido()) {             
				$query = $this->conexao->prepare("UPDATE pedido SET idPedido = :idPedido, idCliente = :idCliente, dataPedido = :dataPedido WHERE idPedido = :idPedido");
				$parametros = array(
					":idPedido" => $pedido->getIdPedido(), 
					":idCliente" => $pedido->getIdCliente(), 
					":dataPedido" => $pedido->getDataPedido()
				);
				$query->execute($parametros);           
			} else {
				$query = $this->conexao->prepare("INSERT INTO pedido (idCliente, dataPedido) VALUES (:idCliente, :dataPedido)");
				$parametros = array(
					":idCliente" => $pedido->getIdCliente(), 
					":dataPedido" => $pedido->getDataPedido()
				);
				$query->execute($parametros);
			}

			return ($query) ? true : false;
		}

		public function excluir( $idPedido ) {

			$query = $this->conexao->prepare("DELETE FROM pedido WHERE idPedido = :idPedido");
			$parametros = array(":idPedido" => $idPedido);
			$query->execute($parametros);  

			return ($query) ? true : false;         

		}

		public function listar() {

			$query = $this->conexao->query("SELECT * FROM pedido");
			$pedidos = Array();

			while ( $resultado = $query->fetch ( PDO::FETCH_OBJ ) ) { 

				$pedido = new Pedido;
				$pedido->setIdPedido($resultado->idpedido);
				$pedido->setIdCliente($resultado->idcliente);
				$pedido->setDataPedido($resultado->datapedido);

				$pedidos[] = $pedido;
			}
			
			return $pedidos;

		}

		public function recuperar( $idPedido ) {

			$query = $this->conexao->prepare("SELECT * FROM pedido WHERE idPedido = :idPedido");
			$parametros = array(":idPedido" => $idPedido);
			$query->execute($parametros);

			if ($resultado = $query->fetch(PDO::FETCH_OBJ)) {

				$pedido = new Pedido;
				$pedido->setIdPedido($resultado->idpedido);
				$pedido->setIdCliente($resultado->idcliente);
				$pedido->setDataPedido($resultado->datapedido);


				return $pedido;
			}

			return false;

		}

	}

?>