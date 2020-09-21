<?php

defined('BASEPATH') OR exit('No direct script access allowed');

Class Netshowme_model extends CI_Model
{
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		$this->load->database();
	}

	public function setsContato($data)
	{

        $data['telefone-contato'] =  str_replace(' ','',str_replace('-','',str_replace(')','',str_replace('(','',$data['telefone-contato'])))); 
        $sql = "INSERT INTO cad_netshowme(cad_nome_net,cad_email_net,cad_telefone_net,cad_mensagem_net,cad_path_arq_net)
                VALUES      ('{$data['nome-contato']}','{$data['email-contato']}',{$data['telefone-contato']},'{$data['msg']}','{$data['arquivo']}')";
		//echo $sql;
		$query = $this->db->query($sql);
		
	}
}
// ----- FIM CLASSE ----- //

?>