'use strict';

var app = angular.module('myApp', ['ui.bootstrap']);

app.controller('MainController', ['$scope', '$http', function($scope, $http){
    $scope.selected = {id:-1, name: ""};

    $scope.getStates = function(val) {
        return $http.get('http://kkshki.esy.es/cities/get-cities.php', {
            params: {q:val}
        }).then(function(response){
            return response.data.map(function(item){
                return {
                    id: item.id,
                    name: item.name + ', ' + item.state
                };
            });
        });
    };

    $scope.modelOptions = {
        debounce: {
            default: 500,
            blur: 250
        },
        getterSetter: true
    };

}]);
