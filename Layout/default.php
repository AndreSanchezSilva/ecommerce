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