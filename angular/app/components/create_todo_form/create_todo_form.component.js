class CreateTodoFormController {
    constructor(API, ToastService) {
        'ngInject';
        this.API = API;
        this.ToastService = ToastService;

    }

    submit() {
        var data = {
            task: this.task,
            completed: this.completed
        };

        if (!this.task) {
            return false;
        }

        this.API.all('todos').post(data).then((response) => {
            this.ToastService.show('Post added successfully');
        alert('yed');
    });
    }
}

export const CreateTodoFormComponent = {
    templateUrl: './views/app/components/create_todo_form/create_todo_form.component.html',
    controller: CreateTodoFormController,
    controllerAs: 'vm',
    bindings: {}
}


