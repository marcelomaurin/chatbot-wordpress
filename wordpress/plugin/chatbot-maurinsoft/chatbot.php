<!DOCTYPE html>
<html ng-app="App" lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="Maurinsoft">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Teste de Chatbot</title>

  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.5.6/angular.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="/wp-content/plugins/maurinsoft/css/style.css">
  <script src="https://code.angularjs.org/1.6.4/angular.js"></script>
  <script src="/wp-content/plugins/chatbot-maurinsoft/js/ctlr_test.js"></script>
</head>

<body ng-controller="TesteCtrl">
  <div class="container">
    <div class="row">
      <div class="col-xs-2">
        <img src="/wp-content/plugins/chatbot-maurinsoft/img/logo.png" alt="Tutorial de CSS" title="Logo do CSS" width="100" height="100" />
      </div>
      <div class="col-xs-10">
        <h1 class="titulo">{{app}}</h1>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12 menu">
        <div class="row">
          <div class="col-xs-12">
            <h4 class="menu_titulo">Conversa</h4>
          </div>
        </div>

        <div class="row">
             <div class="col-xs-12 textarea" style="height: 200px;"> <!-- Definindo uma altura fixa de 200 pixels -->
                  <textarea ng-model="texto" type="text" style="width: 100%; height: 100%;"></textarea> <!-- Definindo a largura e altura como 100% -->
             </div>
        </div>

        <div class="row">
          <div class="col-xs-12">
            <h4>Pergunta</h4>
          </div>
        </div>

        <div class="row">
          <div class="col-xs-8">
            <input ng-model="pergunta" type="text" name="Pergunta" class="form-control">
          </div>
          <div class="col-xs-4">
            <input type="submit" value="Enviar" ng-click="displayResposta()" class="btn btn-primary">
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-xs-12">
        <center>{{msg}}</center>
      </div>
    </div>
  </div>
</body>

</html>

