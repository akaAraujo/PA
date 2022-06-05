<?php
class VagaDAO
{
    public $id;

    public function __construct($id = false)
    {
        if ($id) {
            $this->id = $id;
        }
    }

     public function confirmar()
    {
        $sql = "UPDATE TB_VAGA SET VAG_SITUACAO = 'APROVADA' WHERE VAG_ID = ". $this->id;	
		
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=aydy', 'root', '');
        $conexao->exec($sql);
    }
	
	 public function desmarcar()
    {
        $sql = "UPDATE TB_VAGA SET VAG_SITUACAO = 'NEGADA' WHERE VAG_ID = ". $this->id;	
		
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=aydy', 'root', '');
        $conexao->exec($sql);
    }

    public function excluir()
    {
        $sql = "DELETE FROM TB_VAGA WHERE VAG_ID=". $this->id;
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=aydy', 'root', '');
        $conexao->exec($sql);
    }

}
?>