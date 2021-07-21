<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\Movie;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_itCanCreatedMovie()
    {
        $response = $this->post('movies', [
            'title' => 'pavadinimas',
            'description' => 'aprasymas',
            'imdb'=>'linkas',
            'seen' => 'Seen',
            'schedule' => '2020-07-12',
            'user_id' => '1',
        ]);

        // $response->dump();

        $this->assertCount(1, Movie::all());
        $response->assertStatus(302)->withSession('success','Movie added successfully.');
    }
    public function test_itCanShownMovie()
    {
     
        $movie = Movie::factory()->create();

        $response = $this->get('movies/'.$movie->id, [
            'title',
            'description',
            'imdb',
            'seen' ,
            'schedule',
            'user_id',
        ]);
      
        $this->assertNotNull($movie->title);
        $this->assertNotNull($movie->description);
        $this->assertNotNull($movie->imdb);
        $this->assertNotNull($movie->seen);
        $this->assertNotNull($movie->schedule);
        $this->assertNotNull($movie->user_id);
       
    }
    public function test_itCanDeletedMovie()
    {
        $movie = Movie::factory()->create();

        $response = $this->delete('movies/'.$movie->id, [
            'title',
            'description',
            'imdb',
            'seen' ,
            'schedule',
            'user_id',
        ]);
        $this->assertCount(0, Movie::all());
    }
     public function test_itCanUpdatedMovie()
     {
        $movie = Movie::factory()->create();
       

        $response = $this->put('movies/'.$movie->id, [
            'title' => 'pavadinimas',
            'description' => 'aprasymass',
            'imdb'=>'linkas',
            'seen' => 'Seen',
            'schedule' => '2020-07-12',
        ]);


        $movie->refresh();

        $this->assertTrue($movie->title === 'pavadinimas');
        $this->assertTrue($movie->description === 'aprasymass');
        $this->assertTrue($movie->imdb === 'linkas');
        $this->assertTrue($movie->seen === 'Seen');
        $this->assertTrue($movie->schedule === '2020-07-12');

       
    }
}
