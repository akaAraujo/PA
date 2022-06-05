<?php
    if(isset($_POST['btnCadVaga']))
    {
        salvar();
    }
	
    function salvar()
    {
        $nome = $_POST['nome'];
        $area = $_POST['area'];
        $cidade = $_POST['cidade'];
        $estado = $_POST['estado'];
        $regimeTrabalho = $_POST['regime'];
        $dtInicio = $_POST['dtInicio'];
        $dtFim = $_POST['dtFim'];
        $remuneracao = $_POST['remuneracao'];
        $descricao = $_POST['descricao'];
        $empresa = $_POST['empresa'];
			
		try{
				
			$con = new PDO("mysql:host=localhost;dbname=aydy", "root", "");

            if(isset($_FILES["imgVaga"])){
                $arquivo = $_FILES['imgVaga']['name'];
                //diretorio dos arquivos
                $pasta_dir = "C:/xampp/htdocs/pa/PA/assets/vagas/";
                // Faz o upload da imagem
                $arquivo_nome = $pasta_dir . $arquivo;
                //salva no banco
                move_uploaded_file($_FILES["imgVaga"]['tmp_name'], $arquivo_nome);

                $emp = intval($con->prepare("SELECT EMP_ID FROM TB_EMPRESA WHERE EMP_CNPJ = '$empresa'"));
                $stmt = $con->prepare("INSERT INTO TB_VAGA (VAG_NOME, VAG_EMP, VAG_AREA, VAG_CIDADE, VAG_ESTADO, VAG_REGIME, VAG_DATAINICIO, VAG_DATAFIM, VAG_REMUNERACAO, VAG_DESCRICAO, VAG_IMG) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bindParam (1, $nome);
                $stmt->bindParam (2, $emp);
                $stmt->bindParam (3, $area);
                $stmt->bindParam (4, $cidade);
                $stmt->bindParam (5, $estado);
                $stmt->bindParam (6, $regimeTrabalho);
                $stmt->bindParam (7, $dtInicio);
                $stmt->bindParam (8, $dtFim);
                $stmt->bindParam (9, $remuneracao);
                $stmt->bindParam (10, $descricao);
                $stmt->bindParam (11, $arquivo_nome);
                $stmt->execute();

                header('Location: ../pages/cadastroVaga/cadastroVaga.php');
            }
            else
            {

                $stmt = $con->prepare("INSERT INTO TB_VAGA (VAG_NOME, VAG_EMP, VAG_AREA, VAG_CIDADE, VAG_ESTADO, VAG_REGIME, VAG_DATAINICIO, VAG_DATAFIM, VAG_REMUNERACAO, VAG_DESCRICAO) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bindParam (1, $nome);
                $stmt->bindParam (2, $empresa);
                $stmt->bindParam (3, $area);
                $stmt->bindParam (4, $cidade);
                $stmt->bindParam (5, $estado);
                $stmt->bindParam (6, $regimeTrabalho);
                $stmt->bindParam (7, $dtInicio);
                $stmt->bindParam (8, $dtFim);
                $stmt->bindParam (9, $remuneracao);
                $stmt->bindParam (10, $descricao);
                $stmt->execute();

                header('Location: ../pages/cadastroVaga/cadastroVaga.php');
            }
            

		} 
        catch(PDOException $e){
			echo "Erro: " . $e->getMessage();				
		}
    } // chave do salvar
?> 