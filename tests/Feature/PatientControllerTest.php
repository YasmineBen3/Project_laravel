<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PatientControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function it_can_get_patient_by_id()
    {
        $patient = factory(\App\Patient::class)->create();


        $response = $this->get("/patients/{$patient->id}");

        $response->assertStatus(200);
        $response->assertJson([
            'id' => $patient->id,
            'name' => $patient->name,
            'email'=>$patient->email,
            'dob'=>$patient->dob,
        ]);
    }
}
