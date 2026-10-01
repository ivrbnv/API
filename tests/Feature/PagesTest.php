<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PagesTest extends TestCase
{
    use RefreshDatabase;
    /** @test */
    public function public_pages_return_200()
    {
        $publicRouteNames = [
            'about',
            'resources',
            'faq',
            'pricing'
        ];

        foreach ($publicRouteNames as $name) {
            $response = $this->get(route($name));
            $response->assertStatus(200);
        }
    }

    /** @test */
    public function protected_pages_redirect_guests()
    {
        $protectedRouteNames = [
            'dashboard',
            'profile',
            'session.start',
            'session.startsession',
            'session.stopsession',
            'session.results',
            'tips',
            'history',
            #'resources.export',
        ];

        
        foreach ($protectedRouteNames as $name) {
            $response = $this->get(route($name));
            $response->assertRedirect('/login');
        }
    }

    /** @test */
    public function authenticated_users_can_access_protected_pages()
    {
        $user = User::factory()->create();

        $protectedRouteNames = [
            'dashboard',
            'profile',
            'session.start',
            'session.startsession',
            'session.stopsession',
            'session.results',
            'tips',
            'history',
            #'resources.export',
        ];

        foreach ($protectedRouteNames as $name) {
            $response = $this->actingAs($user)->get(route($name));
            $response->assertStatus(200);
        }
    }

    /** @test */
    public function post_routes_redirect_guests()
    {
        $postRoutes = [
            'session.startsetup',
        ];

        foreach ($postRoutes as $name) {
            $response = $this->post(route($name));
            $response->assertRedirect('/login');
        }
    }

    /** @test */
    public function authenticated_users_can_post_to_protected_routes()
    {
        $user = User::factory()->create();

        $postRoutes = [
            'session.startsetup',
        ];

        foreach ($postRoutes as $name) {
            $response = $this->actingAs($user)->post(route($name), [
                // include any required POST data here
            ]);
            $response->assertStatus(200); // or whatever your controller returns
        }
    }

}
