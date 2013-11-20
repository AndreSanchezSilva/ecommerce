<?php
/**
 * classe Record
 * 
 */
abstract class Record
{
	protected $data; // array contendo dados do objeto

	/**
	 * método __construct()
	 * instancia um Active Record. Se passado o $id, já carrega o objeto
	 * @param [$id] = ID do objeto
	 */
	public function __construct($id == NULL)
	{
		if ($id) // se o ID for informado
		{
			// carrega o objeto correspondente
			$object = $this->load($id);
			if ($object)
			{
				$this->fromArray($object->toArray());
			}
		}
	}

	/**
	 * método __clone()
	 * executado quando o objeto for clonado.
	 * limpa o ID para que seja gerado um novo ID para o clone.
	 */
	public function __clone()
	{
		unset($this->id);
	}

	/**
	 * método __set()
	 * executado sempre que uma propriedade for atribuída.
	 */
	private function __set($prop, $value)
	{
		// verifica se existe o método set_<propriedade>
		if (method_exists($this, 'set_'.$prop))
		{
			call_user_func(array($this, 'set_'.$prop), $value);
		}
		else
		{
			if ($value === NULL)
			{
				unset($this->data[$prop]);
			}
			else
			{
				$this->data[$prop] = $value;
			}
		}
	}

	/**
	 * método __get()
	 * executado sempre que uma propriedade for requerida
	 */
	public function __get($prop)
	{
		// verifica se existe o método get_<propriedade>
		if (method_exists($this, 'get_'.$prop))
		{
			// executa o método get_<propriedade>
			return call_user_func(array($this, 'get_'.$prop));
		}
		else
		{
			// retorna o valor da propriedade
			if (isset($this->data[$prop]))
			{
				return $this->data[$prop];
			}
		}
	}

	/**
	 * método getEntity()
	 * retorna o nome da entidade (tabela)
	 */
	private function getEntity()
	{
		// obtem o nome da classe
		$class = get_class($this);

		// retorna a constante da classe TABLENAME
		return constant("{$classe}::TABLENAME");
	}

	/**
	 * método fromArray
	 * preenche os dados do obheto com um array
	 */
	public function fromArray($data)
	{
		$this->data = $data;
	}

	/**
	 * método toArray()
	 * retorna os dados do objeto como array
	 */
	public function toArray()
	{
		return $this->data;
	}

	/**
	 * método store()
	 * armazena o objeto da base da dados e retorna
	 * o número de linhas afetadas pela instrução SQL (zero ou um)
	 */
	public function store()
	{
		// verifica se tem um ID ou se existe na base de dados
		if (empty($this->data['id']) OR (!$this->load($this->id)))
		{
			// incrementa o ID
			if (empty($this->data['id']))
			{
				$this->id = $this->getLast() + 1;
			}

			// ... continuar, página 270
		}
	}
}
?>