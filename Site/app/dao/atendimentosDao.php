<?php 

require_once 'app/models/atendimentosModel.php';

class atendimentosDao{

	public $con;

	function __construct($con){
		$this->con = $con;
	}

	public function adicionarAtendimento($atendimento){
		try {
			$stmt = $this->con->prepare("INSERT INTO atendimentos(atendente_id,cliente_id,nota_id,codigo,preenchido,reclamacao) VALUES(?,?,?,?,?,?)");
			$stmt->bindValue(1,$atendimento->getAtendenteId());
			$stmt->bindValue(2,$atendimento->getClienteId());
			$stmt->bindValue(3,$atendimento->getNotaId());
			$stmt->bindValue(4,$atendimento->getCodigo());
			$stmt->bindValue(5,$atendimento->getPreenchido());
			$stmt->bindValue(6,$atendimento->getReclamacao());
			$stmt->execute();
		}catch (PDOException $e) {
			return $e;
		}
	}

	public function removerAtendimento($id){
		try {
			$stmt = $this->con->prepare("DELETE FROM atendimentos WHERE id_nota = ?");
			$stmt->bindParam(1,$id);
			$stmt->execute();
		} catch (PDOException $e) {
			return $e;
		}
	}	

	public function alterarAtendimento($atendimento){
		try {
			$stmt = $this->con->prepare("UPDATE atendimentos SET  atendente_id = ?,cliente_id = ?,nota_id = ?,codigo = ?,preenchido = ?,reclamacao = ? WHERE id_agendamento = ?");
			$stmt->bindValue(1,$atendimento->getAtendenteId());
			$stmt->bindValue(2,$atendimento->getClienteId());
			$stmt->bindValue(3,$atendimento->getNotaId());
			$stmt->bindValue(4,$atendimento->getCodigo());
			$stmt->bindValue(5,$atendimento->getPreenchido());
			$stmt->bindValue(6,$atendimento->getReclamacao());
			$stmt->bindValue(7,$nota->getIdAtendimento());
			$stmt->execute();
		} catch (PDOException $e) {
			return $e;
		}
	}

	public function buscarAll(){
		//Consulta
		$atendimentos = new ArrayObject(); 
		$rs = $this->con->query("SELECT * FROM atendimentos");
		$rss = $rs->fetchAll(PDO::FETCH_OBJ);
		foreach ($rss as $res) {
			$atendimento = new atendimentosModel();
			$atendimento->setIdAtendimento($res->id_atendimento);
			$atendimento->setClienteId($res->cliente_id);
			$atendimento->setNotaId($res->nota_id);
			$atendimento->setCodigo($res->codigo);
			$atendimento->setPreenchido($res->preenchido);
			$atendimento->setReclamacao($res->reclamacao);
			$atendimentos ->append($atendimento);
		}

		return $atendimentos;
	}

	public function buscarId($id){
		//Consulta
		$atendimento = new atendimentosModel();
		$rs = $this->con->prepare("SELECT * FROM atendimentos where id_atendimento =:id");
		$rs->bindValue(':id', $id, PDO::PARAM_INT);
		$rs->execute();
		$res = $rs->fetch(PDO::FETCH_OBJ);
		if ($res) {
			$atendimento->setIdAtendimento($res->id_atendimento);
			$atendimento->setClienteId($res->cliente_id);
			$atendimento->setNotaId($res->nota_id);
			$atendimento->setCodigo($res->codigo);
			$atendimento->setPreenchido($res->preenchido);
			$atendimento->setReclamacao($res->reclamacao);

		}else{
			echo "Registro Inexistente.";
		}

		return $atendimento;
	}



}
?>