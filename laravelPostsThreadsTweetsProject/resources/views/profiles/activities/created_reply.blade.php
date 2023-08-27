<!-- this is pulling in the layout from the activity file with slots for content the same way blade does -->

@component('profiles.activities.activity')
    @slot('heading')
        {{ $profilethreadUser->name }} replied to
        <a href="{{ $activity->subject->thread->path() }}">"{{ $activity->subject->thread->title }}"</a>
    @endslot

    @slot('body')
        {{ $activity->subject->body }}
    @endslot
@endcomponent