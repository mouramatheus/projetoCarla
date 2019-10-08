<?php 
	/**
	 * 
	 */
	class Medicos
	{
		private $nome;
		private $crm;

		public function getNome(){
			return $this->$nome;
		}

		public function setNome($nome){
			//Criar validação
			$this->$nome = $nome;
		}

		public function getCrm(){
			return $crm;
		}

		public function setCrm($crm){
			//Criar validação
			$this->$crm = $crm;
		}
	}//Finaliza classe médico

	class Pacientes{
		private $nome;
		private $dtNasc;
		private $cartaoSus;
		private $procedimentoId;
		private $pendenciasId;
		private $medicoId;
		private $dataPedido;
		private $pacObs;

		public function getNome(){
			return $this->nome;
		}

		public function setNome($nome){
			$this->nome = $nome;
		}

		public function getNasc(){
			return $this->dtNasc;
		}

		public function setNasc($dtNasc){
			$this->dtNasc = $dtNasc;
		}

		public function setCartaoSus($cartaoSus){
			$this->cartaoSus = $cartaoSus;
		}

		public function getCartaoSus(){
			return $this->cartaoSus;
		}

		public function getProcedimentoId(){
			return $this->procedimentoId;
		}

		public function setProcedimentoId($procedimentoId){
			$this->$procedimentoId = $procedimentoId;
		}

		public function getPendenciasId(){
			return $this->pendenciasId;
		}

		public function setPendenciasId($pendenciasId){
			$this->pendenciasId = $pendenciasId;
		}

		public function getMedicoId(){
			return $this->medicoId;
		}

		public function setMedicoId($medicoId){
			$this->medicoId = $medicoId;
		}

		public function getPacObs(){
			return $this->pacObs;
		}

		public function setPacObs($pacObs){
			$this->pacObs = $pacObs;
		}
	}

?>