<?php 

require_once 'app/models/atendentesModel.php';
class atendentesDao{

	public $con;

	function __construct($con){
		$this->con = $con;
	}

	public function adicionarAtendente($atendente){
		$result = array(
			'error' => null,
			'id' => null
			);
		try {
			$stmt = $this->con->prepare("INSERT INTO atendentes(nome,usuario,senha,nivel) VALUES(?,?,?,?)");
			$stmt->bindValue(1,$atendente->getNome());
			$stmt->bindValue(2,$atendente->getUsuario());
			$stmt->bindValue(3,$atendente->getSenha());
			$stmt->bindValue(4,$atendente->getNivel());
			$stmt->execute();
			$result['id'] = $this->con->lastInsertId();
		} catch (PDOException  $e) {
			$result['error']=$e->errorInfo[1];
		}
		return $result;
	}

	public function removerAtendente($id){
		try {
			$stmt = $this->con->prepare("DELETE FROM atendentes WHERE id_atendente = ?");
			$stmt->bindParam(1,$id);
			$stmt->execute();
		} catch (PDOException $e) {
			return $e;
		}
	}	

	public function alterarAtendente($atendente){
		$result = array(
			'error' => null
			);
		try {
			$stmt = $this->con->prepare("UPDATE usuarios SET nome = ?,usuario = ?,senha = ?,nivel = ? WHERE id_atendente = ?");
			$stmt->bindValue(1,$atendente->getNome());
			$stmt->bindValue(2,$atendente->getUsuario());
			$stmt->bindValue(3,$atendente->getSenha());
			$stmt->bindValue(4,$atendente->getNivel());
			$stmt->bindValue(5,$atendente->getIdUsuario());
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
			$atendentes = new ArrayObject(); 
			$rs = $this->con->query("SELECT * FROM atendentes");
			$rss = $rs->fetchAll(PDO::FETCH_OBJ);
			foreach ($rss as $res) {
				$atendente = new atendentesModel();
				$atendente->setIdAtendente($res->id_atendente);
				$atendente->setNome($res->nome);
				$atendente->setUsuario($res->usuario);
				$atendente->setSenha($res->senha);
				$atendente->setNivel($res->nivel);
				$atendente->setDataCadastro($res->data_cadastro);
				$atendentes ->append($atendente);
			}
				$result['data'] = $atendentes;
		} catch (PDOException  $e) {
			$result['error']=$e->errorInfo[1];
		}
		return $result;
	}

	public function buscarAllLogin($usuario,$senha){
		$result = array(
			'error' => null,
			'data' => null
			);
		try {
			$atendentes = new ArrayObject(); 
			$rs = $this->con->prepare("SELECT * FROM atendentes WHERE usuario = :usuario and senha = :senha");
			$rs->bindParam(':usuario', $usuario);
			$rs->bindParam(':senha', $senha);
			$rs->execute();
			$rss = $rs->fetchAll(PDO::FETCH_OBJ);
			foreach ($rss as $res) {
				$atendente = new atendentesModel();
				$atendente->setIdAtendente($res->id_atendente);
				$atendente->setNome($res->nome);
				$atendente->setUsuario($res->usuario);
				$atendente->setSenha($res->senha);
				$atendente->setNivel($res->nivel);
				$atendente->setDataCadastro($res->data_cadastro);
				$atendentes ->append($atendente);
			}
				$result['data'] = $atendentes;
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
			$atendente = new atendentesModel();
			$rs = $this->con->prepare("SELECT * FROM atendente where id_atendente =:id");
			$rs->bindValue(':id', $id, PDO::PARAM_INT);
			$rs->execute();
			$res = $rs->fetch(PDO::FETCH_OBJ);
			if ($res) {
				$atendente->setIdAtendente($res->id_atendente);
				$atendente->setNome($res->nome);
				$atendente->setUsuario($res->usuario);
				$atendente->setSenha($res->senha);
				$atendente->setNivel($res->nivel);
				$atendente->setDataCadastro($res->data_cadastro);
			}
				$result['data'] = $atendente;
		} catch (PDOException  $e) {
			$result['error']=$e->errorInfo[1];
		}
		return $result;
	}



}
?>