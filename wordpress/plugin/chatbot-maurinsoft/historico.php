<h1>Historico</h1>
<? *** Controler *** ?>
<script src="/wp-content/plugins/chatbot-maurinsoft/js/ctlr_historico.js"></script>
<div ng-app="ctrl_historico" ng-controller="cntrl" >
   <div class="jumbotron">
		<h1>Histórico de Pesquisa</h1>							
		<p>Para maiores informações marcelomaurinmartins@gmail.com</p>
	</div>
	
	<? Retorno de mensagem de erro ?>
	<div class="info">
		<div class="control-label">Alerta:</div>
		<div class="info">{{msg}}</div>
	</div>
	<div class="container-fluid bg-1 text-rigth">
				
		<? *** Update *** ?>
		<div id="edicao" ng-style="disableUpdate" class="container-fluid bg-1 text-rigth">
			<div class="row">
				<div class="col-sm-12"> <h3>Operacao de Edicao</h3></div>
			</div>
			<div class="row">
				<div class="col-sm-1 control-label"> idHistorico:</div><div> {{edidcategoria}}</div>
				</div>
				<div class="row">
					<div class="col-sm-1 control-label"> Pergunta</div>
					<div class="col-sm-4"> <input class="form-control"  type="text" ng-model="edpergunta" name="edpergunta"></div>
				</div>				
				<div class="row">
					<div class="col-sm-4"></div>
					<div class="col-sm-1"> <button class="btn btn-primary" ng-click="updateHistorico(edidhistorico,edpergunta)">Atualizar</button></div>
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
						<th>Idhistorico</th>
						<th>pergunta</th>
											
					<tr>
				</thead>
				<tbody>
					<tr ng-repeat="dados in data.rs">
						<td>{{dados.idhistorico}}</td>
						<td>{{dados.pergunta}}</td>						
						<td><button class="btn btn-primary" ng-click="deleteHistorico(dados.idhistorico);">Delete</button></td>
						<td><button class="btn btn-primary" ng-click="HabilitaEdicao(dados);">Edit</button></td>
					</tr>
				</tbody>
			</table>
		</div>
</div>
