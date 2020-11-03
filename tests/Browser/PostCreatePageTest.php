<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\WithFaker;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class PostCreatePage extends DuskTestCase
{
    use WithFaker;

    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testCreatePost()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/posts/create')
                    ->waitForText('Cadastrar Postagem')
                    ->type('title', $this->faker->sentence(2))
                    ->type('description', $this->faker->text(40))
                    ->press('Cadastrar')
                    ->assertSee('Post criado com sucesso!');
        });
    }
}
