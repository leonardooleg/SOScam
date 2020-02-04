@extends('admin.layouts.app_admin')

@section('content')

    <div class="container">


        <hr>

        <a href="{{route('admin.search-video.create')}}" class="btn btn-primary pull-right"><i
                class="fa fa-plus-square-o"></i> Добавить товар</a>
        <table class="table table-striped">
            <thead>
            <th>Наименование</th>
            {{-- <th>Категория</th>--}}
            <th>Опубликована</th>
            <th class="text-right">Изменить</th>
            </thead>
            <tbody>
            @forelse ($videos as $video)
                <tr>
                    <td><a href="{{route('admin.search-video.edit', $video)}}">{{$video->title}}</a></td>
                    {{-- <td>
                         @if($product->parent_id)дочерняя
                         @else <b>Главная</b>
                         @endif
                     </td>--}}
                    <td>
                        @if($video->published==1)Опубликована
                        @else Нет
                        @endif
                    </td>
                    <td>
                        <a href="{{route('admin.search-video.edit', $video)}}"><i class="fa fa-edit"></i></a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center"><h2>Данные отсутствуют</h2></td>
                </tr>
            @endforelse
            </tbody>
            <tfoot>
            <tr>
                <td colspan="3">
                    <ul class="pagination pull-right">
                        {{$videos->links()}}
                    </ul>
                </td>
            </tr>
            </tfoot>
        </table>
    </div>

@endsection
