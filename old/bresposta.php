
<?php
  //Controla o Debug no projeto
  ini_set('display_errors', 'On');
  
  include "sessao.php";
  include "config.php";
  include "funcs.php";
?>

<html>
	<header>
		<title>Cadastro de Fabricante</title>
		<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
	</header>
	<body>

	    
		<div ng-app="Envia_SMS" ng-controller="cntrl" >
			<div class="container-fluid bg-1 text-rigth">
				<form>
					<?  Pesquisar Itens ?>
					<div class="jumbotron">
							<h1>Cadastro de Categorias</h1>							
							<p>Para maiores informações marcelomaurinmartins@gmail.com</p>
					</div>
					<div class="row">
						<div class="col-sm-1">idCategoria:</div>
						<div class="col-sm-4"><input class="form-control" placeholder="idCategoria (opcional)" type="text" ng-model="pidcategoria" name="pidcategoria"></div>					
						<div class="col-sm-1"> <input type="button" class="btn btn-primary"  value="Pesquisar" ng-click="displayCategoria(pidcategoria)" > </div> 
						<div class="col-sm-1">  </div> 
						<div class="col-sm-1"> <input type="button" class="btn btn-primary"  value="Novo Item" ng-click="newCategoria(pidcategoria)" > </div> 
					
					</div>
					
					
					<? Retorno de mensagem de erro ?>
					<div class="info">
						<div class="control-label">Alerta:</div>
						<div class="info">{{msg}}</div>
					</div>
				</form>
			</div>
			<? layout da tabela de resposta ?>
			<div class="container-fluid bg-1 text-rigth">
				
				<? **Cadastrar itens** ?>
				<div id="cadastro" ng-style="disableInsert" >
					<div class="row">
						<div class="col-sm-12"> <h3>Operação Insert registro </h3></div>	
					</div>					
					<div class="row">
						<div class="col-sm-1 control-label"> descricao: </div>
						<div class="col-sm-4"> <input  class="form-control" placeholder="Mensagem a enviar" type="text" ng-model="descricao" name="descricao"> </div>	
					</div>
					<div class="row">
						<div class="col-sm-4"></div>
						<div class="col-sm-1 control-label">  </div> 
						<div> <input type="button" class="btn btn-primary" value="submit" ng-click="insertCategoria()" > </div> 					
					</div>
				</div>
			</div>
			
			<div class="container-fluid bg-1 text-rigth">
				
				<? *** Update *** ?>
				<div id="edicao" ng-style="disableUpdate" class="container-fluid bg-1 text-rigth">
					<div class="row">
						<div class="col-sm-12"> <h3>Operacao de Edicao</h3></div>
					</div>
					<div class="row">
						<div class="col-sm-1 control-label"> IdCategoria:</div><div> {{edidcategoria}}</div>
					</div>
					<div class="row">
						<div class="col-sm-1 control-label"> Descrição</div>
						<div class="col-sm-4"> <input class="form-control"  type="text" ng-model="eddescricao" name="eddescricao"></div>
					</div>				
					<div class="row">
						<div class="col-sm-4"></div>
						<div class="col-sm-1"> <button class="btn btn-primary" ng-click="updateCategoria(edidcategoria,eddescricao)">Atualizar</button></div>
					</div>
				</div>
			</div>
			
			<div class="container-fluid bg-1 text-rigth">
				<div class="row">
				<hr>
				</div>
			</div>
				
			<? ** Tela de Resultado **?>
			<div class="container-fluid bg-1 text-rigth">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Idcategoria</th>
							<th>descricao</th>
											
						<tr>
					</thead>
					<tbody>
						<tr ng-repeat="dados in data.rs">
							<td>{{dados.idcategoria}}</td>
							<td>{{dados.descricao}}</td>						
							<td><button class="btn btn-primary" ng-click="deleteCategoria(dados.idcategoria);">Delete</button></td>
							<td><button class="btn btn-primary" ng-click="HabilitaEdicao(dados);">Edit</button></td>
						</tr>
					</tbody>
				</table>
				
				
			</div>
			
			
			
			<? *** Controler *** ?>
			<script>
				var app = angular.module('Envia_SMS',[]);
				app.controller('cntrl', function($scope,$http)
				{
				    $scope.disableUpdate = {'display': 'none'}; //Atribui Edicao invisivel
					$scope.disableInsert = {'display': 'none'}; //Atribui Edicao invisivel
					
					//Mostra  os Jobs				
					$scope.insertCategoria=function()
					{
						$http.post("/consinco/ws/iCategoria.php",{'descricao':$scope.descricao})
						.success(function()
						{
							$scope.msg = "Categoria foi cadastrado com sucesso";
							$scope.displayCategoria();
						})
					}

					$scope.displayCategoria=function(pidCategoria)
					{
					    $scope.disableUpdate = {'display': 'none'}; //Atribui Edicao invisivel
						$scope.disableInsert = {'display': 'none'}; //Atribui Edicao invisivel
						if (typeof pidCategoria == "undefined") 
						{
							pidCategoria = "";
						}	

						var params = {"idcategoria": pidCategoria };
						var config = {params: params};
						
						
						$http.get("/consinco/ws/sCategoria.php",config)
						.success(function(data)
						{
							$scope.data = data;
							$scope.msg = "Tela Atualizada!";
						})
						.error(function()
						{
							$scope.msg = "Pesquisa retornou vazia";
							$scope.data = null;
						}) 
					}
					
					$scope.deleteCategoria=function(idcategoria)
					{
						$http.post("/consinco/ws/dCategoria.php",{'idcategoria':idcategoria})
						.success(function()
						{					
							$scope.displayCategoria();
							$scope.msg = "Registro excluido!";
						})
					}
					
					//Mostra  os Jobs				
					$scope.newCategoria=function()
					{
						$scope.disableInsert = {'display': 'block'}; 
						$scope.disableUpdate = {'display': 'none'}; 
						$scope.edidCategoria = "";
						$scope.edCategoria = "";
						
					}					
					
					$scope.HabilitaEdicao=function(dado)
					{
						$scope.disableUpdate = {'display': 'block'}; 
						$scope.edidcategoria = dado.idcategoria;
						$scope.eddescricao = dado.descricao;						
					}
					
					
					$scope.updateCategoria=function(edidcategoria, eddescricao)
					{
						$http.post("/consinco/ws/uCategoria.php",{'idcategoria':edidcategoria,'descricao':eddescricao})
						.success(function()
						{					
							$scope.displayCategoria();
							$scope.msg = "Registro excluido!";
							
							$scope.disableUpdate = {'display': 'none'}; 
							$scope.displayCategoria();
						})
					}

				});
			</script>


		</div>
	</body>
</html>