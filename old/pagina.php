<html ng-app="App" LANG="PT-BR">
<body ng-controller="MaurinsoftCtrl">

<div class="row  borda_container ">
	<div class="col-md-2 ">								
		<img src="/wp-content/plugins/maurinsoft/img/logo.png" alt="Tutorial de CSS" title="Logo do CSS"  width="100" height="100"/>					
	</div>
	<div class="col-md-4 Logo ">								
		<h1 class="titulo">{{app}}</h1>
	</div>
</div>
<div class="row separacao">
</div>
<div class="row container borda_container">
	<div class="row">
       <h3>Status</h3>
	</div>
</div>
<div class="row container">
	<br/>
</div>
<div class="row container" class="col-md-12">
	<div  style="text-align:right;" class="col-md-1">
			Container:
	</div>
	<div class="col-md-3" style="text-align:left;" >
		<select id="lstIdioma" class="form-select"  style="width:200px;" name="Idioma" ng-model="container">
			<option value="pt">PTBR</option>
			<option value="eng" >ENG</option>
			<option value="esp" >ESP</option>
		</select>
	</div>
	<div class="col-md-1" style="text-align:right;" >
		Nome:
	</div>
	<div style="text-align:left;"  class="col-md-2" style="text-align:right;">
		<input type="text" ng-model="nome"  placeholder="nome do container">
	</div>
	<div class="col-md-1">
	</div>
	<div class="col-md-1">
	    <input type="submit" value="Clonar" ng-click="insertJobs()">
	</div>		
</div>	

<div class="row container ">
	<div class="row">
       <h3>Retorno</h3>
	   {{msg}}
	</div>
</div>

<div class="row container borda_container" class="col-md-12">
	<div class="row">
       <h3>Jobs Wiki</h3>
	</div>
</div>
<div class="row container">
	<? ** Tela de Resultado **?>
	<div class="container-fluid bg-1 text-rigth">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>Idjobs</th>
					<th>Name</th>
					<th>Repository</th>
					<th>Folder</th>
					<th>Status</th>
					<th>Deletar</th>
					
											
				<tr>
			</thead>
			<tbody>
				<tr ng-repeat="dadosjob in datajob.rs">
					<td>{{dadosjob.idjobs}}</td>
					<td>{{dadosjob.name}}</td>						
					<td>{{dadosjob.repository}}</td>						
					<td>{{dadosjob.folder}}</td>						
					<td>{{dadosjob.status}}</td>						
					<td><button class="btn btn-primary" ng-click="deleteJobs(dadosjob.idjobs);">Delete</button></td>
					
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
	   {{msgjob}}
	</div>
</div>
<div class="row container borda_container" class="col-md-12">
	<div class="row">
       <h3>Sites</h3>
	</div>
	<div class="row">
	</div>
</div>
<div class="row container ">
	<? ** Tela de Resultado **?>
	<div class="container-fluid bg-1 text-rigth">
		<table class="table table-striped">
			<thead>
				<tr>
					<th>idrepository</th>
					<th>Repository</th>
					<th>Name</th>
					<th>Create</th>
					<th>Data Base</th>
					<th>URL</th>
					<th>File Path</th>
					
											
				<tr>
			</thead>
			<tbody>
				<tr ng-repeat="dadosrep in datarep.rs">
					<td>{{dadosrep.idrepository}}</td>
					<td>{{dadosrep.strrepository}}</td>						
					<td>{{dadosrep.name}}</td>						
					<td>{{dadosrep.dtcreate}}</td>						
					<td>{{dadosrep.dtbase}}</td>						
					<td>{{dadosrep.url}}</td>						
					<td>{{dadosrep.filepath}}</td>											
				</tr>
			</tbody>
		</table>
	</div>
	<div class="row">
       <h3>Retorno</h3>
	   {{msgsite}}
	</div>
</div>
</body>
</html>