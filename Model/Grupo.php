<?php

	Class Grupo {

		private $idGrupo;
		private $nome;

		public function setIdGrupo( $idGrupo ) { $this->idGrupo = $idGrupo; }
		public function getIdGrupo() { return $this->idGrupo; }

		public function setNome( $nome ) { $this->nome = $nome; }
		public function getNome() { return $this->nome; }

	}

?>