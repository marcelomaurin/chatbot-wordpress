
<?php
  //Controla o Debug no projeto
  ini_set('display_errors', 'Off');
  
 // include "sessao.php";
 // include "config.php";
  include "funcs.php";
?>

<div ng-app="brespostaCtrl" ng-controller="cntrl">
	<div class="container-fluid">
		<form>
			<div class="jumbotron">
				<h1>Cadastro de Respostas</h1>
				<p>Módulo de criação da base de treinamento</p>
			</div>
			<div class="row">
				<div class="col-sm-1">idbresposta:</div>
				<div class="col-sm-4"><input class="form-control" placeholder="idbresposta (opcional)" type="text" ng-model="pidbresposta" name="pidbresposta"></div>
				<div class="col-sm-1"><input type="button" class="btn btn-primary" value="Pesquisar" ng-click="displayBResposta(pidbresposta)"></div>
				<div class="col-sm-1"></div>
				<div class="col-sm-1"><input type="button" class="btn btn-primary" value="Novo Item" ng-click="newResposta(pidbresposta)"></div>
			</div>
			<div class="info">
				<div class="control-label">Alerta:</div>
				<div class="info">{{msg}}</div>
			</div>
		</form>
	</div>

	<div class="container-fluid">
		<div id="cadastro" ng-style="disableInsert">
			<div class="row">
				<div class="col-sm-12"><h3>Operação Insert registro</h3></div>
			</div>
			<div class="row col-sm-12">
				<div class="col-sm-1 control-label">Resposta:</div>
				<div class="col-sm-4"><input class="form-control" placeholder="Mensagem a enviar" type="text" ng-model="edrespostai" name="edrespostai"></div>
				<div class="col-sm-1 control-label"></div>
				<div class="col-sm-1"><input type="button" class="btn btn-primary" value="Salvar" ng-click="insertBResposta(edrespostai)"></div>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div id="edicao" ng-style="disableUpdate" class="container-fluid">
			<div class="row">
				<div class="col-sm-12"><h3>Operacao de Edicao</h3></div>
			</div>
			<div class="row col-sm-12">
				<div class="col-sm-2 control-label">idResposta:</div>
				<div class="col-sm-1">{{edidbresposta}}</div>
				<div class="col-sm-2 control-label">Resposta:</div>
				<div class="col-sm-4"><input class="form-control" type="text" ng-model="edresposta" name="edresposta"></div>
				<div class="col-sm-1"></div>
				<div class="col-sm-1"><button class="btn btn-primary" ng-click="updateBResposta(edidbresposta,edresposta)">Atualizar</button></div>
			</div>
		</div>
	</div>

	<div class="container-fluid">
		<div class="row">
			<hr>
		</div>
	</div>
				
	<? ** Tela de Resultado **?>
	<div class="container-fluid bg-1 text-rigth">
         	<table class="table table-striped">
                	<thead>
		        	<tr>
			        	<th>IdBResposta</th>
					<th>Resposta</th>
				<tr>
			</thead>
			<tbody>
			        <tr ng-repeat="dados in data.rs">
                                        <td>{{dados.idbrespostas}}</td>
				        <td>{{dados.resposta}}</td>
					<td><button class="btn btn-primary" ng-click="deleteBResposta(dados.idbrespostas);">Delete</button></td>
					<td><button class="btn btn-primary" ng-click="HabilitaEdicao(dados);">Edit</button></td>
				</tr>
			</tbody>
		</table>
				
				
	</div>
</div>

