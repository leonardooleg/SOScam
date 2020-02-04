@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">

        @component('admin.components.breadcrumb')
            @slot('title') Редактирование товара @endslot
            @slot('parent') Главная @endslot
            @slot('active') Відео в наявності @endslot
        @endcomponent

        <hr/>

        <form name="Tree" class="form-horizontal" action="{{route('admin.search-video.update', $video)}}" method="post"
              enctype="multipart/form-data">
            @method('PUT')
            {{ csrf_field() }}

            {{-- Form include --}}
            @include('admin.search-video.partials.form')
            <input type="hidden" name="modified_by" value="{{Auth::id()}}">
        </form>
        <form onsubmit="if(confirm('Удалить?')){ return true}else{return false}"
              action="{{route('admin.search-video.destroy', $video)}}" method="post">
            @csrf
            @method('DELETE')
            <input class="btn btn-danger float-right" type="submit" value="Удалить">
        </form>
    </div>
@endsection
