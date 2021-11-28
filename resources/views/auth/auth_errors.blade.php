{{--@if($errors->any())--}}
{{--@endif--}}
@if(count($errors)>0)
    <div class="alert alert-danger">
        <strong>
            Ошибка заполнения формы...
        </strong>
        <strong>
        @if($message = Session::get('error'))
            {{$message}}
        @endif
        </strong>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
{{--@if($errors->any())--}}
{{--    <div class="form-group">--}}
{{--        <ul>--}}
{{--            @foreach($errors->all() as $error)--}}
{{--                <li>{{$error}}</li>--}}
{{--            @endforeach--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--@endif--}}

