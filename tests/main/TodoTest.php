<?php

use IannazziTestLibrary\Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TodoTest extends TestCase
{
    /** @test */
    public function create_a_todo_sucessfully()
    {
        $todo = factory(App\Models\Main\Todo::class)->make();
        $this->post('/api/todos', [
            'task' => $todo->task,
            'completed' => $todo->completed
    ])
        ->seeApiSuccess()
        ->seeJsonObject('todo')
        ->seeJsonKeyValueString('task', $todo->task);

        $this->seeJsonKeyValue('completed', $todo->completed);

        $this->seeInDatabase('todos',[
            'task' => $todo->task,
            'completed' => $todo->completed
        ], 'main');


    }
}
