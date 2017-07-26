function contact_ctrl($scope, $http) {
      $scope.items = []

      $scope.getItems = function() {
       $http({method : 'GET',url : 'http://localhost/belajar-ci-res/contact', headers: { 'X-Parse-Application-Id':'XXXXXXXXXXXXX', 'X-Parse-REST-API-Key':'YYYYYYYYYYYYY'}})
          .success(function(data, status) {
              $scope.items = data;
           })
          .error(function(data, status) {
              alert("Error");
          })
      }
  }
