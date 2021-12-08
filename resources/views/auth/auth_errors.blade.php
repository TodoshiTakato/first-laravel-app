
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>
                Неправильный логин или пароль...
            </strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

{{--    <strong> @if($message = Session::get('error')) 1. {{$message}} / 2. {{ $_SESSION['ss'] }} <br> @endif </strong>--}}


