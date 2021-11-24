@if(count($errors)>0)
    <div class="alert alert-danger">
        <strong>
            Что-то пошло не так...
        </strong>
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
@endif
