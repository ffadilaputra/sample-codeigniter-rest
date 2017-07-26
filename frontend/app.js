var App = angular.module('App', []);

App.controller('Contact', function($scope, $http) {
  $http.get('http://localhost/belajar-ci-res/contact')
       .then(function(res){
          $scope.items = res.data;
        });
});
