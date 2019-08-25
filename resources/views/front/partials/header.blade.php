<header class="container-fluid">
    <div class="container header-top">
        <div class="container-left">
            <span> @lang('lang.location')&nbsp;</span>

            <a data-toggle="modal" data-target="#myModal" style="cursor:pointer;">
                <i class="fa fa-location-arrow" aria-hidden="true"></i>
                @lang('lang.chooseregion')
            </a>

            <div class="modal" id="myModal">
                <div class="modal-dialog">
                    <div class="modal-content">

                        <!-- Modal Header -->
                        <div class="modal-header">
                            <h4 class="modal-title">@lang('lang.chooseregion')</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>

                        <!-- Modal body -->
                        <div class="modal-body"></div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">Закрыть</button>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="container-right">
            @guest
                <a href="{{route('login')}}">
                    <i class="fa fa fa-gift" aria-hidden="true"></i>
                    @lang('lang.promocode')
                </a>

                <a href="{{route('login')}}">
                    <i class="fa fa-briefcase" aria-hidden="true"></i>
                    @lang('lang.forbusiness')
                </a>

                <a href="{{route('login')}}" style="cursor: pointer" >
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    @lang('lang.Messages')
                </a>

                <a href="{{ route('login') }}">
                    <i class="fa fa fa-heart" aria-hidden="true"></i>
                    @lang('lang.Favorites')
                </a>
            @endguest

            @auth
                <a href="#">
                    <i class="fa fa fa-gift" aria-hidden="true"></i>
                    @lang('lang.promocode')
                </a>

                <a href="#">
                    <i class="fa fa-briefcase" aria-hidden="true"></i>
                    @lang('lang.forbusiness')
                </a>

                <a href="" style="cursor: pointer">
{{--                <a href="{{route('messagerindex')}}" style="cursor: pointer">--}}
                    <i class="fa fa-envelope" aria-hidden="true"></i>
                    @lang('lang.Messages')  <span class="quan">
<!--                          --><?php //$msgcount=\App\Models\Messager::where('from','=',\Illuminate\Support\Facades\Auth::user()->id)->where('status','inactive')->get();?>

{{--                        {{count($msgcount)}}--}}
                        </span>
                </a>

                <a href="{{ route('user.favourites.get') }}">
                    <i class="fa fa fa-heart" aria-hidden="true"></i>
                    @lang('lang.Favorites')
                </a>
            @endauth
        </div>
    </div>

    <div class="container header-bottom">
        <div class="row">
            <div class="col-12 col-xl-2">
                <div class="col-items">
                    <a href="{{url('/')}}" class="grid-item logo-link">
                        <span>Логотип</span>
                    </a>
                </div>
            </div>

            <div class="col-12 col-xl-7">
                <div class="col-items">
                    <div class="main">

                        <!-- Actual search box -->
{{--                        <form action="{{ route('searchcolums')}}" method="post" class="search">--}}
                        <form action="" method="post" class="search">
                            @csrf
                            <div class="form-group has-search input-group">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control srch" id="searchok" placeholder="@lang('lang.SearchApps')" name="search" required min="4">
                                <div class="input-group-append">
                                    <button class="btn btn-secondary findBtn" type="submit">
                                        @lang('lang.search')

                                    </button>
                                    <div class="searchlist col"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            @guest
                <div class="col-12 col-xl-2">
                    @include('front.partials.register')
                </div>

                <div class="col-12 col-xl-1">
                    @include('front.partials.login')
                </div>
            @else
                <div class="col-12 col-xl-2">
                    <div class="col-items">
{{--                        <form action="{{ route('user.products.create-unpublished-product') }}" method="post">--}}
{{--                            @csrf--}}
{{--                            <button type="submit" class="btn btn-success myPostAdd">@lang('lang.AddaStatement')</button>--}}
{{--                        </form>--}}
{{--                        <a href="{{route('postPublish')}}" class="btn btn-success myPostAdd" >@lang('lang.AddaStatement')</a>--}}
                            <a href="{{ route('user.products.start-creation') }}" class="btn btn-success myPostAdd" >@lang('lang.AddaStatement')</a>
                    </div>
                </div>

                <!-- Users dropdown menu ------------------------------------------------------------------------------>
                <div class="col-12 col-xl-1">
                    <div class="col-items">
                        <div class="dropdown">
                            <button class="btn btn-light mySign" data-toggle="dropdown"><i class="fa fa-user" aria-hidden="true" style="color: #17a2b8;"></i></button>
                            <div class="dropdown-menu myDrop" style="left: -126px !important;">
                                <p class="text-center"><i class="fa fa-user" aria-hidden="true"></i> {{ auth()->user()->name }}</p>
                                <hr>
                                <a class="dropdown-item" href="{{ route('user.favourites.get') }}"> @lang('lang.Favorites')</a>
                                <hr>
{{--                                <a class="dropdown-item" href="{{route('messagerindex')}}">@lang('lang.Messages')</a>--}}
                                <hr>
                                <a class="dropdown-item" href="{{route('user.products.index')}}">@lang('lang.Myannouncement')</a>
                                <a class="dropdown-item" href="{{route('user.profile.show')}}">@lang('lang.Mypage')</a>
                                <hr>
                                <a class="dropdown-item" href="{{route('logout')}}">@lang('lang.logout')</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Users dropdown menu - END ------------------------------------------------------------------------>
            @endif
        </div>
    </div>

    <!-- Categories --------------------------------------------------------------------------------------------------->
    <div class="container">
        <div class="row">

            <div class="col-12 col-md">
                <div class="dropBtnArea">
                    <div class="dropdown">
                        <a class="btn btn-success myMenuList"><i class="fa fa-bars"></i>&nbsp;<span class="catM">All Category</span></a>
                        <div class="dropdown-content">

                            @foreach($allCategories as $category)
                                <div class="dropLeft myMen">
                                    <a href="{{ route('front.category', $category->id) }}">
                                        <img alt="IMG" src="{{ asset('img/categories/' . $category->image) }}" style="width: 10%" align="left">&nbsp;{{ $category->{'title_' . session('locale')} }}
                                    </a>
                                    <i class="fa fa-angle-right" aria-hidden="true"></i>

                                    <div class="dropLeft-content">
                                        @foreach($category->sections as $section)
                                            <a href="{{ route('front.section', $section->id) }}">{{ $section->{'title_' . session('locale')} }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    </div>
                </div>
            </div> <!-- END all categories-->

            @foreach($topCategories as $category)
                <div class="col-12 col-md">
                    <div class="dropBtnArea">
                        <div class="dropdown">
                            <a class="btn myMenuList"><i class=""></i>&nbsp;<span class="catM">{{ $category->{'title_' . session('locale')} }}</span></a>
                            <div class="dropdown-content">
                                @foreach($category->sections as $section)
                                    <a href="{{ route('front.section', $section->id) }}">{{ $section->{'title_' . session('locale')} }}</a>
                                    <div class="dropLeft-content">

                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
    </div>
    <!-- Categories END------------------------------------------------------------------------------------------------>
</header>