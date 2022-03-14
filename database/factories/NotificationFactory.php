<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Support\Str;

class NotificationFactory extends Factory
{
    protected $model = DatabaseNotification::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => Str::uuid(),
            'type' => 'App\Notifications\PostWasUpdate',
            'notifiable_type' => 'App\Models\User',
            'notifiable_id' => User::factory()->create()->id,
            'data' => 'Something message'
        ];
    }
}
