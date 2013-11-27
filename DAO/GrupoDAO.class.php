<?php

	Class GrupoDAO extends Conexao {

		public function __construct() {
			parent::conecta();
		}

		public function salvar(Grupo $grupo) {

			if ($grupo->getIdGrupo()) {             
				$query = $this->conexao->prepare("UPDATE grupo SET nome = :nome  WHERE idGrupo = :idGrupo");
				$parametros = array(":nome" => $grupo->getNome(), ":idGrupo" => $grupo->getIdGrupo());
				$query->execute($parametros);           
			} else {
				$query = $this->conexao->prepare("INSERT INTO grupo (nome) VALUES (:nome)");
				$parametros = array(":nome" => $grupo->getNome());
				$query->execute($parametros);
			}
			return ($query) ? true : false;

		}

		public function excluir( $idGrupo ) {

			$query = $this->conexao->prepare("DELETE FROM grupo WHERE idGrupo = :idGrupo");
			$parametros = array(":idGrupo" => $idGrupo);
			$query->execute($parametros);    
			return ($query) ? true : false;      

		}

		public function listar() {

			$query = $this->conexao->query("SELECT * FROM grupo ORDER BY nome");

			//return $query->fetchAll ( PDO::FETCH_OBJ );
			$grupos = Array();

			while ( $resultado = $query->fetch ( PDO::FETCH_OBJ ) ) {               
				$grupo = new Grupo;
				$grupo->setIdGrupo($resultado->idgrupo);
				$grupo->setNome($resultado->nome);

				$grupos[] = $grupo;
			}
			
			return $grupos;
		}

		public function recuperar( $idGrupo ) {

			$query = $this->conexao->prepare("SELECT * FROM grupo WHERE idGrupo = :idGrupo");
			$parametros = array(":idGrupo" => $idGrupo);
			$query->execute($parametros);

			if ($resultado = $query->fetch(PDO::FETCH_OBJ)) {

				$grupo = new Grupo;
				$grupo->setIdGrupo($resultado->idgrupo);
				$grupo->setNome($resultado->nome);

				return $grupo;
			}

			return false;

		}

	}

?>