//import {headerController} from './app/pages/header/header.page';

function headerController($scope){
    $scope.$on('loginEvent', function (event, args) {

        $scope.login = args.loginHeaderText;

    });

}
angular.module('app.controllers').controller('headerController', headerController);

function dashboardController($rootScope, $state, $scope, $auth){
    $scope.isAuthenticated = function () {
        return $auth.isAuthenticated();
    };
    document.title = "Dashboard";
    $scope.logout = function () {
        $auth.logout();

        $rootScope.$broadcast('loginEvent', { loginHeaderText: 'login' });


        $state.go('app.home');
    };

}

angular.module('app.controllers').controller('dashboardController', dashboardController);