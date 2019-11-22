<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use App\Kriteria;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class KriteriaTest extends TestCase
{
    public function test_admin_can_view_kriteria_page()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->get('/kriteria');
        $response->assertViewIs('kriteria.kriteria');
    }
    public function test_admin_can_view_create_kriteria_form()
    {
        $user = User::where('email', 'admin@gmail.com')->first();
        $response = $this->actingAs($user)->get('kriteria/create');
        $response->assertViewIs('kriteria.tambah_kriteria');
    }
}
