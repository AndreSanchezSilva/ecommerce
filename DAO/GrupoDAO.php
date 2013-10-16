<?php

	Class GrupoDAO extends Conexao {

		public function __construct() {
			parent::conecta();
		}

		public function salvar(Grupo $grupo) {

		}

		public function excluir( $idGrupo ) {

	    	$query = $this->conexao->prepare("DELETE FROM grupo WHERE idGrupo = :idGrupo");
	    	$query->bindParam(":idGrupo", $idGrupo , PDO::PARAM_INT);
    		$query->execute();			

		}

		public function listar() {

			$query = $this->conexao->query("SELECT * FROM grupo ORDER BY nome");
		    $grupos = Array();

		    while ( $resultado = $query->fetch ( PDO::FETCH_OBJ ) ) {		    	
		    	$grupo = new Grupo;
		    	$grupo->setIdGrupo($resultado->idGrupo);
		    	$grupo->setNome($resultado->nome);

		    	$grupos[] = $grupo;
		    }
		    
		    return $grupos;

		}

		public function recuperar( $idGrupo ) {

 		    $query = $this->conexao->prepare("SELECT * FROM grupo WHERE idGrupo = :idGrupo ORDER BY nome");
		    $query->bindParam(":idGrupo", $idGrupo , PDO::PARAM_INT);
		    $query->execute();

		    if ($resultado = $query->fetch(PDO::FETCH_OBJ)) {

			    $grupo = new Grupo;
		    	$grupo->setIdGrupo($resultado->idGrupo);
		    	$grupo->setNome($resultado->nome);

		    	return $grupo;
	    	}

		}

	}

?>