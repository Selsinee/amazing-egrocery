<nav class="navbar navbar-expand-lg navbar-dark bg-dark flex-column">

    <div class="position-relative d-flex flex-row container-fluid">
        <a class="navbar-brand ms-auto me-auto my-2" href="/">Amazing E-Grocery</a>
        <div class="navbar-nav my-2 mx-3 position-absolute top-0 end-0">

            <form action="/changelang" action="POST" class="me-4">
                @csrf
                <select class="form-select" aria-label="Default select example" onchange="this.form.submit()" name="lang">
                    <option selected value="en" {{ Config::get('app.locale') == 'en' ? 'selected' : '' }}>English</option>
                    <option value="id" {{ Config::get('app.locale') == 'id' ? 'selected' : '' }}>Indonesian</option>
                </select>
            </form>


            @auth
                <form action="{{ url('logout')}}" enctype="multipart/form-data" action="POST">
                    @csrf
                    <button class="btn btn-light rounded py-2 px-3" type="submit">{{__("message.Logout")}}</button>
                </form>
            @else
                @if (!request()->is('register') && !request()->is('login'))
                    <a class="btn btn-secondary me-3 rounded py-2 px-3" href="/register">{{__("message.Register")}}</a>
                    <a class="btn btn-light rounded py-2 px-3" href="/login">{{__("message.Login")}}</a>
                @endif

            @endauth
        </div>
    </div>

    @auth
    @if (!request()->is('checkout') && !request()->is('saved') && !request()->is('/'))
        <ul class="navbar-nav nav-right">
            <li class="navbar-item mx-1" ><a class="nav-link {{ request()->is('home') ? 'active' : ''}}" href="/home">Home</a></li>
            <li class="navbar-item mx-1"><a class="nav-link {{ request()->is('cart') ? 'active' : ''}}" href="/cart">{{__("message.Cart")}}</a></li>
            <li class="navbar-item mx-1"><a class="nav-link {{ request()->is('profile') ? 'active' : ''}}" href="/profile">{{__("message.Profile")}}</a></li>
            @if (auth()->user()->role_id == '2')
                <li class="navbar-item mx-1"><a class="nav-link {{ request()->is('accountmaintenance') ? 'active' : ''}}" href="/accountmaintenance">{{__("message.Account Maintenance")}}</a></li>
            @endif
        </ul>
    @endif

    @endauth


</nav>
