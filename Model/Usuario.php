<?php
	
	Class Usuario {

		private $idUsuario;
		private $nome;
		private $email;
		private $usuario;
		private $senha;

		public function setIdUsuario( $idUsuario ) { $this->idUsuario = $idUsuario; }
		public function getIdUsuario() { return $this->idUsuario; }

		public function setNome( $nome ) { $this->nome = $nome; }
		public function getNome() { return $this->nome; }

		public function setEmail( $email ) { $this->email = $email; }
		public function getEmail() { return $this->email; }	

		public function setUsuario( $usuario ) { $this->usuario = $usuario; }
		public function getUsuario() { return $this->usuario; }

		public function setSenha( $senha ) { $this->senha = $senha; }
		public function getSenha() { return $this->senha; }

	}

?>