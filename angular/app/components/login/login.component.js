class LoginController{
    constructor(API, $scope, $state, $cookies){
        'ngInject';

        this.API = API;
        $scope.id = 1;
        this.state = $state;
        this.cookies = $cookies;
        
    }

    submit(){
        var data = {
            company: this.company,
            username: this.username,
            password: this.password
        };
        this.API.all('users/login').post(data).then((response) => {

            // Retrieving a cookie
            //var favoriteCookie = $cookies.myFavorite;
        // Setting a cookie
            this.cookies.man = 'oatmeal';
            console.log('check cookies');
            this.state.go('app.dashboard');

    });
    }

}

export const LoginComponent = {
    templateUrl: './views/app/components/login/login.component.html',
    controller: LoginController,
    controllerAs: 'vm',
    bindings: {}
}


