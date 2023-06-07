//<? *** Controler *** ?>

				var app = angular.module('brespostaCtrl',[]);
				app.controller('cntrl', function($scope,$http)
				{
				    $scope.disableUpdate = {'display': 'none'}; //Atribui Edicao invisivel
					$scope.disableInsert = {'display': 'none'}; //Atribui Edicao invisivel
					pguid = "32d863cf-d225-44bb-9979-778c4df6a79e";
					$scope.msg = "Este componente permite realizar uma serie de atividades integradas ao Wordpress.";
					//Mostra  os Jobs				
					$scope.insertBResposta=function(pResposta)
					{
						var params = {"guid": pguid ,"resposta": pResposta };
						var config = {params: params};
						$http.post("/wp-content/plugins/maurinsoft/ws/brespostas.php?guid="+pguid+"&resposta="+pResposta+"")
						//$http.post("/wp-content/plugins/maurinsoft/ws/brespostas.php",config)
						.success(function(data)
						{
							if (data.mensagem) {
							$scope.msg = "Resposta Cadastrada com Sucesso!";
							$scope.displayBResposta();
							} else {
								var msgins = data.mensagem;
								$scope.displayBResposta();
								$scope.msg = msgins;
							}
						})
					}

					$scope.displayBResposta=function(pidbresposta)
					{
					    $scope.disableUpdate = {'display': 'none'}; //Atribui Edicao invisivel
						$scope.disableInsert = {'display': 'none'}; //Atribui Edicao invisivel
						if (typeof pidbresposta == "undefined") 
						{
							pidbresposta = "";
						}	

						
						var params = {"guid": pguid ,"pidbresposta": pidbresposta };
						var config = {params: params};
						
						
						$http.get("/wp-content/plugins/maurinsoft/ws/brespostas.php",config)
						.success(function(data)
						{
							$scope.data = data;
							if (data.mensagem) {
								$scope.msg = data.mensagem;
							} else {
								$scope.msg = "Tela Atualizada!";
							}
						})
						.error(function()
						{
							$scope.msg = "Pesquisa retornou vazia";
							$scope.data = null;
						}) 
					}
					
					$scope.deleteBResposta=function(idbresposta)
					{
						var params = {"guid": pguid ,"idbresposta": idbresposta };
						var config = {params: params};
						$http.delete("/wp-content/plugins/maurinsoft/ws/brespostas.php",config)
						.success(function()
						{					
							$scope.displayBResposta();
							$scope.msg = "Registro excluido!";
						})
					}
					
					//Mostra  os Jobs				
					$scope.newResposta=function()
					{
						$scope.disableInsert = {'display': 'block'}; 
						$scope.disableUpdate = {'display': 'none'}; 
						$scope.edidBRespostas = "";
						$scope.edResposta = "";
						
					}					
					
					$scope.HabilitaEdicao=function(dado)
					{
						$scope.disableUpdate = {'display': 'block'}; 
						$scope.edidbresposta = dado.idbrespostas;
						$scope.edresposta = dado.resposta;						
					}
					
					
					$scope.updateBResposta=function(edidbresposta, edresposta)
					{
						$http.post("/wp-content/plugins/maurinsoft/ws/brespostas.php?guid="+ pguid+"&idbrespostas="+edidbresposta+"&resposta="+edresposta)
						.success(function()
						{								
							$scope.disableUpdate = {'display': 'none'}; 
							$scope.displayBResposta();
							$scope.msg = "Registro Atualizado!";
						})
						
					}

				});
			