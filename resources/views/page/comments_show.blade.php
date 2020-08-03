@foreach($comments as $comment)
<div class="media">
    <div class="avatar-user">
        <img src="images/unnamed.jpg" class="rounded-circle mr-3 img-fluid" alt="Sample Image">
    </div>
    <div class="media-body comment-content">
        <h5 class="mt-0"><span class="user-name">{{ $comment->customer->name }}</span> <small><i>Posted on
                    January 10, 2019</i></small></h5>
        <p>{{$comment->content}} {{$comment->id}}</p>
        <a data-toggle="collapse" href="#collapseExample{{ $comment->id }}" aria-expanded="false" aria-controls="collapseExample{{ $comment->id }}">
            Reply
        </a>
        <div class="collapse" id="collapseExample{{ $comment->id }}">
            <div class="card card-body">
                @if(Auth::guard('cus')->check())
                <form method="post" action="{{ route('comment.store') }}">
                    @csrf
                    <div class="form-group">
                        <textarea name="content" cols="70%" rows="3"></textarea>
                        <input type=hidden name=blog_id value="{{ $blog->id }}" />
                        <input type=hidden name=parent_id value="{{ $comment->id }}" />
                        <input type=hidden name="customer_id" value="{{ Auth::guard('cus')->user()->id }}" />
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-warning">Submit</button>
                    </div>
                </form>
                @endif
            </div>
        </div>
        <!-- Nested media object -->
        @include('page.comments_show', ['comments' => $comment->replies])
    </div>
</div>
@endforeach