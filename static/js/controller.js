'use strict';

var appControllers = angular.module("appControllers", []);

appControllers.controller('trackController', ['$scope', '$http', '$routeParams', '$location', 'Team', 'Setting', 'Donation', function($scope, $http, $routeParams, $location, Team, Setting, Donation) {
    $scope.greeting = 'Hola!';

    $scope.teams = Team.get(function(team) {
        console.log(team.data)
        $scope.teams = team.data;
    });

    $scope.settings = Setting.get(function(setting) {
        console.log(setting.data)
        $scope.settings = setting.data;
        $scope.settings.current_funding_amount = 0;

        $scope.donations = Donation.get(function(donation) {
            console.log(donation.data)
            $scope.donations = donation.data;
            $scope.settings.current_funding_amount = 0;
            angular.forEach(donation.data, function(value, key) {
                $scope.settings.current_funding_amount += Number(value.amount);
                $scope.settings.number_of_donations ++;
            });
            console.log("Current Donation Amount: " + $scope.settings.current_funding_amount);
            console.log("Campaign Funding Goal: " + $scope.settings.campaign_funding_goal);
            $scope.pct_of_funding_total = Math.round(($scope.settings.current_funding_amount / $scope.settings.campaign_funding_goal) * 100);


            $scope.progressBar = function() {
                var value = $scope.pct_of_funding_total;
                var type;
                console.log("Percent of Funding Total: " + value);
                if (value < 25) {
                    type = 'warning';
                } else if (value < 51) {
                    type = 'info';
                } else if (value < 74) {
                    type = 'success';
                } else {
                    type = 'success';
                }

                $scope.showWarning = type === 'danger' || type === 'warning';

                $scope.type = type;
            };

            $scope.progressBar();

        });
    });



}]);
