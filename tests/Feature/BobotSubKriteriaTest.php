<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use App\Kriteria;
use App\SubKriteria;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class BobotSubKriteriaTest extends TestCase
{
    public function test_admin_can_view_bobot_kriteria_menu_page()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->get('/bobot_sub_kriteria');
        $response->assertViewIs('bobot_sub_kriteria.menu');
    }
    public function test_admin_can_view_nilai_bobot_kriteria_page()
    {
        $user = factory(User::class)->make();
        $kriteria = Kriteria::wherenotnull('kode')->get()->first();
        $response = $this->actingAs($user)->get('/bobot_sub_kriteria/'.$kriteria->kode);
        $response->assertViewIs('bobot_sub_kriteria.nilai_bobot_sub_kriteria');
    }
    public function test_admin_can_view_edit_bobot_kriteria_form()
    {
        $user = User::where('email', 'admin@gmail.com')->first();
        $kriteria = Kriteria::wherenotnull('kode')->get()->first();
        $sub_kriteria = SubKriteria::wherenotnull('kode')->get()->first();
        $response = $this->actingAs($user)->get('bobot_sub_kriteria/'.$kriteria->kode.','.$sub_kriteria->kode.','.$sub_kriteria->kode.'/edit');
        $response->assertViewIs('bobot_sub_kriteria.ubah_bobot_sub_kriteria');
    }
}
