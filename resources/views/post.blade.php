
  @extends('layout.app')
  @section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>ახალი დავალება</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('posts.create') }}"> +დავალების დამატება </a>
            </div>
            
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">

        <tbody>
        @if(count($posts) > 0)
            @foreach($posts as $post)


            <tr>
                <td>           
                    <div>
                        <input class="form-check-input me-1 p-2 align-sub" type="checkbox"  value="1" >
                    </div>  
                </td>
               
                <td>{{ $post->title }}</td>
                <td>
                    @if(request()->has('view_deleted'))

                        <a href="{{ route('post.restore', $post->id) }}" class="btn btn-success btn-sm">აღდგენა</a>
                    @else
                        <form method="post" action="{{ route('post.delete', $post->id) }}">
                            @csrf
                            <input type="hidden" name="_method" value="DELETE" />
                            <button type="submit" class="btn btn-danger btn-sm">წაშლა</button>
                        </form>
                    @endif
                </td>
            </tr>

            @endforeach
        @else
            <tr>
                <td colspan="4" class="text-center">დავალება არ მოიძებნა</td>
            </tr>

        @endif
        </tbody>
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col col-md-6">ნახვა</div>
                    <div class="col col-md-6 text-right">
                        @if(request()->has('view_deleted'))

                        <a href="{{ route('post.index') }}" class="btn btn-info btn-sm">ყველა დავალების ნახვა</a>

                        <a href="{{ route('post.restore_all') }}" class="btn btn-success btn-sm">წაშლილების აღდგენა</a>
                       

                        @else

                        <a href="{{ route('post.index', ['view_deleted' => 'DeletedRecords']) }}" class="btn btn-primary btn-sm">წაშლილი პოსტების ნახვა</a>
                        <a href="{{ route('post.delete_all') }}" class="btn btn-success btn-sm">შესრულებული დავალებების წაშლა</a>

                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
        

      
@endsection
















