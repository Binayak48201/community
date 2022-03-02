<?php


namespace App;


use App\Models\Activities;

trait RecordsActivity
{

    public static function bootRecordsActivity()
    {
        if (auth()->guest()) return;
        foreach (static::getActivitiesRecord() as $event) {
            //created
            static::$event(function ($model) use ($event) {
                $model->recordActivities($event);
            });
        }

        static::deleting(function ($model) {
            $model->activity()->delete();
        });
    }

    protected static function getActivitiesRecord()
    {
        return ['created'];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function activity()
    {
        return $this->morphMany(Activities::class, 'subject');
    }

    /**
     * @param $event
     */
    protected function recordActivities($event) //created
    {
        $this->activity()->create([
            'user_id' => auth()->id(),
            'type' => $this->getActivityType($event)
        ]);
    }

    /**
     * @param $event
     * @return string
     */
    protected function getActivityType($event)
    {
        return $event . '_' . strtolower((new \ReflectionClass($this))->getShortName());
    }

}
