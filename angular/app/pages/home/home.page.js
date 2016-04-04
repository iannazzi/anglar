export class HomeController{
    constructor($scope, $auth, $window, $rootScope) {
        'ngInject';

        $scope.isAuthenticated = function() {
            return $auth.isAuthenticated();
        };

        $scope.linkInstagram = function() {
            $auth.link('instagram')
                .then(function(response) {
                    $window.localStorage.currentUser = JSON.stringify(response.data.user);
                    $rootScope.currentUser = JSON.parse($window.localStorage.currentUser);
                });
        };

    }



}

// export const HomePage = {
//     templateUrl: './views/app/components/login/home.page.html',
//     controller: HomeController,
//     controllerAs: 'vm',
//     bindings: {}
// }


