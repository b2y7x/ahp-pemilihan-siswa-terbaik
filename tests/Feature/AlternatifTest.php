<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use App\Alternatif;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AlternatifTest extends TestCase
{
    public function test_admin_can_view_alternatif_page()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->get('/alternatif');
        $response->assertViewIs('alternatif.alternatif');
    }
    public function test_admin_can_view_add_alternatif_form()
    {
        $user = User::where('email', 'admin@gmail.com')->first();
        $response = $this->actingAs($user)->get('alternatif/create');
        $response->assertViewIs('alternatif.tambah_alternatif');
    }
}
