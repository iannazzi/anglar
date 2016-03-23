class RegisterController {
    constructor(API) {
        'ngInject';
        this.API = API;
    }

    submit() {
        var data = {
            company: this.company,
            name: this.name,
            email: this.email,
            phone: this.phone,
            password: this.password,
            password_confirmation: this.password_confirmation
        };

        this.API.all('register').post(data).then((response) => {


    });
    }


}


export const RegisterComponent = {
    templateUrl: './views/app/components/register/register.component.html',
    controller: RegisterController,
    controllerAs: 'vm',
    bindings: {}
}


