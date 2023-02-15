@foreach($comments as $comment)

<div class="d-flex flex-start mt-4 flex-column" style="@if($comment->parent_id != null) {{ 'margin-left:40px' }} @endif">
    <div class="d-flex flex-row">
        <img class="rounded-circle shadow-1-strong me-3"
        src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(10).webp" alt="avatar" width="65"
        height="65" />
        <div class="flex-grow-1 flex-shrink-1">
            <div>
                <div class="d-flex justify-content-between align-items-center">
                    <p class="mb-1"> {{ $comment->user->name }}
                        <span class="small ">- {{ $comment->created_at->format('h:i a') }}</span>
                    </p>
                    <div class="small flex-end flex-column d-flex">
                        <span> {{ $comment->created_at->format('d M Y') }}</span>
                        <button class="btn btn-success reply" data-reply="{{ $comment->id }}"> 
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-reply" viewBox="0 0 16 16">
                                <path d="M6.598 5.013a.144.144 0 0 1 .202.134V6.3a.5.5 0 0 0 .5.5c.667 0 2.013.005 3.3.822.984.624 1.99 1.76 2.595 3.876-1.02-.983-2.185-1.516-3.205-1.799a8.74 8.74 0 0 0-1.921-.306 7.404 7.404 0 0 0-.798.008h-.013l-.005.001h-.001L7.3 9.9l-.05-.498a.5.5 0 0 0-.45.498v1.153c0 .108-.11.176-.202.134L2.614 8.254a.503.503 0 0 0-.042-.028.147.147 0 0 1 0-.252.499.499 0 0 0 .042-.028l3.984-2.933zM7.8 10.386c.068 0 .143.003.223.006.434.02 1.034.086 1.7.271 1.326.368 2.896 1.202 3.94 3.08a.5.5 0 0 0 .933-.305c-.464-3.71-1.886-5.662-3.46-6.66-1.245-.79-2.527-.942-3.336-.971v-.66a1.144 1.144 0 0 0-1.767-.96l-3.994 2.94a1.147 1.147 0 0 0 0 1.946l3.994 2.94a1.144 1.144 0 0 0 1.767-.96v-.667z"/>
                              </svg>
                            Reply
                        </button>
                    </div>
                    
                </div>
                <p class="small mb-0">
                    {{ $comment->comment_body }}
                </p>
            </div>
        </div>
    </div>
    <div id="reply_{{ $comment->id }}" class="visually-hidden mx-auto mt-3 w-100">
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{ route('reply.store') }}" class="col-md-12">
        
        @csrf
        <div class="form-group">
            <input type="hidden" name="post_id" value="{{ $comment->post_id }}" />
            <input type="hidden" name="parent_id" value="{{ $comment->id }}" />
            <div class="form-group row mb-3">
                <textarea name="comment_body" class="form-control" rows="3" placeholder="Comment"></textarea>
            </div>
        </div>
        <div class="form-group row">
            <input type="submit" class="btn btn-primary" value="Comment">
        </div>
    </form>
    </div>
    
    
    @include('templates.replies', ['comments' => $comment->replies])
</div>
@endforeach