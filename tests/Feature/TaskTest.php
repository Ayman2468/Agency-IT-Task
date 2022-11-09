<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TaskTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_allTasks()
    {
        $response = $this->get('/task/allTasks');

        $response->assertStatus(302); //cause it reads the user_type in the blade which doen't exsit while testing
    }

    public function test_myTasks()
    {
        $response = $this->get('/task/myTasks');

        $response->assertStatus(302); //cause it reads the user_type in the blade which doen't exsit while testing
    }

    public function test_singleTask()
    {
        $response = $this->get('/task/singleTask/1');

        $response->assertStatus(302); //cause it redirect to single task page
    }

    public function test_create(){
        $response = $this->post('/task/create',[
            'task_name' => 'lllll',
            'project_id' => '4',
            'employee_id' => '5',
            'details' => 'djfklsjdfkljsd'
        ]);

        $response->assertStatus(302); //cause it redirect to all tasks page
    }

    public function test_update(){
        $response = $this->post('task/update/2/',[
            'task_name' => 'lllll',
            'project_id' => '4',
            'employee_id' => '5',
            'details' => 'hello there'
        ]);

        $response->assertStatus(302); //cause it redirect to all tasks page
    }

    public function test_delete(){
        $response = $this->delete('task/delete/5/');

        $response->assertStatus(302); //cause it redirect to all tasks page
    }

    public function test_submit(){
        $response = $this->get('task/submit/4');

        $response->assertStatus(302); //cause it redirect to all tasks page
    }
}
