//import {YourComponent} from './app/components/your/your.component';

//angular.module('app.components').component('yourComponent', YourComponent);


import {CreateTodoFormComponent} from './app/components/create_todo_form/create_todo_form.component';

angular.module('app.components').component('createTodoForm', CreateTodoFormComponent);

import {LoginComponent} from './app/components/login/login.component';

angular.module('app.components').component('login', LoginComponent);

import {RegisterComponent} from './app/components/register/register.component';

angular.module('app.components').component('register', RegisterComponent);


import {DashboardComponent} from './app/components/dashboard/dashboard.component';
angular.module('app.components').component('dashboard', DashboardComponent);

import {HeaderComponent} from './app/components/header/header.component';
angular.module('app.components').component('header', HeaderComponent);


componentImporter('header');

function componentImporter(name)
{
    import {name | ucfirst + 'Component'} from './app/components/'+ name + '/' + name +'.component';

    angular.module('app.components').component(name, name | ucfirst + 'Component');
}