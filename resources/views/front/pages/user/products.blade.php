@extends('front.layouts.main')

@section('content')
    <div class="container product">
        <div class="product-window">

            <div class="container __margin-top-35">
                <h3>@lang('lang.Products')</h3>
                <div class="row">
                    @forelse($products as $product)
                        <div class="col showProducts">
                            <div class="advWindows">
                                <a href="{{ route('front.product', $product->id) }}" style="color: inherit">
                                    <div class="advWindImage">
{{--                                        <img src="{{asset('/img/products/' . $product->lastImage->resized_path)}}" alt="IMage">--}}
                                        <img src="{{asset('/img/products/' . $product->mainImage->resized_path)}}" alt="IMage">
                                    </div>

                                    <div class="advWindText">
                                        <p>{{ $product->price }}</p>
                                        <p>{{ $product->title }}</p>
                                        <p class="text-center">
                                            <button class="btn btn-info">@lang('lang.learnmore')</button>
                                        </p>

                                        <p class="text-center">
                                            <a href="{{ route('user.products.edit.form', $product->id) }}" class="btn btn-info">@lang('lang.edit')</a>
                                        </p>

                                        <form action="{{ route('products.destroy', $product->id) }} " method="POST">
                                            @csrf
                                            @method('delete')
                                            <p class="text-center">
                                                <button type="submit" onclick="return confirm('Are you sure?')" class="btn-sm btn btn-danger">
                                                    @lang('lang.delete')
                                                </button>
                                            </p>
                                        </form>

                                    </div>
                                </a>
                            </div>
                        </div>
                    @empty
                        <li>No Products</li>
                    @endforelse
                </div>
            </div>

            <div class="container gallery">
                <div class="modal fade" id="image-gallery" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title" id="image-gallery-title"></h4>
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <img alt="IMG" id="image-gallery-image" class="img-responsive col-md-12" src="">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary float-left" id="show-previous-image"><i class="fa fa-arrow-left"></i>
                                </button>

                                <button type="button" id="show-next-image" class="btn btn-secondary float-right"><i class="fa fa-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
