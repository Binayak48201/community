<ul>

    @foreach($activities as $activity)

       @include("profile.activity.{$activity->type}",['activity' =>$activity])

    @endforeach
</ul>

