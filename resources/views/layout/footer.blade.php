<ul class="nav-bar">
    <li class="nav-item1"><a href="{{route('home')}}">Home</a></li>
    <li class="nav-item1"><a href="{{url()->previous()}}">Back</a></li>
    <li class="nav-item1">
        <div class="dropup1">
            <a href="#dropup" class="dropbtn">Dropup</a>
            <div class="dropup1-content">
                <a href="#">Link 1</a>
                <a href="#">Link 2</a>
                <a href="#">Link 3</a>
            </div>
        </div>
    </li>
</ul>

