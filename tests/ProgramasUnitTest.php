<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ProgramasUnitTest extends TestCase
{
    /**
     * @group programasUnit
     */

    public function testDatabase()
    {
        $user = factory(App\Programa::class)->create([
            'titulo' => 'Docu de medianoche'
        ]);
        $this->seeInDatabase('programas', ['titulo' => 'Docu de medianoche']);
        // Use model in tests...
    }

    /**
     * @group programasUnit
     */
    public function testDatabaseCorrect()
    {
        $user = factory(App\Programa::class)->create([
            'titulo' => 'Docu de luna llena',
            'poster' => 'DocumentaQro.jpg'
        ]);

        $this->seeInDatabase('programas', ['titulo' => 'Docu de luna llena','poster' => 'DocumentaQro.jpg']);

        // Use model in tests...
    }
}
