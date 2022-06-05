class MyFooter extends HTMLElement{
    constructor(){
        super()
        this.innerHTML = `
            <footer>
                <div>
                    <div  id="footerIconsGrid">
                        <a href="">
                            <img class="iconFooter" src="../assets/icons/facebook.png" alt="Facebook" id="facebook">
                        </a>
                        <a href="">
                            <img class="iconFooter" src="../assets/icons/instagram.png" alt="Instagram" id="instagram">
                        </a>
                        <a href="">
                            <img class="iconFooter" src="../assets/icons/linkedin.png" alt="Linkedin" id="linkedin">
                        </a>
                        <a href="">
                            <img class="iconFooter" src="../assets/icons/twitter.png" alt="Twitter" id="twitter">
                        </a>
                        <a href="">
                            <img class="iconFooter" src="../assets/icons/youtube.png" alt="Youtube" id="youtube">
                        </a>
                    </div>
                    <div>
                        <p>Copyright © 2022 AY'DY - Todos os direitos reservados</p>
                    </div>
                </div>
            </footer>
        `
    }
}

customElements.define('my-footer', MyFooter)

//função para recuperar caminho imagem
var url  = new Array();
url = window.location.pathname.split('/');

$(document).ready(function () {
    if ((url[5] == "home.html" ||
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
      $("#facebook").attr("src", "../../assets/icons/facebook.png");
      $("#instagram").attr("src", "../../assets/icons/instagram.png");
      $("#linkedin").attr("src", "../../assets/icons/linkedin.png");
      $("#twitter").attr("src", "../../assets/icons/twitter.png");
      $("#youtube").attr("src", "../../assets/icons/youtube.png");
    }
});
