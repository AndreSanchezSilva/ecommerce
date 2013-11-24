<?php

	Class Cliente {
		
		private $idCliente;
		private $nome;
		private $email;
		private $senha;
		private $cpf;
		private $cep;
		private $logradouro;
		private $numero;
		private $complemento;
		private $bairro;
		private $estado;
		private $cidade;
		private $telefone;
		private $celular;
		
		public function setIdCliente( $idCliente ){ $this->idCliente = $idCliente; }
		public function getIdCliente(){ return $this->idCliente; }

		public function setNome( $nome ){ $this->nome = $nome; }
		public function getNome(){ return $this->nome; }

		public function setEmail( $email ){ $this->email = $email; }
		public function getEmail(){ return $this->email; }

		public function setSenha( $senha ){ $this->senha = $senha; }
		public function getSenha(){ return $this->senha; }

		public function setCpf( $cpf ){ $this->cpf = $cpf; }
		public function getCpf(){ return $this->cpf; }

		public function setCep( $cep ){ $this->cep = $cep; }
		public function getCep(){ return $this->cep; }

		public function setLogradouro( $logradouro ){ $this->logradouro = $logradouro; }
		public function getLogradouro(){ return $this->logradouro; }

		public function setNumero( $numero ){ $this->numero = $numero; }
		public function getNumero(){ return $this->numero; }

		public function setComplemento( $complemento ){ $this->complemento = $complemento; }
		public function getComplemento(){ return $this->complemento; }

		public function setBairro( $bairro ){ $this->bairro = $bairro; }
		public function getBairro(){ return $this->bairro; }

		public function setEstado( $estado ){ $this->estado = $estado; }
		public function getEstado(){ return $this->estado; }

		public function setCidade( $cidade ){ $this->cidade = $cidade; }
		public function getCidade(){ return $this->cidade; }

		public function setTelefone( $telefone ){ $this->telefone = $telefone; }
		public function getTelefone(){ return $this->telefone; }

		public function setCelular( $celular ){ $this->celular = $celular; }
		public function getCelular(){ return $this->celular; }
		
	}

?>
