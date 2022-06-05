<?php
  session_start();
  $user = $_SESSION['usuario_logado'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Aydy - Cadastre sua Vaga</title>
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</head>

<body>

  <my-header></my-header>

<section class="about_section layout_paddingMenor">
    <div class="container-sm ContainarAjustes">
        <div class="divTitulo">
            <h1>Cadastre uma Vaga de Estágio</h1>
            <h4>Venha fazer parte do nosso time</h4>
            <p>Não se Esqueça! Quanto mais informações oferecidas, mais chances de se tornar uma <strong>SUPERVAGA</strong></p>
        </div>
        <br>
        <br>
        <form action="../../php/cadVagas.php" method="POST" class="row g-3" enctype="multipart/form-data">
            <div class="row spaceRow">
                <div class="col-md-5">
                    <label for="nomeVaga" class="form-label">Nome da vaga</label>
                    <input type="text" class="form-control" id="nome" name="nome">
                </div>
                <div class="col-md-4">
                    <label for="nomeFantasia" class="form-label">Área de Atuação</label>
                    <select class="form-select" aria-label="Default select example" id="area" name="area">
                        <option selected>Selecione uma área</option>
                        <option value="EDUCAÇÃO">Educação</option>
                        <option value="NEGÓCIOS">Negócios</option>
                        <option value="SAÚDE">Saúde</option>
                        <option value="ENGENHARIA">Engenharia</option>
                        <option value="TECNOLOGIA">Tecnologia</option>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="empresa" class="form-label">CNPJ Empresa</label>
                    <input type="text" readonly class="form-control" id="empresa" name="empresa" value="<?php echo $user ?>">
                </div>
            </div>
            <div class="row spaceRow">
                <div class="col-md-4">
                    <label for="cidade" class="form-label">Cidade</label>
                    <input type="text" class="form-control" id="cidade" name="cidade">
                </div>
                <div class="col-md-4">
                    <label for="estado" class="form-label">Estado</label>
                    <select class="form-select" aria-label="Default select example" id="estado" name="estado">
                        <option selected>Selecione o Estado</option>
                        <option value="AC">Acre</option>
                        <option value="AL">Alagoas</option>
                        <option value="AP">Amapá</option>
                        <option value="AM">Amazonas</option>
                        <option value="BA">Bahia</option>
                        <option value="CE">Ceará</option>
                        <option value="ES">Espirito Santo</option>
                        <option value="GO">Goiás</option>
                        <option value="MA">Maranhão</option>
                        <option value="MT">Mato Grosso</option>
                        <option value="MS">Mato Grosso do Sul</option>
                        <option value="MG">Minas Gerais</option>
                        <option value="PA">Pará</option>
                        <option value="PB">Paraíba</option>
                        <option value="PR">Paraná</option>
                        <option value="PE">Pernambuco</option>
                        <option value="PI">Piauí</option>
                        <option value="RJ">Rio de Janeiro</option>
                        <option value="RN">Rio Grande do Norte</option>
                        <option value="RS">Rio Grande do Sul</option>
                        <option value="RO">Rondônia</option>
                        <option value="RR">Roraima</option>
                        <option value="SC">Santa Catarina</option>
                        <option value="SP">São Paulo</option>
                        <option value="SE">Sergipe</option>
                        <option value="TO">Tocantins</option>
                        <option value="DF">Distrito Federal</option>
                    </select>
                </div>
                    <div class="col-md-4">
                    <label for="estado" class="form-label">Regime de Trabalho</label>
                    <select class="form-select" aria-label="Default select example" id="regime" name="regime">
                        <option selected>Selecione o regime de trabalho</option>
                        <option value="Presencial">Presencial</option>
                        <option value="Remoto">Remoto</option>
                        <option value="Hibrido">Hibrido</option>
                    </select>
                </div>
            </div>

            <div class="row spaceRow">
                <div class="col-md-4">
                    <label for="dataInicio" class="form-label">Inicio do Estágio</label>
                    <input type="date" class="form-control" id="dtInicio" name="dtInicio">
                </div>
                <div class="col-md-4">
                    <label for="dataTermino" class="form-label">Término do Estágio</label>
                    <input type="date" class="form-control" id="dtFim" name="dtFim">
                </div>
                <div class="col-md-4">
                    <label for="remuneracao" class="form-label">Remunerção</label>
                    <input type="num" class="form-control" id="remuneracao" name="remuneracao" placeholder="800.00">
                </div>
            </div>

            <div class="row spaceRow">
                <div class="form-floating">
                    <textarea class="form-control" placeholder="Descreva sua vaga" id="descricao" name="descricao" style="height: 100px"></textarea>
                    <label for="floatingTextarea2">Descreva sua vaga</label>
                </div>
            </div>

            <div class="row spaceRow">
                <div class="mb-3">
                    <label for="imagem" class="form-label">Imagem da Vaga</label>
                    <input class="form-control" type="file" id="imgVaga" name="imgVaga">
                </div>
            </div>
            <button type="submit" name="btnCadVaga" class="btnCadastrar">Cadastrar</button>
        </form>
    </div>
</section>
<my-footer></my-footer>

<script src="../../js/myHeader.js" defer></script>
<script src="../../js/myFooter.js" defer></script>

</body>

</html>