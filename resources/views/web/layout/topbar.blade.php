<header id="header" class="default">
    <div class="topbar">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <div class="topbar-left text-center text-md-left">
                            <ul class="list-inline">
                                <li> <a href="{{route('contact')}}"> @lang('Contact') </a></li>
                                <li> <a href="{{route('about')}}"> @lang('About Us') </a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="topbar-right text-center text-md-right">
                            <ul class="list-inline">
                                <li>
                                    <a href="#"><i class="fas fa-shopping-cart"></i>@lang('Shopping Cart')
                                        @if(Session::has("cart") != null)
                                            <span id="total-quanty-show" class="badge badge-secondary">{{ Session::get('cart')->totalQty }}</span>
                                        @else
                                            <span id="total-quanty-show" class="badge badge-secondary">0</span>
                                        @endif
                                    </a>
                                    <div class="cart-hover">
                                        <div id="change-item-cart">
                                            @if(Session::has("cart") != null)
                                                <div class="select-items">
                                                    <table>
                                                        <tbody>
                                                        @foreach(Session::get('cart')->items as $products)
                                                            <tr>
                                                                <td class="si-pic"><img style="width: 50px" src={{url('image/' . $products['item']->image) }} alt=""></td>
                                                                <td class="si-text">
                                                                    <div class="product-selected">
                                                                        <p>{{ number_format($products['item']->price) }} VNĐ x {{ $products['qty'] }}</p>
                                                                        <h6>{{ $products['item']->name }}</h6>
                                                                    </div>
                                                                </td>
                                                                <td class="si-close">
                                                                    <button class="remove-btn" data-id="{{ $products['item']->id }}">Remove</button>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="select-total">
                                                    <span>total:</span>
                                                    <h5>{{ number_format(Session::get('cart')->totalPrice) }} VNĐ</h5>
                                                </div>
                                            @endif
                                        </div>

                                        <div class="select-button">
                                            <a href="{{ route('checkout') }}" class="primary-btn view-card">@lang('CHECK OUT')</a>
                                        </div>
                                    </div>
                                </li>
                                @if (Auth::guest())
                                    <li><a href="{{ route('login') }}">@lang('Login')</a></li>
                                @else
                                    <li class="nav-item dropdown">
                                        <a  class="dropdown-toggle-no-caret" href="#" id="accountDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user-circle"></i>{{ Auth::user()->name }} <i class="fas fa-caret-down"></i></a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="accountDropdown">
                                            <a class="dropdown-item" href="{{ route('account')}}"> @lang('My Profile')</a>
                                            {{-- <a class="dropdown-item" href="setting.html"> Setting</a> --}}
                                            <a class="dropdown-item" href="{{ route('logout') }}">
                                                @lang('Logout')
                                                <form id="logout-form" action="{{ route('logout') }}" method="get" style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </a>
                                        </div>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div class="menu">
        <div class="container">
            <div class="row">
                <div class="col-md-2 col-sm-12 col-xs-12">
                    <div class="menu-left text-center text-md-left">
                        <div class="logo-box">
                            <a href="{{route('index')}}"><img src="{{url('template_web/images/logo.svg')}}" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 col-sm-12 col-xs-12">
                    <div class="menu-items">
                        <nav class="navbar navbar-expand-lg navbar-light bg-light menu-left">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto nav-text">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('index')}}">@lang('Home') </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{route('product')}}">@lang('Menu') </a>
                                    </li>
                                </ul>
                            </div>
                        </nav>
                        <div class="icons-set">
                            <ul class="list-inline">
                                <li class="icon-items nav-item dropdown ">
                                <a class="nav-link dropdown-toggle-no-caret" href="#" id="navbarDropdown1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-search"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown1">
                                    <div class="notification-item">
                                        <div class="search-details">
                                        <form class="form-inline" method="get" action="{{route('search')}}">
                                              <input class="form-control " type="search" name="search" placeholder="Search" aria-label="Search">
                                              <button class="s-btn btn-link " type="submit"><i class="fas fa-search"></i></button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                </li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
