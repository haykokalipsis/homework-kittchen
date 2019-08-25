@extends('front.layouts.main')

@section('content')

    <div class="container product">
        <h3>Добавление объявлений</h3>
        <div class="row">
            <div class="step_p ">
                <div class="step_p">
                    <div class="bline"></div>
                    <div class="box_on">
                        <div class="circle">1</div>Բաժին
                    </div>
                    <div class="box_off">
                        <div class="circle">2</div>Հայտարարություն
                    </div>
                    <div class="box_off">
                        <div class="circle">3</div>Ավելացնել
                    </div>
                </div>
            </div>

            <div class="container __margin-top-35">

                <div class="col-7 col-sm-12 col-md-7 col-lg-6 col-xl-6">
                    @foreach($allCategories as $category)
                        <div class="dropLeft">
                            <a href="{{ route('front.category', $category->id) }}">
                                <img alt="IMG" src="{{ asset('img/categories/' . $category->image) }}" style="width: 10%" align="left">&nbsp;
                                &nbsp;{{ $category->{'title_' . session('locale')} }}
                                <i class="fa fa-angle-right" aria-hidden="true"></i>
                            </a>

                            <div class="dropLeft-content">
                                @foreach($category->sections as $section)
                                    <a href="{{ route('user.products.create', [$section->id]) }}">{{ $section->{'title_' . session('locale')} }}</a>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

    </div>

@endsection
