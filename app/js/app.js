'use strict';

var app = angular.module('myApp', ['ui.bootstrap']);

app.controller('MainController', ['$scope', '$http', function($scope, $http){
    $scope.states = [];
    $scope.cities = [];
    // $scope.selectedState = {"id": -1, "name": "Default"};
    $scope.selectedState = {};
    $scope.selectedCity = {};
    $scope.msgSelectState = "Please select state";
    $scope.msgSelectCity = "Please select city";

    $http.get('http://kkshki.esy.es/cities/get-states.php')
    .then(function(resp){
        console.log(resp.data);
        $scope.states = resp.data;
        // $scope.selectedState = resp.data[0];
    });

    $scope.loadCities = function(){
        $http.get('http://kkshki.esy.es/cities/get-cities-by-state.php',{
            params: {"q": $scope.selectedState.id}
        })
        .then(function(resp){
            console.log(resp.data);
            $scope.cities = resp.data;
            // $scope.selectedCity = resp.data[0];
        });
    }

}]);
