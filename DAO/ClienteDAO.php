<?php

	Class ClienteDAO extends Conexao {

		public function __construct() {
			parent::conecta();
		}

		public function salvar(Cliente $cliente) {

			if ($cliente->getIdCliente()) {             
				$query = $this->conexao->prepare("UPDATE cliente SET nome = :nome, email = :email, senha = :senha, cpf = :cpf, cep = :cep, logradouro = :logradouro, numero = :numero, complemento = :complemento, bairro = :bairro, estado = :estado, cidade = :cidade, telefone = :telefone, celular = :celular  WHERE idCliente = :idCliente");
				print_r($query);
				$parametros = array(
					":idCliente" => $cliente->getIdCliente(),
					":nome" => $cliente->getNome(), 
					":email" => $cliente->getEmail(), 
					":senha" => $cliente->getSenha(),
					":cpf" => $cliente->getCpf(),
					":cep" => $cliente->getCep(),
					":logradouro" => $cliente->getLogradouro(),
					":numero" => $cliente->getNumero(),
					":complemento" => $cliente->getComplemento(),
					":bairro" => $cliente->getBairro(),
					":estado" => $cliente->getEstado(),
					":cidade" => $cliente->getCidade(),
					":telefone" => $cliente->getTelefone(),
					":celular" => $cliente->getCelular()
				);
				$query->execute($parametros);           
			} else {
				$query = $this->conexao->prepare("INSERT INTO cliente (nome, email, senha, cpf, cep, logradouro, numero, complemento, bairro, estado, cidade, telefone, celular) VALUES (:nome, :email, :senha, :cpf, :cep, :logradouro, :numero, :complemento, :bairro, :estado, :cidade, :telefone, :celular)");
				print_r($query);
				$parametros = array(
					":nome" => $cliente->getNome(), 
					":email" => $cliente->getEmail(), 
					":senha" => $cliente->getSenha(),
					":cpf" => $cliente->getCpf(),
					":cep" => $cliente->getCep(),
					":logradouro" => $cliente->getLogradouro(),
					":numero" => $cliente->getNumero(),
					":complemento" => $cliente->getComplemento(),
					":bairro" => $cliente->getBairro(),
					":estado" => $cliente->getEstado(),
					":cidade" => $cliente->getCidade(),
					":telefone" => $cliente->getTelefone(),
					":celular" => $cliente->getCelular()
				);
				$query->execute($parametros);
			}

		}

		public function excluir( $idCliente ) {

			$query = $this->conexao->prepare("DELETE FROM cliente WHERE idCliente = :idCliente");
			$parametros = array(":idCliente" => $idCliente);
			$query->execute($parametros);           

		}

		public function listar() {

			$query = $this->conexao->query("SELECT * FROM cliente ORDER BY nome");
			$clientes = Array();

			while ( $resultado = $query->fetch ( PDO::FETCH_OBJ ) ) {               
				$cliente = new Cliente;
				$cliente->setIdCliente($resultado->idCliente);
				$cliente->setNome($resultado->nome);
				$cliente->setEmail($resultado->email);
				$cliente->setSenha($resultado->senha);
				$cliente->setCpf($resultado->cpf);
				$cliente->setCep($resultado->cep);
				$cliente->setLogradouro($resultado->logradouro);
				$cliente->setNumero($resultado->numero);
				$cliente->setComplemento($resultado->complemento);
				$cliente->setBairro($resultado->bairro);
				$cliente->setEstado($resultado->estado);
				$cliente->setCidade($resultado->cidade);
				$cliente->setTelefone($resultado->telefone);
				$cliente->setCelular($resultado->celular);


				$clientes[] = $cliente;
			}
			
			return $clientes;

		}

		public function recuperar( $idCliente ) {

			$query = $this->conexao->prepare("SELECT * FROM cliente WHERE idCliente = :idCliente");
			$parametros = array(":idCliente" => $idCliente);
			$query->execute($parametros);

			if ($resultado = $query->fetch(PDO::FETCH_OBJ)) {
				$cliente = new Cliente;
				$cliente->setIdCliente($resultado->idCliente);
				$cliente->setNome($resultado->nome);
				$cliente->setEmail($resultado->email);
				$cliente->setSenha($resultado->senha);
				$cliente->setCpf($resultado->cpf);
				$cliente->setCep($resultado->cep);
				$cliente->setLogradouro($resultado->logradouro);
				$cliente->setNumero($resultado->numero);
				$cliente->setComplemento($resultado->complemento);
				$cliente->setBairro($resultado->bairro);
				$cliente->setEstado($resultado->estado);
				$cliente->setCidade($resultado->cidade);
				$cliente->setTelefone($resultado->telefone);
				$cliente->setCelular($resultado->celular);

				return $cliente;
			}

		}

	}

?>