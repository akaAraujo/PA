@extends('templates.structure')
@section('title', "AY'DY - LOGIN")

@section('conteudo')
  <!--FORMULÁRIO DE LOGIN-->
      <center><div id="login">
        <form method="POST" action="{{route('admin.login.do')}}">
          @csrf
          <br>
          <br>
          <br>
          <br>
          <p>
						<img src="images/logoBody.png" width="200px"><br>
            <label for="email">RA</label><br>
            <input id="email" name="email" required="required" type="text" value='109190' placeholder="Digite seu RA"/>
          </p>
          <p>
            <label for="senha">Senha</label><br>
            <input id="password" name="password" required="required" type="password" value='teste123' placeholder="Digite sua Senha" />
          </p>
           <br>
          <p>
            <input type="submit" value="Logar" color=#0064FF name = "btnLogin"/>
          </p>
        </form>
      </div></center>


  <!-- FIM FORMULÁRIO DE LOGIN -->

  <script type="text/javascript" src="js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="js/bootstrap.js"></script>

@endsection
