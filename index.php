<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Cadastro</title>

  <!-- Custom fonts for this theme -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

  <!-- Theme CSS -->
  <link href="css/freelancer.min.css" rel="stylesheet">

</head>

<body id="page-top">

<?php
    try {
        require('conexao.php');
        // A variável $pdo, usada a seguir, está vindo do conexao.php

        $consulta = $pdo->prepare("SELECT pessoas.nome, pessoas.sobrenome, pessoas.cpf, pessoas.rg, 
        pessoas.data_de_nascimento, pessoas.telefone, pessoas.email
        FROM pessoas 
        JOIN residencia ON residencia.pessoas_id = pessoas.id");
        $consulta->execute();

        $pessoas = $consulta->fetchAll();
        /*
        for($i = 0; $i < count($alunos); $i++) {
            echo "<p>{$alunos[$i]["nome"]}</p>";
        }
        */
        foreach($pessoas as $pessoas) {
            echo "<tr>
                    <td>{$pessoas["nome"]}</td>
                    <td>{$pessoas["sobrenome"]}</td>
                    <td>{$pessoas["data_nasc"]}</td>
                    <td>{$pessoas["cpf"]}</td>
                    <td>{$pessoas["curso"]}</td>
                </tr>";
        }

    } catch(Exception $e) {
        die("Erro de banco de dados: " . $e->getMessage());
    }    
?>     

<?php
    try {
        require('conexao.php');
        // A variável $pdo, usada a seguir, está vindo do conexao.php

        $consulta = $pdo->prepare("SELECT residencia.numero_da_casa, 
        residencia.bairro, residencia.cidade, residencia.estado, residencia.cep
        FROM residencia 
        JOIN pessoas ON pessoas.id = residencia.pessoas_id");
        $consulta->execute();

        $pessoas = $consulta->fetchAll();
        /*
        for($i = 0; $i < count($alunos); $i++) {
            echo "<p>{$alunos[$i]["nome"]}</p>";
        }
        */
        foreach($pessoas as $pessoas) {
            echo "<tr>
                    <td>{$residencia["numero_da_casa"]}</td>
                    <td>{$residencia["bairro"]}</td>
                    <td>{$residencia["ciade"]}</td>
                    <td>{$residencia["estado"]}</td>
                    <td>{$residencia["cep"]}</td>
                </tr>";
        }

    } catch(Exception $e) {
        die("Erro de banco de dados: " . $e->getMessage());
    }    
?>     

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
    <div class="container">
      <a class="navbar-brand js-scroll-trigger" href="#page-top">Comece seu Cadastro</a>
      <button class="navbar-toggler navbar-toggler-right text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        Menu
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
        <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#contact">Cadastro</a>
          </li>
          <li class="nav-item mx-0 mx-lg-1">
            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">Sobre</a>
          </li>
        
        </ul>
      </div>
    </div>
  </nav>

  <!-- Masthead -->
  <header class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">

   
      <!-- Masthead Heading -->
      <h1 class="masthead-heading text-uppercase mb-0">Faça seu cadastro residencial.</h1>

      <!-- Icon Divider -->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Masthead Subheading -->
      <p class="masthead-subheading font-weight-light mb-0">Uma forma fácil de simular o Senso.</p>

    </div>
  </header>


  <!-- Contact Section -->
  <section class="page-section" id="contact">
    <div class="container">

      <!-- Contact Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-secondary mb-0">Cadastre-se</h2>
      <p class="text-center font-weight-light mb-0">Insira nesses campos abaixo os dados do responsável pela residência.</p>

      <!-- Icon Divider -->
      <div class="divider-custom">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- Contact Section Form -->
      <div class="row">
        <div class="col-lg-8 mx-auto">
          <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
          <form action="tratar.php" method="post">
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Nome</label>
                <input class="form-control" name="nome" id="name" type="text" placeholder="Nome" required="required" data-validation-required-message="Por favor preencha esse campo com seu nome.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Sobrenome</label>
                <input class="form-control" name="sobrenome" id="sobrenome" type="text" placeholder="Sobrenome" required="required" data-validation-required-message="Por favor preencha esse campo com seu sobrenome.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>CPF</label>
                <input class="form-control" name="cpf" id="cpf" type="number" placeholder="CPF" required="required" max data-validation-required-message="Por favor preencha esse campo com seu CPF..">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>RG</label>
                <input class="form-control" name="rg" id="rg" type="number" placeholder="RG" required="required" data-validation-required-message="Please enter your email address.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Data de Nascimento</label>
                <input class="form-control" name="data_nasc" id="data" type="date" placeholder="Data de Nascimento" required="required" data-validation-required-message="Please enter your name.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Telefone</label>
                <input class="form-control" name="telefone" id="phone" type="number"  placeholder="Telefone" required="required" data-validation-required-message="Please enter your phone number.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Email</label>
                <textarea class="form-control" name="email" id="email" type="mail" placeholder="Email" required="required" data-validation-required-message="Please enter a message."></textarea>
                <p class="help-block text-danger"></p>
              </div>
              <div>
               <label>
                 <span>Informe o sexo: </span>
                    <input type="radio" name="tSexo" id="cMasc" /><label>Masculino</label>
                    <input type="radio" name="tSexo" id="cFem" /><label>Feminino</label>
                </label><br />
<?php

               $sexo = $_POST['tSexo'];
               echo $sexo;

?>
            </div>

            <p>Agora faça o cadastro de sua residência.</p>

              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Número da casa</label>
                <input class="form-control" name="numero_casa" id="casa" type="number" placeholder="Número da Casa" required="required" data-validation-required-message="Please enter your name.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Bairro</label>
                <input class="form-control" name="bairro" id="bairro" type="text" placeholder="Bairro" required="required" data-validation-required-message="Please enter your name.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Cidade</label>
                <input class="form-control" name="cidade" id="cidade" type="text" placeholder="Cidade"  required="required" data-validation-required-message="Please enter your name.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>Estado</label>
                <input class="form-control" name="estado" id="estado" type="text" placeholder="Estado" required="required" data-validation-required-message="Please enter your email address.">
                <p class="help-block text-danger"></p>
              </div>
            </div>
            <div class="control-group">
              <div class="form-group floating-label-form-group controls mb-0 pb-2">
                <label>CEP</label>
                <input class="form-control" name="cep" id="cep" type="number" placeholder="CEP" required="required" data-validation-required-message="Please enter your name.">
                <p class="help-block text-danger"></p>
              </div>
            <br>
            <div id="success"></div>
            <div class="form-group">
              <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Enviar</button>
            </div>
          </form>
        </div>
      </div>

    </div>
  </section>


   <!-- About Section -->
   <section class="page-section bg-primary text-white mb-0" id="about">
    <div class="container">

      <!-- About Section Heading -->
      <h2 class="page-section-heading text-center text-uppercase text-white">Sobre</h2>
      <p class="lead mb-0">Um site desenvolvido pelos estudantes Marcos Vinícius e Pedro Henrique do curso técnico em informática do 3° ano do Instituto Federal do Tocantins, com orientação e supervição do Professor Marcos Dias.</p>

      <!-- Icon Divider -->
      <div class="divider-custom divider-light">
        <div class="divider-custom-line"></div>
        <div class="divider-custom-icon">
          <i class="fas fa-star"></i>
        </div>
        <div class="divider-custom-line"></div>
      </div>

      <!-- About Section Content -->
      <div class="row">
        <div class="col-lg-4 ml-auto">
          <p class="lead"></p>
        </div>
        <div class="col-lg-4 mr-auto">
          <p class="lead"></p>
        </div>
      </div>


    </div>
  </section>

  <!-- Footer -->
  <footer class="footer text-center">
    <div class="container">
      <div class="row">

        <!-- Footer Social Icons -->
        <div class="col-lg-4 mb-5 mb-lg-0">
          <h4 class="text-uppercase mb-4">Redes Sociais</h4>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-facebook-f" href="https://www.facebook.com/marcosvinicius.rdca"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-twitter"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-instagram" href="https://www.instagram.com/marcosv.rca/"></i>
          </a>
          <a class="btn btn-outline-light btn-social mx-1" href="#">
            <i class="fab fa-fw fa-dribbble"></i>
          </a>
        </div>

        <!-- Footer About Text -->
        <div class="col-lg-4">
          <h4 class="text-uppercase mb-4">Sobre o Site</h4>
          <p class="lead mb-0">O site tem como finalidade simular e melhorar o Senso que é realizado pelo IBGE, fazendo o cadastro de uma pessoa responsável de uma determinada residência, logo após com a realizção do cadastro residencial.</p>
        </div>

      </div>
    </div>
  </footer>

  <!-- Copyright Section -->
  <section class="copyright py-4 text-center text-white">
    <div class="container">
      <small>Copyright &copy; M&P 2019 - Todos direitos reservados.</small>
    </div>
  </section>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Plugin JavaScript -->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Contact Form JavaScript -->
  <script src="js/jqBootstrapValidation.js"></script>
  <script src="js/contact_me.js"></script>

  <!-- Custom scripts for this template -->
  <script src="js/freelancer.min.js"></script>

</body>

</html>
