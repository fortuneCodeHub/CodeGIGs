@auth
    @if (auth()->id() == $listing->user_id)
        <div class="action-bg">
            <a href= "../listing/{{$listing->id}}/edit" class="action-btn"><i class="bi bi-pencil-fill me-1"></i>Edit</a>
            <form action="../listing/{{$listing->id}}" method="POST">
                @csrf
                @method("DELETE")
                <button class="action-btn" type="submit"><i class="bi bi-trash me-1"></i>Delete</button>
            </form>
        </div>
    @else
        <div class="action-bg">
            <p class="text-danger" style="font-size: 16px">Ooops, Sorry you cannot perform any action on this job listing because you are not the one that posted it</p>
        </div>
    @endif
@else
    <div class="action-bg">
        <p class="text-danger" style="font-size: 16px">Ooops,  Please you have to log in to perform any action on any job listing post</p>
    </div>
@endauth

