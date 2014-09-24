'use strict';

angular.module('tempApp', ['ui.router'])

    .config(function ($stateProvider, $urlRouterProvider) {
        $urlRouterProvider.otherwise('/');

        $stateProvider
            .state('home', {
                url: '/',
                templateUrl: 'components/home/home.html',
                controller: 'HomeCtrl'
            });
    });
