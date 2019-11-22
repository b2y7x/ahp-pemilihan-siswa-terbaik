<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_admin_can_view_a_admin_page()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->get('/admin');
        $response->assertViewIs('admin.admin');
    }
    public function test_guru_can_not_view_create_admin_form()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->get('admin/create');
        $response->assertRedirect('/');
    }
    public function test_admin_can_view_create_admin_form()
    {
        $user = User::where('email', 'admin@gmail.com')->first();
        $response = $this->actingAs($user)->get('admin/create');
        $response->assertViewIs('admin.create');
    }
}
