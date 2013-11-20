<?php

	Class Produto {

		private $idProduto;
		private $idSubGrupo;
		private $nome;
		private $preco;
		private $detalhes;
		private $fotos = array();

		public function setIdProduto( $idProduto ) { $this->idProduto = $idProduto; }
		public function getIdProduto() { return $this->idProduto; }

		public function setIdSubGrupo( $idSubGrupo ) { $this->idSubGrupo = $idSubGrupo; }
		public function getIdSubGrupo() { return $this->idSubGrupo; }

		public function setNome( $nome ) { $this->nome = $nome; }
		public function getNome() { return $this->nome; }

		public function setPreco( $preco ) { $this->preco = $preco; }
		public function getPreco() { return $this->preco; }

		public function setDetalhes( $detalhes ) { $this->detalhes = $detalhes; }
		public function getDetalhes() { return $this->detalhes; }

		public function setFotos( $fotos ) { $this->fotos = $fotos; }
		public function getFotos() { return $this->fotos; }

	}

?>