export function RoutesConfig($stateProvider, $urlRouterProvider) {
    'ngInject';

    var getView = function (viewName) {
        return './views/app/pages/' + viewName + '/' + viewName + '.page.html';
    };

    $urlRouterProvider.otherwise('/');

    $stateProvider
        .state('app', {
            abstract: true,
            views: {
                header: {
                    templateUrl: getView('header')
                },
                footer: {
                    templateUrl: getView('footer')
                },
                main: {}
            },

        })
        .state('app.landing', {
            url: '/',
            views: {
                'main@': {
                    templateUrl: getView('landing'),
                    controller: function ($scope) {
                        $scope.params = "params";
                        $scope.data = "data";
                        $scope.items = ['a', 'list'];


                    }
                }

            }

        })
        .state('app.create_todo', {
            url: '/create-todo',
            views: {
                'main@': {
                    templateUrl: getView('create_todo')
                }
            }
        })
        .state('app.login', {
            url: '/login',
            views: {
                'main@': {
                    templateUrl: getView('login')
                }
            }
        })
        .state('app.register', {
            url: '/register',
            views: {
                'main@': {
                    templateUrl: getView('register')
                }
            }
        })
        .state('app.dashboard', {
            url: '/dashboard',
            views: {
                'main@': {
                    templateUrl: getView('dashboard'),
                    controller: function ($scope) {
                        $scope.params = "params";
                        $scope.data = "data";
                        $scope.items = ['a', 'list'];
                    }
                }
            }
        })

    ;
}
