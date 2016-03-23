<?php

use App\Models\Main\System;
use IannazziTestLibrary\Tests\TestCase;


class RegisterASystemTest extends TestCase
{
    /** @test */
    public function create_a_system_sucessfully()
    {
        System::truncate();
        //$system = factory(System::class)->make();
        $system = factory(System::class,'embrasse-moi')->make();

        //dd($system->toArray());
        $this->post('/api/register', [
            'company' => $system->company,
            'name' => $system->name,
            'phone' => $system->phone,
            'address' => $system->address,
            'email' => $system->email,
            'password' => $system->password,
            'password_confirmation' => $system->password,

        ])
            ->seeApiSuccess()
            ->seeJsonObject('data');
            //->seeJsonKeyValueString('name', $system->name);

        //$this->seeJsonKeyValue('company', $system->company);

        $this->seeInDatabase('systems',[
            'name' => $system->name,
            'company' =>  $system->company,
            'phone' => $system->phone,
            'address' => $system->address,
            'email' => $system->email,
            'password' => $system->password,
        ], 'main');


    }
}
