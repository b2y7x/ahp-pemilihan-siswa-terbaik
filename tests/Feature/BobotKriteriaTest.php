<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use App\Kriteria;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BobotKriteriaTest extends TestCase
{
    public function test_admin_can_view_bobot_kriteria_page()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->get('/bobot_kriteria');
        $response->assertViewIs('bobot_kriteria.nilai_bobot_kriteria');
    }
    public function test_admin_can_view_edit_bobot_kriteria_form()
    {
        $user = User::where('email', 'admin@gmail.com')->first();
        $kriteria = Kriteria::wherenotnull('kode')->get()->first();
        $response = $this->actingAs($user)->get('bobot_kriteria/'.$kriteria->kode.','.$kriteria->kode.'/edit');
        $response->assertViewIs('bobot_kriteria.ubah_bobot_kriteria');
    }
}
