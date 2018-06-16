{{--@extends('layouts.app')--}}

{{--@section('title')--}}
{{--Lista de Blocos--}}
{{--@endsection--}}

{{--@section('content')--}}
{{--{{dd($data)}}--}}

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
              <a href="{{ route('posts.create') }}">
                <button class="ui-button ui-widget ui-state-default ui-corner-all ui-button-text-icon-left btn btn-success btn-sm">
                  <span class="ui-button-icon-left ui-icon ui-c fa fa-plus-square-o"></span><span
                          class="ui-button-text ui-c"> Novo cadastro</span>
                </button>
              </a>

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
                    <td><a href="{{route('posts.edit', ['post' => $post->id])}}" class="btn btn-info btn-sm">Editar</a>
                      {{ Form::open(['route' => ['posts.destroy', $post->id], 'method' => 'DELETE', 'style' => 'display:inline']) }}
                      <button class="btn btn-danger btn-sm">Remover</button>
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



{{--@extends('layouts.template.master')--}}


{{--@section('content')--}}
  {{--<div class="container">--}}
    {{--<div class="row">--}}
      {{--<div class="col-md-10 col-md-offset-1">--}}
        {{--<div class="panel panel-default">--}}
          {{--<div class="panel-heading"><h3>Posts</h3></div>--}}
          {{--<div class="panel-heading">Page {{ $posts->currentPage() }} of {{ $posts->lastPage() }}</div>--}}
          {{--@foreach ($posts as $post)--}}
            {{--<div class="panel-body">--}}
              {{--<li style="list-style-type:disc">--}}
                {{--<a href="{{ route('posts.show', $post->id ) }}"><b>{{ $post->title }}</b><br>--}}
                  {{--<p class="teaser">--}}
                    {{--{{  str_limit($post->body, 100) }} --}}{{-- Limit teaser to 100 characters --}}
                  {{--</p>--}}
                {{--</a>--}}
              {{--</li>--}}
            {{--</div>--}}
          {{--@endforeach--}}
        {{--</div>--}}
        {{--<div class="text-center">--}}
          {{--{!! $posts->links() !!}--}}
        {{--</div>--}}
      {{--</div>--}}
    {{--</div>--}}
  {{--</div>--}}
@endsection