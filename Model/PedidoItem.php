<?php

	Class PedidoItem {

		private $idProduto;
		private $idPedido;
		private $preco;
		private $quantidade;

		public function setIdProduto( $idProduto ) { $this->idProduto = $idProduto; }
		public function getIdProduto() { return $this->idProduto; }

		public function setIdPedido( $idPedido ) { $this->idPedido = $idPedido; }
		public function getIdPedido() { return $this->idPedido; }

		public function setPreco( $preco ) { $this->preco = $preco; }
		public function getPreco() { return $this->preco; }

		public function setQuantidade( $quantidade ) { $this->quantidade = $quantidade; }
		public function getQuantidade() { return $this->quantidade; }

	}

?>