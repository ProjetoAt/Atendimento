<?php 

require_once 'app/models/clientesModel.php';

class clientesDao{

	public $con;

	function __construct($con){
		$this->con = $con;
	}

	public function adicionarCliente($cliente){
		$result = array(
			'error' => null,
			'id' => null
			);
		try {
			$stmt = $this->con->prepare("INSERT INTO clientes(nome,email,telefone,cpf,ra) VALUES(?,?,?,?,?)");
			$stmt->bindValue(1,$cliente->getNome());
			$stmt->bindValue(2,$cliente->getEmail());
			$stmt->bindValue(3,$cliente->getTelefone());
			$stmt->bindValue(4,$cliente->getCpf());
			$stmt->bindValue(5,$cliente->getRa());
			$stmt->execute();
			$result['id'] = $this->con->lastInsertId();
		} catch (PDOException  $e) {
			$result['error']=$e->errorInfo[1];
		}
		return $result;
	}

	public function removerCliente($id){
		try {
			$stmt = $this->con->prepare("DELETE FROM clientes WHERE id_cleinte = ?");
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
			$stmt = $this->con->prepare("UPDATE clientes SET nome = ?,email = ?,telefone = ?,cpf = ?,ra = ? WHERE id_cliente = ?");
			$stmt->bindValue(1,$cliente->getNome());
			$stmt->bindValue(2,$cliente->getEmail());
			$stmt->bindValue(3,$cliente->getTelefone());
			$stmt->bindValue(4,$cliente->getCpf());
			$stmt->bindValue(5,$cliente->getRa());
			$stmt->bindValue(6,$cliente->getIdCliente());
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
			$clientes = new ArrayObject(); 
			$rs = $this->con->query("SELECT * FROM clientes");
			$rss = $rs->fetchAll(PDO::FETCH_OBJ);
			foreach ($rss as $res) {
				$cliente = new clientesModel();
				$cliente->setIdCliente($res->id_cliente);
				$cliente->setNome($res->nome);
				$cliente->setEmail($res->email);
				$cliente->setTelefone($res->telefone);
				$cliente->setCpf($res->cpf);
				$cliente->setRa($res->ra);
				$cliente->setDataCadastro($res->data_cadastro);
				$clientes ->append($cliente);
			}
			$result['data'] = $clientes;
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
			$cliente = new clientesModel();
			$rs = $this->con->prepare("SELECT * FROM clientes where id_cliente =:id");
			$rs->bindValue(':id', $id, PDO::PARAM_INT);
			$rs->execute();
			$res = $rs->fetch(PDO::FETCH_OBJ);
			if ($res) {
				$cliente->setIdCliente($res->id_cliente);
				$cliente->setNome($res->nome);
				$cliente->setEmail($res->email);
				$cliente->setTelefone($res->telefone);
				$cliente->setCpf($res->cpf);
				$cliente->setRa($res->ra);
				$cliente->setDataCadastro($res->data_cadastro);
			}
			$result['data'] = $cliente;
		} catch (PDOException  $e) {
			$result['error']=$e->errorInfo[1];
		}
		return $result;
	}
	


	public function buscarCpf($cpf){
		$result = array(
			'error' => null,
			'data' => null
			);
		try {
			$cliente = new clientesModel();
			$rs = $this->con->prepare("SELECT * FROM clientes where cpf =:cpf");
			$rs->bindValue(':cpf', $cpf, PDO::PARAM_INT);
			$rs->execute();
			$res = $rs->fetch(PDO::FETCH_OBJ);
			if ($res) {
				$cliente->setIdCliente($res->id_cliente);
				$cliente->setNome($res->nome);
				$cliente->setEmail($res->email);
				$cliente->setTelefone($res->telefone);
				$cliente->setCpf($res->cpf);
				$cliente->setRa($res->ra);
				$cliente->setDataCadastro($res->data_cadastro);
			}
			$result['data'] = $cliente;
		} catch (PDOException  $e) {
			$result['error']=$e->errorInfo[1];
		}
		return $result;
	}


}
?>