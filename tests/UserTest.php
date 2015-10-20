<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class UserTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
   /* public function testExample()
    {
        $this->assertTrue(true);
    }*/

    //Probar insertado
    public function testDatabase()
    {
        $user = factory(App\User::class)->create([
            'name' => 'Saul',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('administrador')
        ]);

        $this->seeInDatabase('users', ['email' => 'admin@gmail.com']);

        // Use model in tests...
    }

    //Probar email existente
    public function testEmail()
    {
        $user = factory(App\User::class)->create([
            'name' => 'Saul',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('administrador')
        ]);

        $this->seeInDatabase('users', ['email' => 'admin@gmail.com']);

        // Use model in tests...
    }




}
