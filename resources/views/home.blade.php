@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('SPA app Comments') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="d-flex row col-md-12 flex-column mx-auto">
                        <h2 class="d-flex justify-content-center">Display Comments</h2>
                        <div class="w-100 d-flex justify-content-end">
                            <div class=" flex-end">
                                <span>Sort by:</span>
                                <select id="sort" class="form-select">
                                    <option value="name.asc" 
                                        @if(isset($_GET['sortby'], $_GET['sort']))      
                                            @if($_GET['sortby'] == 'name' && $_GET['sort'] == 'asc') 
                                                selected 
                                            @endif 
                                        @endif>
                                        Name asc
                                    </option>
                                    <option value="name.desc" 
                                        @if(isset($_GET['sortby'], $_GET['sort'])) 
                                            @if($_GET['sortby'] == 'name' && $_GET['sort'] == 'desc') 
                                                selected 
                                            @endif
                                        @endif>
                                        Name desc
                                    </option>
                                    <option value="email.asc" 
                                        @if(isset($_GET['sortby'], $_GET['sort'])) 
                                            @if($_GET['sortby'] == 'email' && $_GET['sort'] == 'asc') 
                                                selected 
                                            @endif 
                                        @endif>
                                        Email asc
                                    </option>
                                    <option value="email.desc" 
                                        @if(isset($_GET['sortby'], $_GET['sort'])) 
                                            @if($_GET['sortby'] == 'email' && $_GET['sort'] == 'desc') 
                                                selected 
                                            @endif 
                                        @endif>
                                        Email desc
                                    </option>
                                    <option value="created_at.asc" 
                                        @if(isset($_GET['sortby'], $_GET['sort'])) 
                                            @if($_GET['sortby'] == 'created_at' && $_GET['sort'] == 'asc') 
                                                selected 
                                            @endif 
                                        @endif>
                                        Creation date asc
                                    </option>
                                    <option value="created_at.desc" 
                                        @if(isset($_GET['sortby'], $_GET['sort']))
                                            @if($_GET['sortby'] == 'created_at' && $_GET['sort'] == 'desc') 
                                                selected
                                            @endif 
                                        @else
                                            selected
                                        @endif>
                                        Creation date desc
                                    </option>
                                </select>
                            </div>
                        </div>
                        
                        <div class="row mx-auto">
                            
                           
                            <div class="col mb-3">
                                    @include('templates.replies', ['comments' => $post->comments])
                            </div>
                        </div>
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                              <li class="page-item 
                                @if(isset($_GET['page'])) 
                                    @if($_GET['page'] == 1)
                                        disabled 
                                    @endif
                                @elseif(!isset($_GET['page']))
                                    disabled
                                @endif">
                                <a class="page-link" href="/@if(isset($_GET['sortby'], $_GET['sort']))?sortby={{ $_GET['sortby'] }}&sort={{ $_GET['sort'] }}@else/@endif" tabindex="-1">First page</a>
                              </li>
                              @for($i = 1; $i <= ceil(count($post->pagination)/$post->commentsPerPage); $i++)
                                <li class="page-item
                                    @if(isset($_GET['page'])) 
                                        @if($_GET['page'] == $i)
                                            disabled 
                                        @endif
                                    @elseif(!isset($_GET['page']) && $i == 1)
                                        disabled
                                    @endif">
                                    <a class="page-link" href="/@if(isset($_GET['sortby'], $_GET['sort']))?sortby={{ $_GET['sortby'] }}&sort={{ $_GET['sort'] }}&page={{ $i }}@else?page={{ $i }}@endif">{{ $i }}</a>
                                </li>
                              @endfor
                              <li class="page-item
                              @if(isset($_GET['page'])) 
                                    @if($_GET['page'] == ceil(count($post->pagination)/$post->commentsPerPage))
                                        disabled 
                                    @endif
                                @endif">
                                <a class="page-link" href="/@if(isset($_GET['sortby'], $_GET['sort']))?sortby={{ $_GET['sortby'] }}&sort={{ $_GET['sort'] }}&page={{ ceil(count($post->pagination)/$post->commentsPerPage) }}@else?page={{ ceil(count($post->pagination)/$post->commentsPerPage) }}@endif">Last page</a>
                              </li>
                            </ul>
                        </nav>
                                
                              
                    </div>
                    <hr/>
                    <div class="d-flex align-items-center flex-column">
                        <h2>Add comment</h2>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div><br />
                        @endif
                        <form method="post" action="{{ route('comment.store') }}" class="col-md-10 ">
                            @csrf
                            <div class="form-group">
                                <div class="mb-3 row">
                                    <label for="userName" class="col-sm-3 col-form-label">User name</label>
                                    <div class="col-sm-9">
                                      <input type="text" name='userName' class="form-control" id="userName" value="@if(auth()->user()->name) {{ auth()->user()->name }}@endif">
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="Email" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                      <input type="email" name="email" class="form-control" id="Email" value="@if(isset(auth()->user()->email)) {{ auth()->user()->email }} @endif">
                                    </div>
                                </div>
                                <div class="form-group row mb-3">
                                    <input type="hidden" name="post_id" class="form-control" value="{{ $post->id }}">
                                    <textarea name="comment_body" class="form-control" rows="5" placeholder="Comment"></textarea>
                                </div>
                            </div>
                            <div class="form-group mt-4 mb-4 ">
                                <div class="captcha">
                                    <span class="me-3">{!! captcha_img() !!}</span>
                                    <button type="button" class="btn btn-danger" class="reload" id="reload">
                                        &#x21bb;
                                    </button>
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <input id="captcha" type="text" class="form-control" placeholder="Enter Captcha" name="captcha">
                            </div>
                            <div class="form-group row">
                                <input type="submit" class="btn btn-primary" value="Comment">
                            </div>
                        </form>
                    </div>
                    
                </div>

            </div>
        
        </div>
    </div>
</div>
@endsection





@section('scripts')
    <script type="text/javascript">
        $( document ).ready(function() {
            console.log( "ready!" );
            $('#reload').click(function(){

                $.ajax({
                    type: 'GET',
                    url:  'reload-captcha',
                    success: function(data){
                        $('.captcha span').html(data.captcha);
                    },
                    error: function (data){
                        consolo.log(data);
                    }

                });
            })

            $('.reply').click(function(){
                $('#reply_'+$(this).data('reply')).removeClass('visually-hidden');
            })
            

            $('#sort').change(function(){
                // console.log($(this).val());
                const params = new Proxy(new URLSearchParams(window.location.search), {
                    get: (searchParams, prop) => searchParams.get(prop),
                });
                console.log(params.page);
                let page = '';
                if(params.page != null){
                    page = '&page='+params.page;
                }
                
                location.href = '?sortby='+$(this).val().split('.')[0]+'&sort='+$(this).val().split('.')[1]+page;
            })
        });

    </script>
@endsection
