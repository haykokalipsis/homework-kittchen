@extends('front.layouts.main')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-4 col-md-4 col-lg-2 col-xl-2">
                <a href="en/item/13.html" style="color: inherit">
                    <div class="topWindow">

                        <img src="{{ asset('img/products/resize/667af8b4f10ff845a177045ff6e6287e649e4924dR.jpg') }}" alt="IMage">
                        <div class="advWindTextTop">
                            <p>three door refrigerated prep table</p>
                        </div>
                        <span class="fastText">Quickly!</span>

                    </div>
                </a>
            </div>
        </div>
    </div>

    <hr style="width: 80%">

    <div class="container __margin-top-75">
        <div class="advHeader">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-7">
                    <h3 class="catHeaderText">All announcements</h3>
                </div>
                <div class="col-8 col-sm-9 col-md-10 col-lg-3 col-xl-3">
                    <form action="https://buymykitchen.com/en" method="post">
                        <input type="hidden" name="_token" value="8bMEpTtxzUByEy59Mmwa5SzJYfD2fvVKIil1CI5j">

                        <select class="form-control mycois" name="item" id="sel1" onchange="this.form.submit()">
                            <option value="inactve">All posts</option>
                            <option value="active">Lates</option>
                            <option value="day">Today's</option>
                            <option value="week">This Week</option>
                        </select>
                    </form>
                </div>

                <div class="col-4 col-sm-3 col-md-2 col-lg-2 col-xl-2">
                    <p>
                        <button id="typeTable" title="table" type="button" class="btn btn-success chooseTypeBtn"><i class="fa fa-th" aria-hidden="true"></i></button>
                        <button id="typeList" type="button" title="list" class="btn btn-light chooseTypeBtn"><i class="fa fa-list" aria-hidden="true"></i></button>
                    </p>
                </div>
            </div>
        </div>

        <div class="container-fluid">
            <div class="row">
                <div class="container">
                    <h4 class="catHeaderText">
                        <a href="en/category/1.html" style="color:black;">COOKING EQUIPMENT</a>
                    </h4>
                </div>

                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 showProducts">
                    <div class="advWindows">
                        <a href="en/item/3.html" style="color: inherit">
                            <div class="advWindImage">
                                <img src="{{ asset('img/products/resize/b96ff222be0ae43e4ef730e1f554f2f6787b76d1zQ.jpg') }}" alt="IMage">
                            </div>
                            <div class="advWindText">
                                <p>Star Holman CCOF-4</p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 showProducts">
                    <div class="advWindows">
                        <a href="en/item/4.html" style="color: inherit">
                            <div class="advWindImage">
                                <img src="{{ asset('img/products/resize/71689149e52717cbef21cf189a672c56fd9515d4Iv.jpg') }}" alt="IMage">
                            </div>
                            <div class="advWindText">
                                <p>6 burner gas stove with standard oven</p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 showProducts">
                    <div class="advWindows">
                        <a href="en/item/1.html" style="color: inherit">
                            <div class="advWindImage">
                                <img src="{{ asset('img/products/resize/5585dfaef23a89aabcd53f81d3390d23d8c7f3e0lP.jpg') }}" alt="IMage">
                            </div>
                            <div class="advWindText">
                                <p>Southband doubledeck oven</p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 showProducts">
                    <div class="advWindows">
                        <a href="en/item/29.html" style="color: inherit">
                            <div class="advWindImage">
                            </div>
                            <div class="advWindText">
                                <p>edsfvds</p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 showProducts">
                    <div class="advWindows">
                        <a href="en/item/6.html" style="color: inherit">
                            <div class="advWindImage">
                                <img src="{{ asset('img/products/resize/38b80bc6ebb800afcd4fbcc0fc48449ab140b47eOx.jpg') }}" alt="IMage">
                            </div>
                            <div class="advWindText">
                                <p>6 burner gas stove</p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 showProducts">
                    <div class="advWindows">
                        <a href="en/item/5.html" style="color: inherit">
                            <div class="advWindImage">
                                <img src="{{ asset('img/products/resize/68ae625b7c16f56f3f077ebfbc8e1d6e30fe8353be.png') }}" alt="IMage">
                            </div>
                            <div class="advWindText">
                                <p>Garland 6 burner gas stove</p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 showProducts">
                    <div class="advWindows">
                        <a href="en/item/2.html" style="color: inherit">
                            <div class="advWindImage">
                                <img src="{{ asset('img/products/resize/1e5338f548bb3fbbe5e221a499c661de20d716af2q.jpg') }}" alt="IMage">
                            </div>
                            <div class="advWindText">
                                <p>Blodgett 951-966</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!--<div class="advertising">-->
            <!--    <i>Advertising</i>-->
            <!--    <img src="https://thumbs.gfycat.com/HairyWhisperedIndigowingedparrot-size_restricted.gif"-->
            <!--         alt="advertising" style="width: 100%;">-->
            <!--</div>-->
            <div class="row">
                <div class="container">
                    <h4 class="catHeaderText">
                        <a href="en/category/2.html" style="color:black;">REFRIGERATION / ICE MAKERS</a>
                    </h4>
                </div>

                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 showProducts">
                    <div class="advWindows">
                        <a href="en/item/11.html" style="color: inherit">
                            <div class="advWindImage">
                                <img src="{{ asset('img/products/resize/df401a3511145be7b09937d6b3ebb88e3') }}acdabc8W3.jpg"
                                     alt="IMage">
                            </div>
                            <div class="advWindText">
                                <p>Single glass door reach in freezer</p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 showProducts">
                    <div class="advWindows">
                        <a href="en/item/10.html" style="color: inherit">
                            <div class="advWindImage">
                                <img src="{{ asset('img/products/resize/d1a8b2492ad723334ce43dca083681d2c') }}08e9e36A0.jpg"
                                     alt="IMage">
                            </div>
                            <div class="advWindText">
                                <p>Reach in refrigerator 3 sections</p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 showProducts">
                    <div class="advWindows">
                        <a href="en/item/12.html" style="color: inherit">
                            <div class="advWindImage">
                                <img src="{{ asset('img/products/resize/2bc534a55a2732f75d74ecff60a2e9f79') }}d5ea0f5BQ.jpg"
                                     alt="IMage">
                            </div>
                            <div class="advWindText">
                                <p>Single door reach in refrigerator</p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 showProducts">
                    <div class="advWindows">
                        <a href="en/item/9.html" style="color: inherit">
                            <div class="advWindImage">
                                <img src="{{ asset('img/products/resize/ea962a996fdbeb84adc7e218c459a92fb') }}3b12f50xU.jpg"
                                     alt="IMage">
                            </div>
                            <div class="advWindText">
                                <p>Reach in refrigerator 2 section</p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 showProducts">
                    <div class="advWindows">
                        <a href="en/item/14.html" style="color: inherit">
                            <div class="advWindImage">
                                <img src="{{ asset('img/products/resize/bbcb96e3b8d3623b3d7d7e5fd5dffaa25') }}2ee49e7SK.jpg"
                                     alt="IMage">
                            </div>
                            <div class="advWindText">
                                <p>1 door prep table</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!--<div class="advertising">-->
            <!--    <i>Advertising</i>-->
            <!--    <img src="https://media1.tenor.com/images/1674bacdbcb99adc80856dcb54039e9f/tenor.gif" alt="advertising"-->
            <!--         style="width: 100%;">-->
            <!--</div>-->
            <div class="row">
                <div class="container">
                    <h4 class="catHeaderText"><a href="en/category/3.html" style="color:black;">FOOD PROCESSING</a></h4>
                </div>

                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 showProducts">
                    <div class="advWindows">
                        <a href="en/item/17.html" style="color: inherit">
                            <div class="advWindImage">
                                <img src="{{ asset('img/products/resize/b08250085d6ac73b1e915d6722e3f6b820305645Ht.jpg') }}" alt="IMage">
                            </div>
                            <div class="advWindText">
                                <p>Meat slicer 10&#039;&#039;</p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 showProducts">
                    <div class="advWindows">
                        <a href="en/item/15.html" style="color: inherit">
                            <div class="advWindImage">
                                <img src="{{ asset('img/products/resize/8360bfc2a38642b70526865ed2a9819f3428eb95ws.jpg') }}" alt="IMage">
                            </div>
                            <div class="advWindText">
                                <p>Kitchenaid 7qt</p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-6 col-sm-6 col-md-4 col-lg-3 col-xl-2 showProducts">
                    <div class="advWindows">
                        <a href="en/item/16.html" style="color: inherit">
                            <div class="advWindImage">
                                <img src="{{ asset('img/products/resize/bfac3d64ec202b64fa93a6888a1dd80fbbda9493xC.jpg') }}" alt="IMage">
                            </div>
                            <div class="advWindText">
                                <p>20qt stand mixer</p>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!--<div class="advertising">-->
            <!--    <i>Advertising</i>-->
            <!--    <img src="https://vgif.ru/gifs/156/vgif-ru-26821.gif" alt="advertising" style="width: 100%;">-->
            <!--</div>-->
            <div class="row">
                <div class="container">
                    <h4 class="catHeaderText"><a href="en/category/4.html" style="color:black;">NEUTRAL UNITS</a>  </h4>
                </div>
            </div>

            <div class="row">
                <div class="container">
                    <h4 class="catHeaderText"><a href="en/category/5.html" style="color:black;">Services</a> </h4>
                </div>
            </div>

            <div class="row">
                <div class="container">
                    <h4 class="catHeaderText"><a href="en/category/7.html" style="color:black;">Storage and shelving</a> </h4>
                </div>
            </div>
        </div>

    </div>
@endsection

@push('scripts')

@endpush