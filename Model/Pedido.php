<?php

	Class Pedido {

		private $idPedido;
		private $idCliente;
		private $dataPedido;

		public function setIdPedido( $idPedido ) { $this->idPedido = $idPedido; }
		public function getIdPedido() { return $this->idPedido; }

		public function setIdCliente( $idCliente ) { $this->idCliente = $idCliente; }
		public function getIdCliente() { return $this->idCliente; }

		public function setDataPedido( $dataPedido ) { $this->dataPedido = $dataPedido; }
		public function getDataPedido() { return $this->dataPedido; }

	}

?>