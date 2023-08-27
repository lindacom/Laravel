   
    <div id="reply-{{ $reply->id }}" class="panel panel-default">
        <div class="panel-heading">
            
            <div class="level">
               
                <h5 class="flex">
                <!-- reply owner doesn't work -->
              {{--  <a href="{{ route('profile', $reply->owner) }}"> --}}
  
                 <a href="{{ route('profilethread', $reply->name) }}">
                 <!-- reply owner name doesn't work -->
              {{--    {{ $reply->owner->name }} --}}
                 {{ $reply->name }}
                    </a> said {{ $reply->created_at->diffForHumans() }}... 
                </h5>              

                </div>
               <!-- show the number of favourites -->

              {{-- {{ $reply->favorites()->count() }} 

                <form method="POST" action="/replies/{{ $reply->id }}/favorites">
                {{ csrf_field() }}
                <button type="submit" class="btn btn-default" {{ $reply->isFavorited() ? 'disabled' : ''}}>Favorite</button>
                </form> --}}

                </div>

                <div class="panel-body">
                {{ $reply->body }}
                </div>

@can ('update', $reply)
<div class="panel-footer">
<form method="POST" action="/replies/{{ $reply->id }}">
{{ csrf_field() }}
{{ method_field('DELETE') }}

<button type="submit" class="btn btn-danger btn-xs">Delete</button>
</form>
</div>
@endcan

                </div>


           {{--     @if (Auth::check())
                    <div>
                        <favorite :reply="{{ $reply }}"></favorite>
                    </div>
                @endif
            </div>
        </div>

        <div class="panel-body">
                        <div class="form-group">
                    <textarea class="form-control"></textarea>
                </div>

                <button class="btn btn-xs btn-primary">Update</button>
                <button class="btn btn-xs btn-link">Cancel</button>
            </div>
        </div>

        @can ('update', $reply)
            <div class="panel-footer level">
                <button class="btn btn-xs mr-1">Edit</button>
                <button class="btn btn-xs btn-danger mr-1">Delete</button>
            </div>
        @endcan
    </div> --}}
