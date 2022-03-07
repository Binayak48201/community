<?php

namespace App;

use App\Models\PostSubscriptions;

trait Subscription
{
    public function subscribe($user = null)
    {
        return $this->subscriptions()->create([
            'user_id' => $user ?: auth()->id()
        ]);
    }

    public function unsubscribe($user = null)
    {
        $user = $this->subscriptions()->where('user_id', $user ?: auth()->id());

        if ($user->count()) {
            $user->delete();
        }
    }

    public function subscriptions()
    {
        return $this->hasMany(PostSubscriptions::class);
    }

    public function getIsSubscribedToAttribute()
    {
        return !!$this->subscriptions()->where('user_id', auth()->id())->count();
    }

    public function getIsSubscribedCountAttribute()
    {
        return $this->subscriptions()->count();
    }
}
