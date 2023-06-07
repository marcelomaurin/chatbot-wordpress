<html ng-app="App" LANG="PT-BR">

<body ng-controller="bperguntaCtrl">



<div class="row  borda_container ">
	<div class="col-md-2 ">								
		<img src="/wp-content/plugins/chatbot-maurinsoft/img/logo.png" alt="Tutorial de CSS" title="Logo do CSS"  width="100" height="100"/>
	</div>
	<div class="col-md-4 Logo ">								
		<h1 class="titulo">{{app}}</h1>
	</div>
</div>

<div class="row separacao">
</div>

<div class="jumbotron">
	<h1>Base de Perguntas</h1>							
	<p>Para maiores informações marcelomaurinmartins@gmail.com</p>
</div>



<div class="row container borda_container" class="col-md-12">
	<div class="row">
       <h3>Perguntas</h3>
	</div>
</div>
<div class="row container">
	<? ** Tela de Resultado **?>
	<div class="container-fluid bg-1 text-rigth">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Idbperguntas</th>
					<th>Pergunta</th>					
					<th>Deletar</th>
					
											
				<tr>
			</thead> 
			<tbody>
				<tr ng-repeat="dados in data">
					<td>{{dados.idbperguntas}}</td>
					<td>{{dados.pergunta}}</td>											
					<td><button class="btn btn-primary" ng-click="deleteBPergunta(dados.idbperguntas);">Delete</button></td>
					
				</tr>
			</tbody>
		</table>
				
				
	</div>	
	<div class="row">
	</div>
</div>

<div class="row container ">
	<div class="row">
       <h3>Retorno</h3>
	   {{msg}}
	</div>
</div>

</body>
</html>
