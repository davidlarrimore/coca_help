'use strict';

var myApp = angular.module('myApp', [
    'ngRoute',
    'appControllers',
    'teamService',
    'settingService',
    'ui.bootstrap'
]);



/*****************
*  REST Services *
*****************/

var teamService = angular.module('teamService', ['ngResource']);
var settingService = angular.module('settingService', ['ngResource']);

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
