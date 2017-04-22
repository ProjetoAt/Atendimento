<?php 

require_once 'app/models/atendentesModel.php';
class atendentesDao{

	public $con;

	function __construct($con){
		$this->con = $con;
	}

	public function adicionarAtendente($atendente){
		try {
			$stmt = $con->prepare("INSERT INTO atendentes(nome,usuario,senha,nivel) VALUES(?,?,?,?)");
			$stmt->bindValue(1,$usuario->getNome());
			$stmt->bindValue(2,$usuario->getUsuario());
			$stmt->bindValue(3,$usuario->getSenha());
			$stmt->bindValue(4,$usuario->getNivel());
			$stmt->execute();
		}catch (PDOException $e) {
			return $e;
		}
	}

	public function removerAtendente($id){
		try {
			$stmt = $con->prepare("DELETE FROM atendentes WHERE id_atendente = ?");
			$stmt->bindParam(1,$id);
			$stmt->execute();
		} catch (PDOException $e) {
			return $e;
		}
	}	

	public function alterarAtendente($usuario){
		try {
			$stmt = $con->prepare("UPDATE usuarios SET nome = ?,usuario = ?,senha = ?,nivel = ? WHERE id_atendente = ?");
			$stmt->bindValue(1,$usuario->getNome());
			$stmt->bindValue(2,$usuario->getUsuario());
			$stmt->bindValue(3,$usuario->getSenha());
			$stmt->bindValue(4,$usuario->getNivel());
			$stmt->bindValue(5,$usuario->getIdUsuario());
			$stmt->execute();
		} catch (PDOException $e) {
			return $e;
		}
	}

	public function buscarAll(){
		//Consulta
		$atendentes = new ArrayObject(); 
		$rs = $con->query("SELECT * FROM atendentes");
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

		return $atendentes;
	}

	public function buscarId($id){
		//Consulta
		$atendente = new atendentesModel();
		$rs = $con->prepare("SELECT * FROM atendente where id_atendente =:id");
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

		}else{
			echo "Registro Inexistente.";
		}

		return $atendente;
	}



}
?>