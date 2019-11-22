<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use App\Kriteria;
use App\SubKriteria;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class SubKriteriaTest extends TestCase
{
    public function test_admin_can_view_sub_kriteria_page()
    {
        $user = factory(User::class)->make();
        $kriteria = Kriteria::wherenotnull('kode')->get()->first();
        $response = $this->actingAs($user)->get('/sub_kriteria/'.$kriteria->kode);
        $response->assertViewIs('sub_kriteria.sub_kriteria');
    }
    public function test_admin_can_view_create_sub_kriteria_form()
    {
        $user = factory(User::class)->make();
        $kriteria = Kriteria::wherenotnull('kode')->get()->first();
        $response = $this->actingAs($user)->get('sub_kriteria/'.$kriteria->kode.'/create');
        $response->assertViewIs('sub_kriteria.tambah_sub_kriteria');
    }
}
