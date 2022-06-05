class MyHeader extends HTMLElement{
    constructor(){
        super()
        this.innerHTML = `
            <header id="header">
                <div class="container-header">
                    <div class="menu">
                        <a id="link-logo" href="#"><img id="logo" src="../assets/images/aydyBrancoAzul.png" alt="logo" /></a>
                    </div>
                    <ul>
                        <li>
                            <a href="http://www.uniararas.br/" id="linkFHO">A FHO</a>
                        </li>
                        <li>
                            <a href="../login/login.html"><button class="btn" id="btnLogin" >ENTRAR</button></a>
                        </li>
                    </ul>
                </div>
            </header>
        `
    }
}

customElements.define('my-header', MyHeader)

//função para recuperar caminho imagem
var url  = new Array();
url = window.location.pathname.split('/');

$(document).ready(function () {
    if((
        url[5] === "home.html" ||
        url[5] == "cadastroEmpresas.html" ||
        url[5] == "cadastroVaga.html" ||
        url[5] == "contato.html" ||
        url[5] == "curriculo.html" ||
        url[5] == "curriculoView.html" ||
        url[5] == "empresa.html" ||
        url[5] == "index.html" ||
        url[5] == "login.html" || 
        url[5] == "vagas.php"
    )) {
      $("#logo").attr("src", "../../assets/images/aydyBrancoAzul.png");
    }
});
  