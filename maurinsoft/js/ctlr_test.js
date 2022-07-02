
		angular.module("App",[]);
		angular.module("App").controller("TesteCtrl", function ($scope,$http) {
			$scope.app = "Teste Chatbot";
			$scope.texto = "";
			$scope.pergunta = "";
			$scope.msg = "Dúvidas entre em contato com marcelomaurinmartins@gmail.com";
			$scope.resposta = "Sem resposta";
			$scope.url = "http://maurinsoft.com.br/python/runpy.php?pergunta?"+$scope.pergunta;
	
			$scope.IncluiResposta = function() {  	
			   $scope.texto = $scope.texto . $scope.resposta;			
			}
			$scope.displayResposta = function() {  			
				$http.get("http://maurinsoft.com.br/python/runpy.php?pergunta="+$scope.pergunta)
				.success(function(data)
				{
					//console.log(data);
					$scope.data = data.rs[0];
					$scope.resposta = data.rs[0].resposta;
					$scope.texto = $scope.texto + "Pergunta:"+$scope.pergunta+'\n';
					$scope.texto = $scope.texto + "Resposta:"+$scope.resposta+'\n';
					$scope.msg = "Resposta obtida!";
				})
				.error(function(erro)
				{
					//console.log(erro);
					$scope.msg = "Pesquisa retornou vazia";
					$scope.data = null;
				}) 
			}
		});
