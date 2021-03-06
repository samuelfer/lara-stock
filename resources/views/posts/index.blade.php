
@extends('layouts.template.master')

@section('content')

 <br>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">

              <h3 class="card-title">Listagem de Posts</h3><br>
              {{--@can('posts_create', $posts)--}}
              <a href="{{ route('posts.create') }}">
                <button class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left btn btn-success btn-sm">
                  <span class="ui-button-icon-left ui-icon ui-c fa fa-plus-square-o"></span><span
                          class="ui-button-text ui-c"> Novo cadastro</span>
                </button>
              </a>
              {{--@endcan--}}
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive p-0">
              <table class="table table-hover">
                <tr>
                  <th>ID</th>
                  <th>Nome</th>
                  <th>Texto</th>
                  <th>Ações</th>
                </tr>
                @foreach($posts as $post)
                  <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{  str_limit($post->body, 100) }}</td>
                    <td>@can('posts_edit')<a href="{{route('posts.edit', ['post' => $post->id])}}" class="btn btn-info btn-sm"><i class="fa fa-pencil"></i></a>@endcan
                      {{ Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE', 'style' => 'display:inline']) }}
                      <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                      {{ Form::close() }}

                    </td>

                  </tr>
                  @endforeach
                  </tr>
                  @empty ($posts->count())
                    <tr class="ui-widget-content ui-datatable-empty-message">
                      <td colspan="12">Nenhum registro encontrado</td>
                    </tr>
                  @endempty
              </table>
              {{ $posts->links()}}
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->

@endsection

{{--<script type="text/javascript">--}}

{{--$('message').css("color", "#f66");--}}
{{--/*$('h1').hide();*/--}}
{{--$('message').delay('1000');--}}
{{--$('message').css("color", "#f66");--}}
{{--$('message').fadeOut("slow");--}}


{{--</script>--}}
