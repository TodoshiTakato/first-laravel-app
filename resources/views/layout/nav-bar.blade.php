<ul class="nav-bar">
    <li class="nav-item1"><a href="http://127.0.0.1:8000/">Home</a></li>
    <li class="nav-item1"><a href="http://127.0.0.1:8000/">Main page</a></li>
    <li class="nav-item1">
        <div class="dropdown1">
            @guest
                <a href="#dropdown" class="dropbtn">Guest</a>
                <div class="dropdown1-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                    <a href="#">Link 4</a>
                    <a href="#">Link 5</a>
                    <a href="#">Link 6</a>
                </div>
            @elseif (isset($User_Dropdown))
                <a href="#dropdown" class="dropbtn">{{$User_Dropdown->name}}</a>
                <div class="dropdown1-content">
                    <a href="#">id: {{$User_Dropdown->id}}</a>
                    <a href="#">name: {{$User_Dropdown->name}}</a>
                    <a href="#">email: {{$User_Dropdown->email}}</a>
                    <a href="#">email_verified_at: {{$User_Dropdown->email_verified_at}}</a>
                    <a href="#">created_at: {{$User_Dropdown->created_at}}</a>
                    <a href="#">updated_at: {{$User_Dropdown->updated_at}}</a>
                    <div>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </div>
            @else
                <a href="#dropdown" class="dropbtn">User</a>
                <div class="dropdown1-content">
                    <a href="#">Link 1</a>
                    <a href="#">Link 2</a>
                    <a href="#">Link 3</a>
                    <a href="#">Link 4</a>
                    <a href="#">Link 5</a>
                    <a href="#">Link 6</a>
                </div>
            @endguest
        </div>
    </li>
</ul>
