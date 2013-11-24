<?php

	Class Pedido {

		private $idPedido;
		private $idCliente;
		private $dataPedido;
		private $pedidoItens = array();

		public function setIdPedido( $idPedido ) { $this->idPedido = $idPedido; }
		public function getIdPedido() { return $this->idPedido; }

		public function setIdCliente( $idCliente ) { $this->idCliente = $idCliente; }
		public function getIdCliente() { return $this->idCliente; }

		public function setDataPedido( $dataPedido ) { $this->dataPedido = $dataPedido; }
		public function getDataPedido() { return $this->dataPedido; }

		public function setPedidoItens( $pedidoItens ) { $this->pedidoItens = $pedidoItens; }
		public function getPedidoItens() { return $this->pedidoItens; }

	}

?>