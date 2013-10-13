<?php

	Class SubGrupo {

		private $idSubGrupo;
		private $idGrupo;
		private $descricao;

		public function setIdSubGrupo( $idSubGrupo ) { $this->idSubGrupo = $idSubGrupo; }
		public function getIdSubGrupo() { return $this->idSubGrupo; }

		public function setIdGrupo( $idGrupo ) { $this->idGrupo = $idGrupo; }
		public function getIdGrupo() { return $this->idGrupo; }

		public function setDescricao( $descricao ) { $this->descricao = $descricao; }
		public function getDescricao() { return $this->descricao; }

	}

?>