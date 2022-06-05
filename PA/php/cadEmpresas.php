<?php
    if(isset($_POST['btnCadEmpresa']))
    {
        salvar();
    }
	
    function salvar()
    {
            $razao = $_POST['razao'];
            $fantasia = $_POST['fantasia'];
            $cnpj = $_POST['cnpj'];
            $senha = $_POST['senha'];
            $email = $_POST['email'];
            $estado = $_POST['estado'];
            $cidade = $_POST['cidade'];
            $bairro = $_POST['bairro'];
            $rua = $_POST['rua'];
            $numero = $_POST['numero'];
            $cep = $_POST['cep'];
			
			try{
				
			$con = new PDO("mysql:host=localhost;dbname=aydy", "root", "");
            
            if(isset($_FILES["imgEmp"])){
                $arquivo = $_FILES['imgEmp']['name'];
                //diretorio dos arquivos
                $pasta_dir = "C:/xampp/htdocs/pa/PA/assets/empresas/";
                // Faz o upload da imagem
                $arquivo_nome = $pasta_dir . $arquivo;
                //salva no banco
                move_uploaded_file($_FILES["imgEmp"]['tmp_name'], $arquivo_nome);
            
                $stmt = $con->prepare("INSERT INTO TB_EMPRESA (EMP_RAZAO, EMP_FANTASIA, EMP_CNPJ, EMP_SENHA, EMP_EMAIL, EMP_ESTADO, EMP_CIDADE, EMP_BAIRRO, EMP_RUA, EMP_NUMERO, EMP_CEP, EMP_IMG) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bindParam (1, $razao);
                $stmt->bindParam (2, $fantasia);
                $stmt->bindParam (3, $cnpj);
                $stmt->bindParam (4, $senha);
                $stmt->bindParam (5, $email);
                $stmt->bindParam (6, $estado);
                $stmt->bindParam (7, $cidade);
                $stmt->bindParam (8, $bairro);
                $stmt->bindParam (9, $rua);
                $stmt->bindParam (10, $numero);
                $stmt->bindParam (11, $cep);
                $stmt->bindParam (12, $arquivo_nome);
                $stmt->execute();
                header('Location: ../pages/cadastroEmpresas/cadastroEmpresas.html');
                }
            else
            {
    
                $stmt = $con->prepare("INSERT INTO TB_EMPRESA (EMP_RAZAO, EMP_FANTASIA, EMP_CNPJ, EMP_SENHA, EMP_EMAIL, EMP_ESTADO, EMP_CIDADE, EMP_BAIRRO, EMP_RUA, EMP_NUMERO, EMP_CEP) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
                $stmt->bindParam (1, $razao);
                $stmt->bindParam (2, $fantasia);
                $stmt->bindParam (3, $cnpj);
                $stmt->bindParam (4, $senha);
                $stmt->bindParam (5, $email);
                $stmt->bindParam (6, $estado);
                $stmt->bindParam (7, $cidade);
                $stmt->bindParam (8, $bairro);
                $stmt->bindParam (9, $rua);
                $stmt->bindParam (10, $numero);
                $stmt->bindParam (11, $cep);
                $stmt->execute();
    
                header('Location: ../pages/cadastroVaga/cadastroVaga.html');
                }
            }
			catch(PDOException $e)
			{
				echo "Erro: " . $e->getMessage();				
			}
    } // chave do salvar
?>