<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function test_allProjects()
    // {
    //     $response = $this->get('/project/allProjects');

    //     $response->assertStatus(200);
    // }

    // public function test_singleProject()
    // {
    //     $response = $this->get('/project/singleProject/4');

    //     $response->assertStatus(200);
    // }

    // public function test_create(){
    //     $response = $this->post('/project/create',[
    //         'project_name' => 'lllll'
    //     ]);

    //     $response->assertStatus(302); //cause it redirect to all projects page
    // }

    public function test_update(){
        $response = $this->post('project/update/8/',[
            'project_name' => 'k5l'
        ]);

        $response->assertStatus(302); //cause it redirect to all projects page
    }

    // public function test_delete(){
    //     $response = $this->delete('project/delete/7/');

    //     $response->assertStatus(302); //cause it redirect to all projects page
    // }
}
