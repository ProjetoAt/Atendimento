<?php 

class clientesModel{

	private $id_nota;
	private $tempo_espera;
	private $atendente;
	private $problema_resolvido;

    /**
     * Gets the value of id_nota.
     *
     * @return mixed
     */
    public function getIdNota()
    {
        return $this->id_nota;
    }

    /**
     * Sets the value of id_nota.
     *
     * @param mixed $id_nota the id nota
     *
     * @return self
     */
    public function setIdNota($id_nota)
    {
        $this->id_nota = $id_nota;

        return $this;
    }

    /**
     * Gets the value of tempo_espera.
     *
     * @return mixed
     */
    public function getTempoEspera()
    {
        return $this->tempo_espera;
    }

    /**
     * Sets the value of tempo_espera.
     *
     * @param mixed $tempo_espera the tempo espera
     *
     * @return self
     */
    public function setTempoEspera($tempo_espera)
    {
        $this->tempo_espera = $tempo_espera;

        return $this;
    }

    /**
     * Gets the value of atendente.
     *
     * @return mixed
     */
    public function getAtendente()
    {
        return $this->atendente;
    }

    /**
     * Sets the value of atendente.
     *
     * @param mixed $atendente the atendente
     *
     * @return self
     */
    public function setAtendente($atendente)
    {
        $this->atendente = $atendente;

        return $this;
    }

    /**
     * Gets the value of problema_resolvido.
     *
     * @return mixed
     */
    public function getProblemaResolvido()
    {
        return $this->problema_resolvido;
    }

    /**
     * Sets the value of problema_resolvido.
     *
     * @param mixed $problema_resolvido the problema resolvido
     *
     * @return self
     */
    public function setProblemaResolvido($problema_resolvido)
    {
        $this->problema_resolvido = $problema_resolvido;

        return $this;
    }
}
?>