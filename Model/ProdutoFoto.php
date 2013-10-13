<?php

	Class ProdutoFoto {

		private $idFoto;
		private $idProduto;
		private $url;

		public function setIdFoto( $idFoto ) { $this->idFoto = $idFoto; }
		public function getIdFoto() { return $this->idFoto; }

		public function setIdProduto( $idProduto ) { $this->idProduto = $idProduto; }
		public function getIdProduto() { return $this->idProduto; }

		public function setUrl( $url ) { $this->url = $url; }
		public function getUrl() { return $this->url; }

	}

?>