<?php

namespace Tests\Feature;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class StudentTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    public function test_can_view_all_students()
    {
        $this->withoutExceptionHandling();
        $response = $this->get('/api/students');
        $response->assertStatus(200);
        $response->assertJsonStructure([
            'data' => [
                '*' => [
                    'identification',
                    'name',
                    'surname',
                    'email',
                    'phone',
                    'birthdate',
                    'address',
                    'status',
                    'created_at',
                    'updated_at',
                ],
            ],
        ]);
    }

    public function test_can_view_a_student()
    {
        $this->withoutExceptionHandling();
        $student = Student::factory()->create();
        $response = $this->get('/api/students/' . $student->id);
        $response->assertStatus(200);
    }

    public function test_can_create_a_student()
    {
        $this->withoutExceptionHandling();
        $response = $this->post('/api/students', [
            'identification' => 1312,
            'name' => 'Juan',
            'surname' => 'Perez',
            'email' => 'hola@hola.com',
            'phone' => '123456789',
            'birthdate' => '2020-01-01',
            'address' => 'Calle falsa 123',
        ]);
        $response->assertStatus(201);
        $response->assertJsonStructure([
            'id',
            'identification',
            'name',
            'surname',
            'email',
            'phone',
            'birthdate',
            'address',
            'created_at',
            'updated_at',
        ]);
    }

    public function test_can_update_a_student()
    {
        $this->withoutExceptionHandling();
        $student = Student::factory()->create();
        $response = $this->put('/api/students/' . $student->id, [
            'identification' => 1312,
            'name' => 'Juan',
            'surname' => 'Perez',
            'email' => 'hola@hola.com',
            'phone' => '123456789',
            'birthdate' => '2020-01-01',
            'address' => 'Calle falsa 123',
        ]);

        $response->assertStatus(200);
        $response->assertJsonStructure([
            'id',
            'identification',
            'name',
            'surname',
            'email',
            'phone',
            'birthdate',
            'address',
            'created_at',
            'updated_at',
        ]);
    }

    public function test_can_delete_a_student()
    {
        $this->withoutExceptionHandling();
        $student = Student::factory()->create();
        $response = $this->delete('/api/students/' . $student->id);
        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Student deleted',
        ]);
    }

    public function test_can_change_status_student(){
        $this->withoutExceptionHandling();
        $student = Student::factory()->create();
        $response = $this->put('/api/students/' . $student->id . '/status');
        $response->assertStatus(200);
        $response->assertJson([
            'message' => 'Student status changed',
        ]);
    }
}
