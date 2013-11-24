<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<title>E-commerce</title>

	<base href="/ecommerce/" />

	<link rel="stylesheet" type="text/css" href="Lib/css/bootstrap.min.css">

    <script type="text/javascript" src="Lib/js/jquery.min.js"></script>
    <script type="text/javascript" src="Lib/js/bootstrap.min.js"></script>
</head>
<body>
<header class="container">
<<<<<<< HEAD
	<div class="row">
		<div class="span12">
			<h1>Aplicação</h1>
		</div>
	</div>
	<div class="row">
		<div class="span12">
			<nav>
				<ul>
					<li>
						<a href="Grupo/onLista">Grupo</a>
						<ul>
							<li><a href="Grupo/onCadastro">Cadastro</a></li>
						</ul>
					</li>
					<li>
						<a href="Subgrupo/onView">Subgrupo</a>
					</li>
					<li>
						<a href="Produto/onView">Produto</a>
					</li>
				</ul>
			</nav>
		</div>
	</div>
=======
	<nav class="navbar navbar-default" role="navigation">
	  <!-- Brand and toggle get grouped for better mobile display -->
	  <div class="navbar-header">
	    <a class="navbar-brand" href="#">Zé Commerce</a>
	  </div>

	  <!-- Collect the nav links, forms, and other content for toggling -->
	  <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
	    <ul class="nav navbar-nav">
	      <li class="dropdown">
	        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Grupo <b class="caret"></b></a>
	        <ul class="dropdown-menu">
	          <li><a href="?class=Grupo&method=onView">View</a></li>
	          <li><a href="?class=Grupo&method=onLista">Listar</a></li>
	          <li><a href="?class=Grupo&method=onCadastro">Cadastrar</a></li>
	        </ul>
	      </li>
	      <li class="dropdown">
	        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Sub-Grupo <b class="caret"></b></a>
	        <ul class="dropdown-menu">
	          <li><a href="?class=SubGrupo&method=onView">View</a></li>
	          <li><a href="?class=SubGrupo&method=onLista">Listar</a></li>
	          <li><a href="?class=SubGrupo&method=onCadastro">Cadastrar</a></li>
	        </ul>
	      </li>
	      <li class="dropdown">
	        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Produto <b class="caret"></b></a>
	        <ul class="dropdown-menu">
	          <li><a href="?class=Produto&method=onView">View</a></li>
	          <li><a href="?class=Produto&method=onLista">Listar</a></li>
	          <li><a href="?class=Produto&method=onCadastro">Cadastrar</a></li>
	        </ul>
	      </li>
	    </ul>
	  </div><!-- /.navbar-collapse -->
	</nav>

>>>>>>> f0fe6d2cc7524016a458615175aa6ab3a3157403
</header>
<main class="container">
{{content}}
</main>
<footer class="container">
	<div class="row">
		<div class="span12">
			<ul>
				<li>navegação</li>
			</ul>
		</div>
	</div>
</footer>
</body>
</html>