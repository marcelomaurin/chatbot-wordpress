
		angular.module("App",[]);
		angular.module("App").controller("bperguntaCtrl", function ($scope,$http, $interval) {
			$scope.app = "Maurinsoft Manager";
			$scope.texto = "";
			$scope.pergunta = "";
			pguid = "32d863cf-d225-44bb-9979-778c4df6a79e";
			$scope.msg = "Este componente permite realizar uma serie de atividades integradas ao Wordpress.";
			$scope.msgjob = "Dúvidas entre em contato com marcelomaurinmartins@gmail.com";
			$scope.msgsite = "Este de gerenciamento interno.";
			
			$scope.resposta = "Sem resposta";
			

			

			$scope.displayBPergunta=function(pidbpergunta)
			{
			    $scope.disableUpdate = {'display': 'none'}; //Atribui Edicao invisivel
				$scope.disableInsert = {'display': 'none'}; //Atribui Edicao invisivel
				if (typeof pidbpergunta == "undefined") 
				{
					pidbpergunta = "";
				}	

				var params = {"guid": pguid ,"pidbpergunta": pidbpergunta };
				var config = {params: params};
						
						
				$http.get("http://maurinsoft.com.br/wp-content/plugins/maurinsoft/ws/bperguntas.php",config)
				.success(function(data)
				{
					$scope.data = data.rs;
					$scope.msg = "Tela Atualizada!";
				})
				.error(function()
				{
					$scope.data = null;
					$scope.msg = "Pesquisa retornou vazia";
							
				}) 
				
			};
									
			
	

			$scope.insertBPergunta = function() {  			
				$http.post("http://maurinsoft.com.br/wp-content/plugins/maurinsoft/ws/pperguntas.php?guid="+pguid+"&container="+$scope.container+"&nome="+$scope.pergunta)
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
				    $scope.displayBPergunta();
				});
			};	

			$scope.deleteBPergunta=function(pidbperguntas)
			{
				var params = {"guid": pguid ,"idbperguntas": pidbperguntas };
				var config = {params: params};
						
				$http.delete("http://maurinsoft.com.br/wp-content/plugins/maurinsoft/ws/bperguntas.php",config)
				.success(function(data)
				{
					console.log(data);		
					local = data.rs[0].resposta;
					$scope.displayBPergunta();
					$scope.msg = local;
				})
				.error(function(erro)
				{
					console.log(erro);
					$scope.msg = data.rs[0].resposta;
					$scope.data = null;
				}) 
				.finally(function()
				{
				   //$scope.sleep(300);
				   
				});
				
			};			
			

			$interval( function(){ 
					//$scope.callAtTimeout(); 
					$scope.displayBPergunta(); /*display jobs*/
					console.log("Interval occurred");
			}, 10000);

			$scope.displayBPergunta(); /*display repository*/
			
			
			
		});
