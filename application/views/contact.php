<!DOCTYPE html>
<html ng-app>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="node_modules/semantic-ui/dist/semantic.min.css">
    <link rel="stylesheet" href="node_modules/angular/angular-csp.css">
    <script src="node_modules/angular/angular.min.js"></script>
    <script type="text/javascript" src="frontend/contact.js"></script>
  </head>
  <body>

    <div class="" ng-controller="contact_ctrl">
          <button type="button" ng-click="getItems()" name="button">Get Contact</button>
          <ul>
              <li ng-repeat="item in items"> {{ items.name }}</li>
          </ul>
    </div>

    <script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="node_modules/semantic-ui/dist/semantic.min.js"></script>
  </body>
</html>
