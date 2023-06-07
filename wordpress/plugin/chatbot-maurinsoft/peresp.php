<h3>Perguntas e Respostas</h3>

<div ng-app="myApp" ng-controller="myController">
  <div class="container">
    <h3>Perguntas e Respostas</h3>
    <div class="row">
      <div class="col-md-6">
        <h3>Lista 1</h3>
        <ul class="list-group">
          <li class="list-group-item" ng-repeat="item1 in lista1">{{ item1 }}</li>
        </ul>
      </div>
      <div class="col-md-6">
        <h3>Lista 2</h3>
        <ul class="list-group">
          <li class="list-group-item" ng-repeat="item2 in lista2">{{ item2 }}</li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <h3>Relacionamento</h3>
        <ul class="list-group">
          <li class="list-group-item" ng-repeat="rel in relacionamentos">
            {{ rel.item1 }} - {{ rel.item2 }}
            <button class="btn btn-danger" ng-click="excluirRelacionamento($index)">Excluir</button>
          </li>
        </ul>
      </div>
    </div>
   <div class="row">
        <div class="col-md-6">
             <h4>Relacionar</h4>
             <select class="form-control" ng-model="item1Selecionado">
                     <option value="">Selecione um item da lista 1</option>
                     <option ng-repeat="item1 in lista1" value="{{ item1 }}">{{ item1 }}</option>
             </select>
        </div>
        <div class="col-md-6">
             <h4>&nbsp;</h4>
             <select class="form-control" ng-model="item2Selecionado">
                     <option value="">Selecione um item da lista 2</option>
                     <option ng-repeat="item2 in lista2" value="{{ item2 }}">{{ item2 }}</option>
             </select>
        </div>
   </div>
   <div class="row">
        <div class="col-md-10">
        </div>
        <div class="col-md-2">
             <button class="btn btn-primary" ng-click="relacionar()">Relacionar</button>
        </div>
   </div>


  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
  <script>
    angular.module('myApp', [])
      .controller('myController', function ($scope) {
        $scope.lista1 = [
          "Texto longo 1",
          "Texto longo 2",
          "Texto longo 3"
        ];

        $scope.lista2 = [
          "Texto longo A",
          "Texto longo B",
          "Texto longo C"
        ];

        $scope.relacionamentos = [];

        $scope.relacionar = function () {
          if ($scope.item1Selecionado && $scope.item2Selecionado) {
            var relacionamento = {
              item1: $scope.item1Selecionado,
              item2: $scope.item2Selecionado
            };
            $scope.relacionamentos.push(relacionamento);
            $scope.item1Selecionado = '';
            $scope.item2Selecionado = '';
          }
        };

        $scope.excluirRelacionamento = function (index) {
          $scope.relacionamentos.splice(index, 1);
        };
      });
  </script>
</div>

