<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta HTTP-EQUIV="CACHE-CONTROL" CONTENT="NO-CACHE">
  <title>Aydy - Home</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Gloria+Hallelujah&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../../css/app.css">
  <link rel="stylesheet" href="../../css/header.css">
  <link rel="stylesheet" href="../../css/hero.css">
  <link rel="stylesheet" href="../../css/home.css">
  <link rel="stylesheet" href="../../css/footer.css">
  <link rel="stylesheet" href="../../css/style.css">
  <link rel="stylesheet" href="../../css/responsive.css">
  <link rel="stylesheet" href="../../css/bootstrap.css">
  <link rel="stylesheet" href="../../css/vagas.css">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"
    integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous">
  </script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="//code.tidio.co/ntdiz2zalejasvjrwzsjfcdj8vegtcgl.js" async></script>
</head>

<body>

  <my-header></my-header>

  <section class="container about_section layout_padding">
    <div class="container">
      <h2 class="main-heading ">
        Encontre sua Vaga!
      </h2>
      <p class="text-center">
        Aqui você poderá encontrar as melhores vagas de estágio da sua área!<br>
      </p>
    </div>
  </section>
  <!-- FIM SECTION VAGAS -->

  <section class="container">
    <div id="filtros">
      <select>
        <option value="">Selecione uma cidade</option>
      </select>
      <select>
        <option value="">Por Área</option>
        <option value="EDUCAÇÃO">Educação</option>
        <option value="NEGÓCIOS">Negócios</option>
        <option value="SAÚDE">Saúde</option>
        <option value="ENGENHARIA">Engenharia</option>
        <option value="TECNOLOGIA">Tecnologia</option>
      </select>
      <button>
        <img src="../../assets/icons/filter.png" alt="Mais Filtros">
      </button>
    </div>
  </section>

  <?php $con = new PDO("mysql:host=localhost;dbname=aydy", "root", "");
    $sql = 'SELECT VAG_ID, VAG_NOME, VAG_AREA, VAG_CIDADE, VAG_ESTADO, VAG_REGIME, VAG_SITUACAO, VAG_DATAINICIO, VAG_DATAFIM, VAG_REMUNERACAO, VAG_DESCRICAO, VAG_IMG FROM TB_VAGA WHERE VAG_SITUACAO = "APROVADA"';
  ?>

  <section class="container">
    <div class='row  centralizaVagas'>
      <?php
        foreach ($con->query($sql) as $linha){
          echo "<div class='cardVagas'>";
          echo "<div class='vagasSobre'>";
          echo "<p>".$linha['VAG_AREA']."</p>";
          echo "<p id='cidade' class='alignRight'>".$linha['VAG_CIDADE']."/".$linha['VAG_ESTADO']."</p>";
          echo "</div>";
          echo "<div class='vagasDescricao'>";
          echo "<h4>".$linha['VAG_NOME']."</h4>";
          echo "<p id='descVagas'>".mb_strimwidth($linha['VAG_DESCRICAO'], 0, 40, "...")."</h4>";
          echo "</div>";
          echo "<div class='vagasMaisSobre'>";
          echo "<div>";
          echo "<button class='iconVagas btn-outline-primary' data-bs-toggle='modal' data-bs-target='#staticBackdrop' data-bs-toggle='tooltip' data-bs-placement='top' title='Saiba mais'>
                  <img class='iconVagas' src='../../assets/icons/plus.png' alt='Ver Mais' width='35px' height='35px'>
                </button>";
          echo "<button class='iconVagas btn-outline-danger' data-bs-toggle='modal' data-bs-target='#staticBackdrop' data-bs-toggle='tooltip' data-bs-placement='top' title='Favoritar'>
                  <img class='iconVagas' src='../../assets/icons/heart.png' alt='Salvar' width='32px' height='32px'>
                </button>";
          echo "<button class='iconVagas btn-outline-warning' data-bs-toggle='modal' data-bs-target='#staticBackdrop' data-bs-toggle='tooltip' data-bs-placement='top' title='Enviar Curriculo'>
                  <img class='iconVagas' src='../../assets/icons/pipe.png' alt='Enviar Corriculo' width='34px' height='35px'>
                </button>";
          echo "</div>";
          echo "<p id='remuneracao' class='alignRight'>".'R$ '.$linha['VAG_REMUNERACAO']."</p>";
          echo "</div>";
          echo "</div>";
        }
      ?>
    </div>
  </section>

  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Saiba Mais - Vagas <?php echo $linha['VAG_AREA']; ?> </h5>
          <button type="button" class="btnModalClose" data-bs-dismiss="modal" aria-label="Close">Fechar</button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-2">
              <div class="DadosModalEmpresas">
                <?php $con = new PDO("mysql:host=localhost;dbname=aydy", "root", "");
                  $emp = 'SELECT VAG_EMP, EMP_FANTASIA, EMP_NUMERO, EMP_CIDADE, EMP_ESTADO, EMP_EMAIL, EMP_IMG FROM TB_VAGA INNER JOIN TB_EMPRESA ON VAG_EMP = EMP_ID WHERE EMP_ID = VAG_EMP LIMIT 1';
                
                  foreach($con->query($emp) as $empresas)
                  {
                    $urlImg = $linha['VAG_IMG'];
                    $caminho = substr($urlImg, 22, 100); 
                    echo "<img id='imagemVaga' src='../../$caminho' alt='Imagem Vaga'>";
                    echo "<p>".$empresas['EMP_FANTASIA']."</p>";
                    echo "<p>".$empresas['EMP_CIDADE']."/".$empresas['EMP_ESTADO']."</p>";
                    echo "<p>".$empresas['EMP_NUMERO']."</p>";
                    echo "<p>".$empresas['EMP_EMAIL']."</p>";
                  }
                ?>
              </div>
              
              <hr>

              <div class="btnModalAction">
                <button class="btnModal">
                  <img src='../../assets/icons/heart.png' alt="Favoritar Vaga" width='30px' height='30px'>
                  Favoritar Vaga
                </button>
                <button class="btnModal">
                  <img src='../../assets/icons/pipe.png' alt="Enviar Curriculo" width='30px' height='30px'>
                  Enviar Curriculo
                </button>
                <button class="btnModal">
                  <img src='../../assets/icons/plus.png' alt="Ver Empresa" width='30px' height='30px'>
                  Ver Empresa
                </button>
              </div>
            </div>

            <div class="col-10">
              <div class="dadosVagas">
                <div class="row">
                  <div class="col-6">
                    <p id="titleVaga"> <?php echo $linha['VAG_NOME']; ?> </p>
                  </div>
                  <div class="col-6">
                    <p class="alignRight" id="remuneracaoVaga">Remuneração R$:<span> <?php echo $linha['VAG_REMUNERACAO']; ?> </span> </p>
                  </div>
                </div>

                <p> <?php echo $linha['VAG_DESCRICAO']; ?> </p>

                <div class="row">
                  <div class="col-4">
                    <p><span class="campTitulos">Cidade:</span> <?php echo $linha['VAG_CIDADE']."/".$linha['VAG_ESTADO']; ?> </p>
                  </div>
                  <div class="col-4">
                    <p><span class="campTitulos">Regime de Trabalho:</span> PRESENCIAL</p>
                  </div>
                  <div class="col-4">
                    <p class="alignRight"><span class="campTitulos">Previsão para Inicio:</span> <?php echo date("d/m/Y", strtotime($linha['VAG_DATAINICIO'])); ?> </p>
                  </div>
                </div>

                <hr>

                <?php 
                  $urlImg = $linha['VAG_IMG'];
                  $caminho = substr($urlImg, 22, 100); 
                  echo "<img id='imagemVaga' src='../../$caminho' alt='Imagem Vaga'>"; 
                ?>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>

  <my-footer></my-footer>

  <script src="../../js/myHeader.js" defer></script>
  <script src="../../js/myFooter.js" defer></script>

</body>

</html>