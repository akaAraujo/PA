<?php
    if(isset($_POST['btnLogin']))
    {
        login();
    }

function login() {
         $ra = $_POST['ra']; 
         $senha = $_POST['senha'];
         $servidor = "127.0.0.1";
         $usuario = "root";
         $senhabd = "";
         $dbname = "AYDY";
		
		try{
			$conn = mysqli_connect($servidor, $usuario, $senhabd, $dbname);

                $tamanho = strlen($ra);
                
                //ALUNO LOGIN
                if($tamanho <= 6){
                    $result_ra= "SELECT * FROM TB_ALUNO WHERE ALU_RA = '$ra'" ;
                    $result_senha = "SELECT * FROM TB_ALUNO WHERE ALU_SENHA = '$senha'" ;
                
                    $resultado_ra = mysqli_query($conn, $result_ra);
                    $resultado_senha = mysqli_query($conn, $result_senha);
                    echo $senha;
                    if(mysqli_num_rows ($resultado_ra) > 0)
                    {
                        if(mysqli_num_rows ($resultado_senha) > 0)
                        {
                           echo"<script language='javascript' type='text/javascript'>
                           window.location.href='../pages/vagas/vagas.php'
                           </script>";
                        }else
                            {
                                echo"<script language='javascript' types='text/javascript'>
                                alert('Senha Incorreta!');
                                window.location.href='../pages/login/login.html'
                                </script>";  
                            }
                    }
                    else
                        {
                            echo"<script language='javascript' types='text/javascript'>
                            alert('RA Incorreto!');
                            window.location.href='../pages/login/login.html'
                            </script>";  
                         }      
                } //FIM ALUNO LOGIN
                
                //PROFESSOR LOGIN
                if(($tamanho > 6) && ($tamanho < 14)){
                    $result_raprof= "SELECT * FROM TB_PROFESSOR WHERE PROF_LOG = '$ra'" ;
                    $result_senhaprof = "SELECT * FROM TB_PROFESSOR WHERE PROF_SENHA = '$senha'" ;
                
                    $resultado_raprof = mysqli_query($conn, $result_raprof);
                    $resultado_senhaprof = mysqli_query($conn, $result_senhaprof);
                    echo $senha;
                    if(mysqli_num_rows ($resultado_raprof) > 0)
                    {
                        if(mysqli_num_rows ($resultado_senhaprof) > 0)
                        {
                           echo"<script language='javascript' type='text/javascript'>
                           window.location.href='painelAdministrativo.php'
                           </script>";
                        }else
                            {
                                echo"<script language='javascript' types='text/javascript'>
                                alert('Senha Incorreta!');
                                window.location.href='../pages/login/login.html'
                                </script>";  
                            }
                    }
                    else
                        {
                            echo"<script language='javascript' types='text/javascript'>
                            alert('RA Incorreto!');
                            window.location.href='../pages/login/login.html'
                            </script>";  
                         }      
                } //FIM PROFESSOR LOGIN
                
                // EMPRESA LOGIN
                if($tamanho = 14){
                    $result_raemp= "SELECT * FROM TB_EMPRESA WHERE EMP_CNPJ = '$ra'" ;
                    $result_senhaemp = "SELECT * FROM TB_EMPRESA WHERE EMP_SENHA = '$senha'" ;
                
                    $resultado_raemp = mysqli_query($conn, $result_raemp);
                    $resultado_senhaemp = mysqli_query($conn, $result_senhaemp);
                    echo $senha;
                    if(mysqli_num_rows ($resultado_raemp) > 0)
                    {
                        if(mysqli_num_rows ($resultado_senhaemp) > 0)
                        {
                            session_start();
                            $_SESSION['usuario_logado'] = $ra;
                            $user = $_SESSION['usuario_logado'];
                            echo $user;
                            
                           echo"<script language='javascript' type='text/javascript'>
                           window.location.href='../pages/cadastroVaga/cadastroVaga.php'
                           </script>";
                        }else
                            {
                                echo"<script language='javascript' types='text/javascript'>
                                alert('Senha Incorreta!');
                                window.location.href='../pages/login/login.html'
                                </script>";  
                            }
                    }
                    else
                        {
                            echo"<script language='javascript' types='text/javascript'>
                            alert('RA Incorreto!');
                            window.location.href='../pages/login/login.html'
                            </script>";  
                         }      
                } //FIM EMPRESA LOGIN
		}
		catch(PDOException $e)
		{
			echo "Erro: " . $e->getMessage();	
		}
    } // fim do login