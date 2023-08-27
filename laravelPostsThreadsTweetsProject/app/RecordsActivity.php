<?php

namespace App;

trait RecordsActivity
{

    protected static function bootRecordsActivity()
    {

        if (auth()->guest()) return;
        
        //listens for when a model is created
        static::created(function ($thread) {
            $thread->recordActivity('created');
        });
    }

    protected function recordActivity($event)
    {
        //generates a new activity record

        $this->activity()->create([
            'user_id' => auth()->id(),
            'type' => $this->getActivityType($event)
        ]);

      //  Activity::create([
           // 'user_id' => auth()->id(),
           // 'type' => $this->getActivityType($event),
          //  'subjec_id' => $this->id,
          //  'subject_type' => get_class($this)
      //  ]);
    }

    public function activity()
    {
        return $this->morphMany('App\Activity', 'subject');
    }

    protected function getActivityType($event)
    {
       $type = strtolower(( new \ReflectionClass($this))->getShortName());
   
   return "{$event}_{$type}";

   
    }
}