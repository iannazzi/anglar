class LoginController{
    constructor($rootScope, $scope, $auth, $state) {
        'ngInject';

        this.$auth = $auth;
        this.$scope = $scope;
        this.$state = $state;
        this.$rootScope = $rootScope;
        $scope.vm.company = 'Embrasse-moi';
        $scope.vm.username = 'admin';
        $scope.vm.password = 'iluv2tow';

    }
// curl localhost:8090/api/auth/login -H "Content-Type: application/json" -X POST -d '{"company":"Embrasse-moi","username":"admin","password":"iluv2tow"}'

    login(){
        var user = {
            company: this.company,
            username: this.username,
            password: this.password
        };
        var me = this;
        this.$auth
            .login(user)
            .then(function (response) {
                me.$auth.setToken(response.data);
                console.log('lgging in...');
                me.$rootScope.$broadcast('loginEvent', { loginHeaderText: 'logout' });
                me.$state.go('app.dashboard');
            })
            .catch(function (response) {
                console.log("error response", response);
            })
    };

}
export const LoginComponent = {
    templateUrl: './views/app/components/login/login.component.html',
    controller: LoginController,
    controllerAs: 'vm',
    bindings: {}
}


