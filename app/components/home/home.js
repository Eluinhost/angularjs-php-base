'use strict';

angular.module('tempApp')
    .controller('HomeCtrl', function ($scope, $http) {

        $scope.title = 'Temp Application';

        $scope.me = {
            'name': 'Loading...',
            'age': 'Loading...'
        };

        $http.get('/api/me').success(function(val) {
            $scope.me = val;
        });
    });
