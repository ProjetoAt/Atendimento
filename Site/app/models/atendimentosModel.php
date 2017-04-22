<?php 

class atendimentosModel{

	private $id_atendimento;
	private $atendente_id;
	private $cliente_id;
	private $nota_id;
	private $codigo;
	private $preenchido;
	private $reclamacao;
	private $data_cadastro;

    /**
     * Gets the value of id_atendimento.
     *
     * @return mixed
     */
    public function getIdAtendimento()
    {
        return $this->id_atendimento;
    }

    /**
     * Sets the value of id_atendimento.
     *
     * @param mixed $id_atendimento the id atendimento
     *
     * @return self
     */
    public function setIdAtendimento($id_atendimento)
    {
        $this->id_atendimento = $id_atendimento;

        return $this;
    }

    /**
     * Gets the value of atendente_id.
     *
     * @return mixed
     */
    public function getAtendenteId()
    {
        return $this->atendente_id;
    }

    /**
     * Sets the value of atendente_id.
     *
     * @param mixed $atendente_id the atendente id
     *
     * @return self
     */
    public function setAtendenteId($atendente_id)
    {
        $this->atendente_id = $atendente_id;

        return $this;
    }

    /**
     * Gets the value of cliente_id.
     *
     * @return mixed
     */
    public function getClienteId()
    {
        return $this->cliente_id;
    }

    /**
     * Sets the value of cliente_id.
     *
     * @param mixed $cliente_id the cliente id
     *
     * @return self
     */
    public function setClienteId($cliente_id)
    {
        $this->cliente_id = $cliente_id;

        return $this;
    }

    /**
     * Gets the value of nota_id.
     *
     * @return mixed
     */
    public function getNotaId()
    {
        return $this->nota_id;
    }

    /**
     * Sets the value of nota_id.
     *
     * @param mixed $nota_id the nota id
     *
     * @return self
     */
    public function setNotaId($nota_id)
    {
        $this->nota_id = $nota_id;

        return $this;
    }

    /**
     * Gets the value of codigo.
     *
     * @return mixed
     */
    public function getCodigo()
    {
        return $this->codigo;
    }

    /**
     * Sets the value of codigo.
     *
     * @param mixed $codigo the codigo
     *
     * @return self
     */
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;

        return $this;
    }

    /**
     * Gets the value of preenchido.
     *
     * @return mixed
     */
    public function getPreenchido()
    {
        return $this->preenchido;
    }

    /**
     * Sets the value of preenchido.
     *
     * @param mixed $preenchido the preenchido
     *
     * @return self
     */
    public function setPreenchido($preenchido)
    {
        $this->preenchido = $preenchido;

        return $this;
    }

    /**
     * Gets the value of reclamacao.
     *
     * @return mixed
     */
    public function getReclamacao()
    {
        return $this->reclamacao;
    }

    /**
     * Sets the value of reclamacao.
     *
     * @param mixed $reclamacao the reclamacao
     *
     * @return self
     */
    public function setReclamacao($reclamacao)
    {
        $this->reclamacao = $reclamacao;

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

