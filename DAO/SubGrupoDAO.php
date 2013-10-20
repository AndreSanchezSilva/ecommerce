<?php

	Class SubGrupoDAO extends Conexao {

		public function __construct() {
			parent::conecta();
		}

		public function salvar(SubGrupo $subgrupo) {

			if ($subgrupo->getIdSubGrupo()) {             
				$query = $this->conexao->prepare("UPDATE subgrupo SET descricao = :descricao, idGrupo = :idGrupo  WHERE idSubGrupo = :idSubGrupo");
				$parametros = array(
					":descricao" => $subgrupo->getDescricao(), 
					":idGrupo" => $subgrupo->getIdGrupo(), 
					":idSubGrupo" => $subgrupo->getIdSubGrupo()
				);
				$query->execute($parametros);           
			} else {
				$query = $this->conexao->prepare("INSERT INTO subgrupo (idGrupo, descricao) VALUES (:idGrupo, :descricao)");
				$parametros = array(
					":idGrupo" => $subgrupo->getIdGrupo(), 
					":descricao" => $subgrupo->getDescricao()
				);
				$query->execute($parametros);
			}

		}

		public function excluir( $idSubGrupo ) {

			$query = $this->conexao->prepare("DELETE FROM subgrupo WHERE idSubGrupo = :idSubGrupo");
			$parametros = array(":idSubGrupo" => $idSubGrupo);
			$query->execute($parametros);           

		}

		public function listar() {

			$query = $this->conexao->query("SELECT * FROM subgrupo ORDER BY descricao");
			$subgrupos = Array();

			while ( $resultado = $query->fetch ( PDO::FETCH_OBJ ) ) {               
				$subgrupo = new SubGrupo;
				$subgrupo->setIdSubGrupo($resultado->idSubGrupo);
				$subgrupo->setIdGrupo($resultado->idGrupo);
				$subgrupo->setDescricao($resultado->descricao);

				$subgrupos[] = $subgrupo;
			}
			
			return $subgrupos;

		}

		public function recuperar( $idSubGrupo ) {

			$query = $this->conexao->prepare("SELECT * FROM subgrupo WHERE idSubGrupo = :idSubGrupo");
			$parametros = array(":idSubGrupo" => $idSubGrupo);
			$query->execute($parametros);

			if ($resultado = $query->fetch(PDO::FETCH_OBJ)) {

				$subgrupo = new SubGrupo;
				$subgrupo->setIdSubGrupo($resultado->idSubGrupo);
				$subgrupo->setIdGrupo($resultado->idGrupo);
				$subgrupo->setDescricao($resultado->descricao);

				return $subgrupo;
			}

		}

	}

?>