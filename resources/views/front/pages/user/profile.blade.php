@extends('front.layouts.main')

@section('content')

    @if($errors->any() )
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    @endif

    <div class="container product">
        @if (session()->has('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ session()->get('success') }}</strong>
            </div>
        @endif

        <h3>@lang('lang.Mypage')</h3>
        <div class="own-info">
            <div class="row">
                <div class="col-md-12 col-lg-4 col-xl-3">
                    <div class="own-info-window">
                        <div class="person-image">
                            <img src="{{ auth()->user()->getImage() }}" alt="" id="thumbImgs">
                        </div>
                        <h4 class="text-center">{{ auth()->user()->name . ' ' .auth()->user()->surname  }}</h4>
                    </div>
                </div>
                <div class="col-md-12 col-lg-8 col-xl-9">
                    <div class="own-info-window">
                        <div class="person-info">
                            <ul>
                                <li>
                                    <button class="btn btn-light" data-toggle="collapse" data-target="#name"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                    <span><i class="fa fa-user" aria-hidden="true"></i> {{ auth()->user()->name }} {{ auth()->user()->surname}}</span>

                                    <form action="{{ route('user.name.save')}}"  method="post">
                                        @csrf
                                        @method('put')
                                        <div id="name" class="form-group input-group edit-param collapse namesurname">
                                            <input type="text" name="name" class="form-control" placeholder="@lang('lang.new_name')" value="{{ auth()->user()->name }}">
                                            <input type="text" name="surname" class="form-control" placeholder="@lang('lang.new_surname')" value="{{ auth()->user()->surname }}">

                                            <div class="input-group-append">
                                                <button class="btn btn-warning ">
                                                    @lang('lang.change')
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                    <hr>
                                </li>

                                <li>
                                    <button class="btn btn-light" data-toggle="collapse" data-target="#type"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>
                                    <span><i class="fa fa-list-alt" aria-hidden="true"></i> {{ auth()->user()->type }}</span>
                                    <form action="{{route('user.type.save')}}" method="post">
                                        @csrf
                                        @method('put')
                                        <div id="type" class="form-group input-group edit-param collapse">
                                            <input type="radio" class="" name="type" id="man" value="man" placeholder="Человек" required {{ auth()->user()->type === 'man' ? ' checked' : '' }}>
                                            <label for="man">@lang('lang.man')</label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;
                                            <input type="radio" class="" name="type" id="company" value="company" placeholder="Компания" required {{ auth()->user()->type === 'company' ? ' checked' : '' }}>
                                            <label for="company">@lang('lang.company')</label>
                                            &nbsp;&nbsp;&nbsp;&nbsp;

                                            <button class="btn btn-warning editBtn" type="submit">
                                                @lang('lang.change')
                                            </button>
                                        </div>
                                    </form>
                                    <hr>
                                </li>
                                <li>
                                    <button class="btn btn-light" data-toggle="collapse" data-target="#type1"><i class="fa fa-picture-o" aria-hidden="true"></i></button>
                                    <span><i class="fa fa-photo" aria-hidden="true"></i> Photo</span>
                                    <form id="imageUploadForm" action="{{route('user.image.save')}}" enctype="multipart/form-data" method="post">
                                        @csrf
                                        @method('put')

                                        <div id="type1" class="form-group input-group edit-param collapse">
                                            <label for="photo_name"><i class="fa fa-photo" aria-hidden="true">  @lang('lang.addimg') </i></label>
                                            <input type="file" name="photo_name" id="photo_name" required="" style="display: none;">
                                            @if ($errors->has('photo_name'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('photo_name') }}</strong>
                                                </span>
                                            @endif

                                            <button class="btn btn-warning" type="submit">
                                                @lang('lang.change')
                                            </button>
                                        </div>
                                    </form>
                                    <hr>
                                </li>

                                <li>
                                    <button class="btn btn-light" data-toggle="collapse" data-target="#mail"><i class="fa fa-envelope" aria-hidden="true"></i></button>
                                    <span><i class="fa fa-envelope" aria-hidden="true"></i> {{ auth()->user()->email }}</span>
                                    <form action="{{route('user.email.save')}}" method="post">
                                        @csrf
                                        @method('put')
                                        <div id="mail" class="form-group input-group edit-param collapse">
                                            <input type="email" name="email" class="form-control" placeholder="Email Адрес" value="{{auth()->user()->email}}">

                                            <div class="input-group-append">
                                                @if(auth()->user()->email)
                                                    <button class="btn btn-warning" type="submit">
                                                        @lang('lang.change')
                                                    </button>
                                                @else
                                                    <button class="btn btn-warning" type="submit">
                                                        @lang('lang.add')
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                    <hr>
                                </li>

                                <li>
                                    <button class="btn btn-light" data-toggle="collapse" data-target="#tel"><i class="fa fa-phone" aria-hidden="true"></i></button>
                                    <span><i class="fa fa-phone" aria-hidden="true"></i> {{ auth()->user()->tel }}</span>
                                    <form action="{{route('user.tel.save')}}" method="post">
                                        @csrf
                                        @method('put')
                                        <div id="tel" class="form-group input-group edit-param collapse">
                                            <input type="text" name="tel" class="form-control" placeholder="Телефон" value="{{ auth()->user()->tel }}">

                                            <div class="input-group-append">
                                                @if(auth()->user()->tel)
                                                <button class="btn btn-warning" type="submit">
                                                    @lang('lang.change')
                                                </button>
                                                    @else
                                                    <button class="btn btn-warning" type="submit">
                                                        @lang('lang.add')
                                                    </button>
                                                @endif
                                            </div>
                                        </div>
                                    </form>
                                    <hr>
                                </li>

                                <li>
                                    @if (session('status'))
                                        <div class="alert alert-success" role="alert">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    <button class="btn btn-light" data-toggle="collapse" data-target="#password"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></button>

                                    <span><i class="fa fa-key" aria-hidden="true"></i> пароль</span>
                                    <form id="login-form" class="text-left" role="form" method="POST" action="{{ route('user.email.save') }}">
                                        @csrf
                                        @method('put')
                                        {{--TODO wast ist das?--}}
                                        <div id="password" class="form-group input-group edit-param collapse">
                                            <label for="fp_email" class="sr-only">{{ __('E-Mail Address') }}</label>

                                            <input type="hidden" class="form-control" name="email" value="{{ auth()->user()->email}}"  >
{{--                                            @if ($errors->has('email'))--}}
{{--                                                <span class="invalid-feedback" role="alert">--}}
{{--                                                    <strong>{{ $errors->first('email') }}</strong>--}}
{{--                                                </span>--}}
{{--                                            @endif--}}

                                            <div class="input-group-append">
                                                <button class="btn btn-warning" type="submit">
                                                    @lang('lang.send')
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

{{--    <div class="container">--}}
{{--        <table class="table">--}}
{{--            <thead>--}}
{{--            <tr>--}}
{{--                <th class="text-center"><i class="fa fa-list-alt" aria-hidden="true"></i></th>--}}
{{--                <th class="text-center"><i class="fa fa-paperclip" aria-hidden="true"></i></th>--}}

{{--                <th class="text-center"><img alt="IMG" style="width: 15px;" src="image/car.png" align="left"></th>--}}
{{--                <th class="text-center"><img alt="IMG" style="width: 15px;" src="image/speccar.png" align="left"></th>--}}
{{--                <th class="text-center"><img alt="IMG" style="width: 15px;" src="image/acs.png" align="left"></th>--}}
{{--                <th class="text-center"><img alt="IMG" style="width: 15px;" src="image/shome.png" align="left"></th>--}}
{{--                <th class="text-center"><img alt="Img" style="width: 15px;" src="image/service.png" align="left"></th>--}}
{{--                <th class="text-center"><img alt="IMG" style="width: 15px;" src="image/elect.png" align="left"></th>--}}
{{--                <th class="text-center"><img alt="IMG" style="width: 15px;" src="image/vaqans.png" align="left"></th>--}}
{{--                <th class="text-center"><img alt="IMG" style="width: 15px;" src="image/animal.png" align="left"></th>--}}
{{--                <th class="text-center"><img alt="IMG" style="width: 15px;" src="image/biznes.png" align="left"></th>--}}
{{--            </tr>--}}
{{--            </thead>--}}
{{--            <tbody>--}}
{{--            <tr>--}}
{{--                <td class="text-center"><i class="fa fa-line-chart" aria-hidden="true" title="количество топ объявлении"></i></td>--}}
{{--                <td class="text-center">4</td>--}}
{{--                <td class="">0</td>--}}
{{--                <td class="">1</td>--}}
{{--                <td class="">0</td>--}}
{{--                <td class="">0</td>--}}
{{--                <td class="">0</td>--}}
{{--                <td class="">2</td>--}}
{{--                <td class="">0</td>--}}
{{--                <td class="">0</td>--}}
{{--                <td class="">1</td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td class="text-center"><i class="fa fa-sticky-note" aria-hidden="true" title="количество стандартных объявлении"></i></td>--}}
{{--                <td class="text-center">16</td>--}}
{{--                <td class="">2</td>--}}
{{--                <td class="">1</td>--}}
{{--                <td class="">2</td>--}}
{{--                <td class="">3</td>--}}
{{--                <td class="">0</td>--}}
{{--                <td class="">2</td>--}}
{{--                <td class="">5</td>--}}
{{--                <td class="">0</td>--}}
{{--                <td class="">1</td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td class="text-center"><i class="fa fa-trash" aria-hidden="true" title="количество удаленных объявлении"></i></td>--}}
{{--                <td class="text-center">1</td>--}}
{{--                <td class="">0</td>--}}
{{--                <td class="">0</td>--}}
{{--                <td class="">0</td>--}}
{{--                <td class="">0</td>--}}
{{--                <td class="">0</td>--}}
{{--                <td class="">0</td>--}}
{{--                <td class="">0</td>--}}
{{--                <td class="">0</td>--}}
{{--                <td class="">1</td>--}}
{{--            </tr>--}}
{{--            <tr>--}}
{{--                <td class="text-center"><i class="fa fa-globe" aria-hidden="true" title="все объявлении"></i></td>--}}
{{--                <td class="text-center">20</td>--}}
{{--                <td class="">2</td>--}}
{{--                <td class="">2</td>--}}
{{--                <td class="">2</td>--}}
{{--                <td class="">3</td>--}}
{{--                <td class="">0</td>--}}
{{--                <td class="">4</td>--}}
{{--                <td class="">5</td>--}}
{{--                <td class="">0</td>--}}
{{--                <td class="">2</td>--}}
{{--            </tr>--}}
{{--            </tbody>--}}
{{--        </table>--}}
{{--    </div>--}}

    <div class="container __margin-top-35">
        <h3>@lang('lang.Favorites')</h3>
        <div class="row">

            @forelse(auth()->user()->favouriteProducts as $product)
                <div class="col showProducts">
                    <div class="advWindows">
                        <a href="{{route('front.product', $product->id)}}" style="color: inherit">
                            <div class="advWindImage">
{{--                                @php $imagefavorit=\App\Models\Images::where('item_id',$it->id)->first() @endphp--}}

                                <img src="{{asset('/img/products/'.$product->lastImage->resized_path)}}" alt="IMage">

                            </div>
                            <div class="advWindText">
                                <p>{{$product->price}}</p>
                                <p>{{$product->title_en}}</p>
                                <p class="text-center">
                                    <button class="btn btn-info">@lang('lang.learnmore')</button>
                                </p>
                            </div>
                        </a>
                    </div>
                </div>

            @empty
                <h6>@lang('lang.nothave') @lang('lang.Favorites')</h6>
            @endforelse
        </div>

{{--        <p class="text-center __margin-top-35">--}}
{{--            <button class="btn btn-success" onclick="location.href='{{ route("user.favourites.get" }}'">@lang('lang.learnmore')--}}
{{--                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>--}}
{{--            </button>--}}
{{--        </p>--}}

        <p class="text-center __margin-top-35">
            <a class="btn btn-success" href="{{ route('user.favourites.get') }}">@lang('lang.learnmore')
                <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
            </a>
        </p>
    </div>
@endsection

