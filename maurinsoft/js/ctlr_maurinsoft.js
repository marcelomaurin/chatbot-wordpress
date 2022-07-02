
		angular.module("App",[]);
		angular.module("App").controller("MaurinsoftCtrl", function ($scope,$http, $interval) {
			$scope.app = "Maurinsoft Manager";
			$scope.texto = "";
			$scope.pergunta = "";
			pguid = "63b22110-bfae-1sd2-2252-211421ede2d1";
			$scope.msg = "Este componente permite realizar uma serie de atividades integradas ao Wordpress.";
			$scope.msgjob = "Dúvidas entre em contato com marcelomaurinmartins@gmail.com";
			$scope.msgsite = "Este de gerenciamento interno.";
			
			$scope.resposta = "Sem resposta";
			

			

			$scope.displayJobs=function(pidjobs)
			{
			    $scope.disableUpdate = {'display': 'none'}; //Atribui Edicao invisivel
				$scope.disableInsert = {'display': 'none'}; //Atribui Edicao invisivel
				if (typeof pidjobs == "undefined") 
				{
					pidjobs = "";
				}	

				var params = {"guid": pguid ,"idjobs": pidjobs };
				var config = {params: params};
						
						
				$http.get("http://maurinsoft.com.br/ws/sJobs.php",config)
				.success(function(data)
				{
					$scope.datajob = data;
					$scope.msgjob = "Tela Atualizada!";
				})
				.error(function()
				{
					$scope.datajob = null;
					$scope.msgjob = "Pesquisa retornou vazia";
							
				}) 
				
			};
			$scope.displayRep=function(pidrepository)
			{
			    $scope.disableUpdate = {'display': 'none'}; //Atribui Edicao invisivel
				$scope.disableInsert = {'display': 'none'}; //Atribui Edicao invisivel
				if (typeof pidrepository == "undefined") 
				{
					pidrepository = "";
				}	

				var params = {"guid": pguid ,"idrepository": pidrepository };
				var config = {params: params};
						
						
				$http.get("http://maurinsoft.com.br/ws/sRepository.php",config)
				.success(function(data)
				{
					$scope.datarep = data;
					$scope.msgrep = "Tela Atualizada!";
				})
				.error(function()
				{
					$scope.datarep = null;
					$scope.msgrep = "Pesquisa retornou vazia";
							
				}) 
				
			};									
			
	
			$scope.IncluiResposta = function() {  	
			   $scope.texto = $scope.texto . $scope.resposta;			
			}
			

			$scope.insertJobs = function() {  			
				$http.get("http://maurinsoft.com.br/ws/iJobs.php?guid="+pguid+"&container="+$scope.container+"&nome="+$scope.nome)
				.success(function(data)
				{
					//console.log(data);
					$scope.data = data.rs[0];
					$scope.resposta = data.rs[0].resposta;
					$scope.texto = $scope.texto + "guid:"+$scope.guid+'\n';
					$scope.texto = $scope.texto + "Resposta:"+$scope.resposta+'\n';
					$scope.msg = $scope.resposta;
				})
				.error(function(erro)
				{
					//console.log(erro);
					$scope.msg = "Pesquisa retornou vazia";
					$scope.data = null;
				}) 
				.finally(function()
				{
				//$scope.sleep(300);
				    $scope.displayJobs();
				});
			};	

			$scope.deleteJobs=function(pidjobs)
			{
				
				$http.get("http://maurinsoft.com.br/ws/dJobs.php?guid="+pguid+"&idjobs="+pidjobs)
				.success(function(data)
				{
					//console.log(data);
					//$scope.data = data.rs[0];
					//$scope.resposta = data.rs[0].resposta;
					//$scope.texto = $scope.texto + "guid:"+$scope.guid+'\n';
					//$scope.texto = $scope.texto + "Resposta:"+$scope.resposta+'\n';
					$scope.msg = $scope.resposta;
				})
				.error(function(erro)
				{
					//console.log(erro);
					$scope.msg = data.resposta;
					$scope.data = null;
				}) 
				.finally(function()
				{
				   //$scope.sleep(300);
				   $scope.displayJobs();
				});
				
			};			
			

			$interval( function(){ 
					//$scope.callAtTimeout(); 
					$scope.displayRep(); /*display repository*/
					$scope.displayJobs(); /*display jobs*/
					console.log("Interval occurred");
			}, 1000);

			$scope.displayRep(); /*display repository*/
			$scope.displayJobs();
			
			
		});
