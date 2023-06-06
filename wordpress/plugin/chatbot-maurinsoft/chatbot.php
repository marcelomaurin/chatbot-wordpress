<!DOCTYPE HTML> 
	<HTML  ng-app="App" LANG="PT-BR">
	<head>
		<meta charset="UTF-8"/>
		<meta name="description" content="Maurinsoft"/>
		<meta name="viewport" content="width=device-width, initial-scale=1"/>
		<title>Teste de Chatbot</title>
		
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
		
		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		
		
		
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		
		<link rel="stylesheet" href="/wp-content/plugins/maurinsoft/css/style.css"/>
		<script src="https://code.angularjs.org/1.6.4/angular.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="/wp-content/plugins/maurinsoft/js/ctlr_test.js"></script>
	</head>
	<body ng-controller="TesteCtrl">		
		<div class="row geral ">					
			<!--Caixa titulo -->
			<div class="row  borda_container">
				<div class="col-xs-2 ">								
					<img src="/wp-content/plugins/maurinsoft/img/logo.png" alt="Tutorial de CSS" title="Logo do CSS"  width="100" height="100"/>					
				</div>
				<div class="col-xs-10 Logo ">								
					<h1 class="titulo">{{app}}</h1>
				</div>
			</div>
			
			
			<!--Login -->
			<div class="row">		
				
			</div>

			<!--Menu Item-->
			<div class="row bloco_dialog">				
					<div class="col-xs-12 menu">		
						<div class="row titulo">
						  <h4 class="menu_titulo">Conversa</h4>
						</div>
						
						<div class="row textarea" >						
						   <textarea type="text" >{{texto}}</textarea>
						</div>
						<div class="row Pergunta">						
							<div>
								<h4>Perguta</h4>
							</div>	
							<div class="row Janela">
								<div class="caixa">
									<input type="text" value="{{pergunta}}" ng-model="pergunta" name="Pergunta">
								</div>
								<div class="botao">
									<input type="submit" value="Enviar" ng-click="displayResposta()">
								</div>						 
							</div>
						</div>
					</div>								
			</div>		
			<div class="row rodape_container">
			  <div class="row">
				<center>{{msg}}</center>
			  </div>	
			
			
			</div>
		</div>	
				
	</body>
	</html>