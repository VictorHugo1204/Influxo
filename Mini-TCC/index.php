<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <script src="https://kit.fontawesome.com/373f50ec1a.js" crossorigin="anonymous"></script>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="bootstrap-4.1.3-dist/css/bootstrap.min.css">
    <link rel="icon" href="Imagem/logo-branco.png">
    <title>Loja Influxo | Moda Feminina e Masculina</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" id="menu">
        <a class="navbar-brand" href="#">
            <img src="Imagem/Influxo1.png" alt="Logo">
          </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Alterna navegação">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
          <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item active">
              <a class="nav-link" href="#">Início <span class="sr-only">(Página atual)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Produtos</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Feminino</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Masculino</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Acessórios</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Marcas</a>
            </li>
          </ul>
          <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" id="pesquisa" type="search" placeholder="Pesquisar">
            <button class="btn btn-outline-light my-2 my-sm-0" id="pesq" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
          </form>

          <ul class="nav-list" id="botoes">

            <li class="text-white-"><a href="#" id="cart"><i class="fa-sharp fa-solid fa-cart-shopping"></i>
                    <p>Carrinho</p>
                </a>
            </li>

            <li><a href="#" id="cont"><i class="fa-solid fa-message"></i>
                    <p>Contato</p>
                </a>
            </li>

            <li><a href="#" id="usu"><i class="fa-solid fa-user"></i>
                    <p>Minha Conta</p>
                </a>
            </li>

        </ul>

        </div>
      </nav>

      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="Imagem/lacoste.png" alt="Primeiro Slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="Imagem/nike.png" alt="Segundo Slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="Imagem/nikeconj.png" alt="Terceiro Slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="Imagem/oakley.png" alt="Quarto Slide">
          </div>
          <div class="carousel-item">
            <img class="d-block w-100" src="Imagem/quiksilver.png" alt="Quinto Slide">
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Anterior</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Próximo</span>
        </a>
      </div>

      <div class="container">

      <div style="height: 80px; justify-content: center;"></div>

      <div class="card-deck">
        <div class="card">
          <a href="#"><img class="card-img-top" src="Imagem/cupom1.png" alt="Imagem de capa do card"></a>
        </div>
        <div class="card">
          <a href=""><img class="card-img-top" src="Imagem/cupom2.png" alt="Imagem de capa do card"></a>
        </div>
        <div class="card">
          <a href=""><img class="card-img-top" src="Imagem/cupom3.png" alt="Imagem de capa do card"></a>
        </div>
        <div class="card">
          <a href=""><img class="card-img-top" src="Imagem/cupom4.png" alt="Imagem de capa do card"></a>
        </div>
      </div>

       <div style="height: 80px; justify-content: center;"></div>

      

        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
          <div class="carousel-inner">
            <div class="carousel-item active">
  
              <div class="card-deck mt-3">
                <div class="card">
                  <img class="card-img-top" src="Imagem/c1.png" alt="Imagem de capa do card">
                  <div class="card-body">
                    <h6 class="card-title">Camisa Nike Corinthians II 2022/23 Torcedor Pro Masculina</h6>
                    <p class="card-text">R$ 249,99<br>
                                         ou 6x de R$ 41,67</p>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">Comprar</button></small>
                  </div>
                </div>
                <div class="card">
                  <img class="card-img-top" src="Imagem/j1.png" alt="Imagem de capa do card">
                  <div class="card-body">
                    <h6 class="card-title">Jaqueta Nike Sportswear Windrunner Masculina</h6>
                    <p class="card-text">R$ 359,99<br>
                                         ou 9x de R$ 40,00</p>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">Comprar</button></small>
                  </div>
                </div>
                <div class="card">
                  <img class="card-img-top" src="Imagem/t1.png" alt="Imagem de capa do card">
                  <div class="card-body">
                    <h6 class="card-title">Tênis Nike Air Zoom Tempo NEXT% Masculino</h6>
                    <p class="card-text">R$ 989,99<br>
                                         ou 12x de R$ 82,50</p>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">Comprar</button></small>
                  </div>
                </div>
              </div>
  
            </div>
            <div class="carousel-item">

              <div class="card-deck mt-3">
                <div class="card">
                  <img class="card-img-top" src="Imagem/puma1.png" alt="Imagem de capa do card">
                  <div class="card-body">
                    <h6 class="card-title">CHUTEIRA FUTURE 3.4 NJR FG/AG BDP CAMPO MASCULINA</h6>
                    <p class="card-text">R$ 549,90<br>
                                         até 10x R$54,99 sem juros</p>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">Comprar</button></small>
                  </div>
                </div>
                <div class="card">
                  <img class="card-img-top" src="Imagem/puma2.png" alt="Imagem de capa do card">
                  <div class="card-body">
                    <h6 class="card-title">CAMISETA ACTIVE SMALL LOGO MASCULINA</h6>
                    <p class="card-text">R$ 119,90<br>
                                         até 10x R$11,99 sem juros</p>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">Comprar</button></small>
                  </div>
                </div>
                <div class="card">
                  <img class="card-img-top" src="Imagem/puma3.png" alt="Imagem de capa do card">
                  <div class="card-body">
                    <h6 class="card-title">MOCHILA PUMA PHASE</h6>
                    <p class="card-text">R$ 179,90<br>
                                         até 10x R$17,99 sem juros</p>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">Comprar</button></small>
                  </div>
                </div>
              </div>

            </div>
            <div class="carousel-item">

              <div class="card-deck mt-3">
                <div class="card">
                  <img class="card-img-top" src="Imagem/adidas1.png" alt="Imagem de capa do card">
                  <div class="card-body">
                    <h6 class="card-title">CHINELO ADILETTE AQUA (UNISSEX)</h6>
                    <p class="card-text">R$ 89,99<br>
                      até 2 x R$45,00 sem juros</p>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">Comprar</button></small>
                  </div>
                </div>
                <div class="card">
                  <img class="card-img-top" src="Imagem/adidas2.png" alt="Imagem de capa do card">
                  <div class="card-body">
                    <h6 class="card-title">LEGGING ADIDAS LINEAR ESSENTIALS</h6>
                    <p class="card-text">R$ 129,99<br>
                      até 3 x R$43,34 sem juros</p>
                  </div>
                  <div class="card-footer">
                    <small class="text-muted"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">Comprar</button></small>
                  </div>
                </div>
                <div class="card">
                  <img class="card-img-top" src="Imagem/adidas3.png" alt="Imagem de capa do card">
                  <div class="card-body">
                    <h6 class="card-title">JAQUETA ADICOLOR NEUCLASSICS</h6>
                    <p class="card-text">R$ 499,99<br>
                      até 10 x R$50,00 sem juros</p>
                  </div>
                    <div class="card-footer">
                      <small class="text-muted"><button class="btn btn-outline-success my-2 my-sm-0" type="submit">Comprar</button></small>
                    </div>
                </div>
              </div>
                
            </div>
          </div>
        </div>

        <div style="height: 80px; justify-content: center;"></div>

        <div class="card mb-3">
          <a href="#"><img class="card-img-top" src="Imagem/PW.png" alt="Imagem de capa do card"></a>
        </div>

        <div style="height: 80px; justify-content: center;"></div>      
      </div>


      <footer class="bg-dark">
        <div class="container-footer">

          <div class="row-footer">

            <div class="footer-col">
                <h5>AJUDA</h5>
                <ul>
                  <li><a href=""> Dúvidas Gerais </a></li>
                  <li><a href=""> Encontre seu Tamanho </a></li>
                  <li><a href=""> Entregas </a></li>
                  <li><a href=""> Pedidos </a></li>
                  <li><a href=""> Trocas e Devoluções </a></li>
                  <li><a href=""> Pagamentos </a></li>
                  <li><a href=""> Corporativo </a></li>
                  <li><a href=""> Fale Conosco </a></li>
                </ul>
            </div>

            <div class="footer-col">
              <h5>INFORMAÇÃO<br> CORPORATIVA</h5>
              <ul>
                <li><a href=""> Sobre Nós </a></li>
                <li><a href=""> Junte-se a nós </a></li>
                <li><a href=""> Imprensa </a></li>
                <li><a href=""> Produtos </a></li>
              </ul>
          </div>

          <div class="footer-col" id="redes">
            <h5>REDES SOCIAIS</h5>
            <a href=""><i class="fa fa-facebook"></i></a>
            <a href=""><i class="fa fa-instagram"></i></a>
            <a href=""><i class="fa fa-twitter"></i></a>
          </div>

          <div class="footer-col" id="pag">
            <h5>FORMAS DE<br> PAGAMENTO</h5>

            <i class="fa-brands fa-cc-mastercard"></i>
            <i class="fa-brands fa-cc-visa"></i>
            <i style="font-size:24px" class="fa">&#xf1f3;</i>
            <i class="fa-brands fa-cc-diners-club"></i><br>
            <i class="fa-brands fa-cc-apple-pay"></i>
            <i class="fa-brands fa-cc-amazon-pay"></i>
            <i style="font-size:24px" class="fa">&#xf1ed;</i>
          </div>

          </div>

        </div>
      </footer>


      

    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <script src="bootstrap-4.1.3-dist/js/bootstrap.min.js"></script>
  </body>
</html>