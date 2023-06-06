		var app = angular.module('ctrl_historico',[]);
				app.controller('cntrl', function($scope,$http)
				{
					$scope.msg1 = "Iniciando exclusao";
				    $scope.disableUpdate = {'display': 'none'}; //Atribui Edicao invisivel
					$scope.disableInsert = {'display': 'none'}; //Atribui Edicao invisivel
					
					//Mostra  os Jobs				
					$scope.insertHistorico=function()
					{
						$http.get("/wp-content/plugins/maurinsoft/ws/historico.php",{'guid':'32d863cf-d225-44bb-9979-778c4df6a79e','pergunta':$scope.pergunta})
						.success(function(data)
						{
							if(data.mensagem){
								$scope.msg1 = data.mensagem;
							}
							else {								
								$scope.msg1 = "Historico foi cadastrado com sucesso";
							}
							
							$scope.displayHistorico();
							$scope.msg = $scope.msg1;
						})
					}

					$scope.displayHistorico=function(pidhistorico)
					{
					    $scope.disableUpdate = {'display': 'none'}; //Atribui Edicao invisivel
						$scope.disableInsert = {'display': 'none'}; //Atribui Edicao invisivel
						if (typeof pidhistorico == "undefined") 
						{
							pidhistorico = "";
						}	

						var params = {'guid':'32d863cf-d225-44bb-9979-778c4df6a79e',"idhistorico": pidhistorico };
						var config = {params: params};
						
						
						//$http.get("/wp-content/plugins/maurinsoft/ws/historico.php",config)
						$http.post("/wp-content/plugins/maurinsoft/ws/historico.php",JSON.stringify(params))
						.success(function(data)
						{
							$scope.data = data;
							if(data.mensagem){
								$scope.msg = data.mensagem;
							}
							else {								
								$scope.msg = "Tela Atualizada!";
							}
						})
						.error(function()
						{
							$scope.msg = "Pesquisa retornou vazia";
							$scope.data = null;
						}) 
					}
					
					$scope.deleteHistorico=function(pidhistorico)
					{
						var params = {'guid':'32d863cf-d225-44bb-9979-778c4df6a79e',"idhistorico": pidhistorico };
						var config = {params: params};
						$http.delete("/wp-content/plugins/maurinsoft/ws/historico.php",config)
						//$http.delete("/wp-content/plugins/maurinsoft/ws/historico.php",JSON.stringify(params))
						.success(function(data)
						{	
							if (data)
							{
								$scope.msg1 = data.mensagem;
							} else								
							{					
								
								$scope.msg1 = "Registro excluido!";
							}
							$scope.displayHistorico();
							$scope.msg = $scope.msg1;
						})
					}
					
					//Mostra  os Jobs				
					$scope.newCategoria=function()
					{
						$scope.disableInsert = {'display': 'block'}; 
						$scope.disableUpdate = {'display': 'none'}; 
						$scope.edidHistorico = "";
						$scope.edPergunta = "";
						
					}					
					
					$scope.HabilitaEdicao=function(dado)
					{
						$scope.disableUpdate = {'display': 'block'}; 
						$scope.edidhistorico = dado.idhistorico;
						$scope.edpergunta = dado.pergunta;						
					}
					
					
					$scope.updateHistorico=function(edidhistorico, edpergunta)
					{
						$http.put("/wp-content/plugins/maurinsoft/historico.php",{'guid':'32d863cf-d225-44bb-9979-778c4df6a79e','idhistorico':edidhistorico,'pergunta':edpergunta})
						.success(function()
						{					
							$scope.displayHistorico();
							$scope.msg = "Registro excluido!";
							
							$scope.disableUpdate = {'display': 'none'}; 
							$scope.displayHistorico();
						})
					}
					$scope.displayHistorico(0); 

				});




