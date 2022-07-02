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
		
		<link rel="stylesheet" href="/wp-content/plugins/maurinsoft/style.css"/>
		<script src="https://code.angularjs.org/1.6.4/angular.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
		<script src="/wp-content/plugins/maurinsoft/js/ctlr_test.js"></script>
	</head>
	<body ng-controller="TesteCtrl">
		<video autoplay loop poster="img/logo.jpg" class="bg_video">
			<source src="/wp-content/plugins/maurinsoft/video/fundo.webm" type="video/webm">-->
			<source src="/wp-content/plugins/maurinsoft/video/fundo.mp4" type="video/mp4">
		</video>	
		<div class="row ">		  
			<!--Caixa titulo -->
			<div class="row  borda_container">
				<div class="col-xs-2 ">								
					<img src="/wp-content/plugins/maurinsoft/img/logo.png" alt="Tutorial de CSS" title="Logo do CSS"  width="100" height="100"/>					
				</div>
				<div class="col-xs-10 Logo ">								
					<h1 class="titulo">{{app}}</h1>
				</div>
			</div>
			<div class="row separacao">
			</div>
			
			<!--Login -->
			<div class="row">		
				
			</div>

			<!--Menu Item-->
			<div class="row ">				
					<div class="col-xs-12 menu">		
						<div class="row">
						  <h4 class="menu_titulo">Conversa</h4>
						</div>
						
						<div class="row >						
						   <textarea type="text"  style=" top:500px;height:200px;width:600px; left:470px;" class="col-md-10" >{{texto}}</textarea>
						</div>
						<div class="info_help">						
					   	 <div class="row col-md-12">
						    <h4>Perguta</h4>
						 </div>
						 <div class="row ">
						    <div class="col-md-8">
						      <input type="text" value="{{pergunta}}" ng-model="pergunta" name="Pergunta">
						    </div>
						    <div class="col-md-2">
						     <input type="submit" value="Enviar" ng-click="displayResposta()">
						    </div>						 
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
		
	</body>
	</html>