'use strict';

var myApp = angular.module('myApp', [
    'ngRoute',
    'appControllers',
    'teamService',
    'settingService',
    'donationService',
    'ui.bootstrap',
    'angular.filter'
]);



/*****************
*  REST Services *
*****************/

var teamService = angular.module('teamService', ['ngResource']);
var settingService = angular.module('settingService', ['ngResource']);
var donationService = angular.module('donationService', ['ngResource']);

teamService.factory('Team', ['$resource',
  function($resource){
    return $resource('./api/teams/', {}, {
      'get': {method:'GET', headers: {'Content-Type': 'application/x-www-form-urlencoded'}, isArray:false},
    });
  }]);

settingService.factory('Setting', ['$resource',
  function($resource){
    return $resource('./api/settings/', {}, {
      'get': {method:'GET', headers: {'Content-Type': 'application/x-www-form-urlencoded'}, isArray:false},
    });
  }]);

donationService.factory('Donation', ['$resource',
  function($resource){
    return $resource('./api/donations/', {}, {
      'get': {method:'GET', headers: {'Content-Type': 'application/x-www-form-urlencoded'}, isArray:false},
    });
  }]);
