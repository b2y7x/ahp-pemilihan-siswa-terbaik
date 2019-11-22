<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\User;
use App\Kriteria;
use App\SubKriteria;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HasilTest extends TestCase
{
    public function test_admin_can_view_hasil_menu_pilih_jurusan_page()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->get('/hasil');
        $response->assertViewIs('perhitungan.jurusan');
    }
    public function test_admin_can_view_hasil_menu_pilih_kelas_page()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->get('/hasil/IPA');
        $response->assertViewIs('perhitungan.kelas');
    }
    public function test_admin_can_view_hasil_page()
    {
        $user = factory(User::class)->make();
        $response = $this->actingAs($user)->get('/hasil/IPA/X');
        $response->assertViewIs('perhitungan.hasil');
    }
}
