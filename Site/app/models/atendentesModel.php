<?php 

class atendentesModel{

	public $id_atendente;
	public $nome;
	public $usuario;
	public $senha;
	public $nivel;
	public $data_cadastro;

    /**
     * Gets the value of id_atendente.
     *
     * @return mixed
     */
    public function getIdAtendente()
    {
        return $this->id_atendente;
    }

    /**
     * Sets the value of id_atendente.
     *
     * @param mixed $id_atendente the id atendente
     *
     * @return self
     */
    public function setIdAtendente($id_atendente)
    {
        $this->id_atendente = $id_atendente;

        return $this;
    }

    /**
     * Gets the value of nome.
     *
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Sets the value of nome.
     *
     * @param mixed $nome the nome
     *
     * @return self
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Gets the value of usuario.
     *
     * @return mixed
     */
    public function getUsuario()
    {
        return $this->usuario;
    }

    /**
     * Sets the value of usuario.
     *
     * @param mixed $usuario the usuario
     *
     * @return self
     */
    public function setUsuario($usuario)
    {
        $this->usuario = $usuario;

        return $this;
    }

    /**
     * Gets the value of senha.
     *
     * @return mixed
     */
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Sets the value of senha.
     *
     * @param mixed $senha the senha
     *
     * @return self
     */
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }

    /**
     * Gets the value of nivel.
     *
     * @return mixed
     */
    public function getNivel()
    {
        return $this->nivel;
    }

    /**
     * Sets the value of nivel.
     *
     * @param mixed $nivel the nivel
     *
     * @return self
     */
    public function setNivel($nivel)
    {
        $this->nivel = $nivel;

        return $this;
    }

    /**
     * Gets the value of data_cadastro.
     *
     * @return mixed
     */
    public function getDataCadastro()
    {
        return $this->data_cadastro;
    }

    /**
     * Sets the value of data_cadastro.
     *
     * @param mixed $data_cadastro the data cadastro
     *
     * @return self
     */
    public function setDataCadastro($data_cadastro)
    {
        $this->data_cadastro = $data_cadastro;

        return $this;
    }
}
?>