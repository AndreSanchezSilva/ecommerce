<?php

	Class UsuarioDAO extends Conexao {

		public function __construct() {
			parent::conecta();
		}

		public function salvar(Usuario $usuario) {

			if ($usuario->getIdUsuario()) {             
				$query = $this->conexao->prepare("UPDATE usuario SET nome = :nome, email = :email, usuario = :usuario, senha = :senha WHERE idUsuario = :idUsuario");
				$parametros = array(
					":idUsuario" => $usuario->getIdUsuario(),
					":nome" => $usuario->getNome(),
					":email" => $usuario->getEmail(),
					":usuario" => $usuario->getUsuario(),
					":senha" => $usuario->getSenha()
				);
				$query->execute($parametros);           
			} else {
				$query = $this->conexao->prepare("INSERT INTO usuario (nome, email, usuario, senha) VALUES (:nome, :email, :usuario, :senha)");
				$parametros = array(
					":nome" => $usuario->getNome(),
					":email" => $usuario->getEmail(),
					":usuario" => $usuario->getUsuario(),
					":senha" => $usuario->getSenha()
				);
				$query->execute($parametros);
			}

		}

		public function excluir( $idUsuario ) {

			$query = $this->conexao->prepare("DELETE FROM usuario WHERE idUsuario = :idUsuario");
			$parametros = array(":idUsuario" => $idUsuario);
			$query->execute($parametros);           

		}

		public function listar() {

			$query = $this->conexao->query("SELECT * FROM usuario ORDER BY nome");
			$usuarios = Array();

			while ( $resultado = $query->fetch ( PDO::FETCH_OBJ ) ) {

				$usuario = new Usuario;
				$usuario->setIdUsuario($resultado->idusuario);
				$usuario->setNome($resultado->nome);
				$usuario->setEmail($resultado->email);
				$usuario->setUsuario($resultado->usuario);
				$usuario->setSenha($resultado->senha);

				$usuarios[] = $usuario;
			}
			
			return $usuarios;

		}

		public function recuperar( $idUsuario ) {

			$query = $this->conexao->prepare("SELECT * FROM usuario WHERE idUsuario = :idUsuario");
			$parametros = array(":idUsuario" => $idUsuario);
			$query->execute($parametros);

			if ($resultado = $query->fetch(PDO::FETCH_OBJ)) {

				$usuario = new Usuario;
				$usuario->setIdUsuario($resultado->idusuario);
				$usuario->setNome($resultado->nome);
				$usuario->setEmail($resultado->email);
				$usuario->setUsuario($resultado->usuario);
				$usuario->setSenha($resultado->senha);

				return $usuario;
			}

		}

	}

?>