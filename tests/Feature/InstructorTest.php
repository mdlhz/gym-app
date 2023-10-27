<?php

use App\Models\ClassType;
use App\Models\User;
use function Pest\Laravel\followingRedirects;
use function Pest\Laravel\seed;

it('should redirect instructor correctly', function () {
    $user = User::factory()->create([
        'role' => 'instructor'
    ]);

    $response = $this->actingAs($user)->get('/dashboard');

    $response->assertStatus(302);

    followingRedirects($response)->assertAuthenticatedAs($user);
});

it('instructor can schedule a class', function () {
    $user = User::factory()->create([
        'role' => 'instructor'
    ]);
    seed(\Database\Seeders\ClassTypeSeeder::class);

    $response = $this->actingAs($user)->post('instructor/schedule', [
        'class_type_id' => ClassType::first()->id,
        'date' => '2023-10-31',
        'time' => '09:00'
    ])->assertRedirect('instructor/schedule');

//    $response->assertStatus(302);

});
