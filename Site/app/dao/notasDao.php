<?php 

require_once 'app/models/notasModel.php';

class notasDao{

	public $con;

	function __construct($con){
		$this->con = $con;
	}

	public function adicionarNota($nota){
		$result = array(
			'error' => null,
			'id' => null
			);
		try {
			$stmt = $this->con->prepare("INSERT INTO notas(tempo_espera,atendente,problema_resolvido) VALUES(?,?,?)");
			$stmt->bindValue(1,$nota->geTempoEspera());
			$stmt->bindValue(2,$nota->getAtendente());
			$stmt->bindValue(3,$nota->getProblemaResolvido());
			$stmt->execute();
			$result['id'] = $this->con->lastInsertId();
		} catch (PDOException  $e) {
			$result['error']=$e->errorInfo[1];
		}
		return $result;
	}

	public function removerNota($id){
		try {
			$stmt = $this->con->prepare("DELETE FROM notas WHERE id_nota = ?");
			$stmt->bindParam(1,$id);
			$stmt->execute();
		} catch (PDOException $e) {
			return $e;
		}
	}	

	public function alterarAtendente($cliente){
		$result = array(
			'error' => null
			);
		try {
			$stmt = $this->con->prepare("UPDATE notas SET  tempo_espera = ?,atendimento = ?,problema_resolvido = ? WHERE id_nota = ?");
			$stmt->bindValue(1,$nota->geTempoEspera());
			$stmt->bindValue(2,$nota->getAtendente());
			$stmt->bindValue(3,$nota->getProblemaResolvido());
			$stmt->bindValue(4,$nota->getIdNota());
			$stmt->execute();
		} catch (PDOException  $e) {
			$result['error']=$e->errorInfo[1];
		}
		return $result;
	}

	public function buscarAll(){
		$result = array(
			'error' => null,
			'data' => null
			);
		try {
			$notas = new ArrayObject(); 
			$rs = $this->con->query("SELECT * FROM notas");
			$rss = $rs->fetchAll(PDO::FETCH_OBJ);
			foreach ($rss as $res) {
				$nota = new notasModel();
				$nota->setIdNota($res->id_nota);
				$nota->setTempoEspera($res->nome);
				$nota->setAtendente($res->email);
				$nota->setProblemaResolvido($res->telefone);
				$notas ->append($nota);
			}
				$result['data'] = $notas;
		} catch (PDOException  $e) {
			$result['error']=$e->errorInfo[1];
		}
		return $result;
	}

	public function buscarId($id){
		$result = array(
			'error' => null,
			'data' => null
			);
		try {
			$nota = new notasModel();
			$rs = $this->con->prepare("SELECT * FROM notas where id_nota =:id");
			$rs->bindValue(':id', $id, PDO::PARAM_INT);
			$rs->execute();
			$res = $rs->fetch(PDO::FETCH_OBJ);
			if ($res) {
				$nota->setIdNota($res->id_nota);
				$nota->setTempoEspera($res->nome);
				$nota->setAtendente($res->email);
				$nota->setProblemaResolvido($res->telefone);
			}
				$result['data'] = $nota;
		} catch (PDOException  $e) {
			$result['error']=$e->errorInfo[1];
		}
		return $result;
	}



}
?>