'use strict';

    var appControllers = angular.module("appControllers", []);

    appControllers.controller('trackController', ['$scope', '$http', '$routeParams', '$location', 'Team', 'Setting', function($scope, $http, $routeParams, $location, Team, Setting) {
      $scope.greeting = 'Hola!';

      $scope.teams = Team.get(function(team) {
            console.log(team.data)
            $scope.teams = team.data;
        });

      $scope.settings = Setting.get(function(setting) {
            console.log(setting.data)
            $scope.settings = setting.data;
        });
    }]);
