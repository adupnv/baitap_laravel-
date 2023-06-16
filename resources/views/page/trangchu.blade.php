@extends('master')
@section('content')
    <div>
        @php
            $gio = gmdate('H', time() + 3600 * 7);
        @endphp
        @if ($gio < 12)
            Chào Buổi sáng
        @elseif ($gio < 18)
            Chào buổi chiều
        @else
            chào buổi tối
        @endif

        @php
            $ngay = date('d/m/Y');
            $thu = date('N');
            switch ($thu) {
                case 1:
                    $chuoi_thu = 'Thứ 2';
                    break;
                case 2:
                    $chuoi_thu = 'Thứ 3';
                    break;
                case 3:
                    $chuoi_thu = 'Thứ 4';
                    break;
                case 4:
                    $chuoi_thu = 'Thứ 5';
                    break;
                case 5:
                    $chuoi_thu = 'Thứ 6';
                    break;
                case 6:
                    $chuoi_thu = 'Thứ 7';
                    break;
                default:
                    $chuoi_thu = 'Chủ nhật';
                    break;
            }
        @endphp

        <div>
            Hôm nay là {{ $chuoi_thu }}, ngày {{ $ngay }}
        </div>

        <div class="grid">
            @for ($i = 1; $i <= 9; $i++)
                <div class="box"></div>
            @endfor
        </div>



    </div>


    <div class="fullwidthbanner-container">
        <div class="fullwidthbanner">
            <div class="bannercontainer">
                <div class="banner">
                    <ul>
                        @foreach ($slide as $sl)
                            <li data-transition="boxfade" data-slotamount="20" class="active-revslide current-sr-slide-visible"
                                style="width: 100%; height: 100%; overflow: hidden; visibility: inherit; opacity: 1; z-index: 20;">
                                <div class="slotholder" style="width:100%;height:100%;" data-duration="undefined"
                                    data-zoomstart="undefined" data-zoomend="undefined" data-rotationstart="undefined"
                                    data-rotationend="undefined" data-ease="undefined" data-bgpositionend="undefined"
                                    data-bgposition="undefined" data-kenburns="undefined" data-easeme="undefined"
                                    data-bgfit="undefined" data-bgfitend="undefined" data-owidth="undefined"
                                    data-oheight="undefined">
                                    <div class="tp-bgimg defaultimg" data-lazyload="undefined" data-bgfit="cover"
                                        data-bgposition="center center" data-bgrepeat="no-repeat" data-lazydone="undefined"
                                        src="source/image/slide/{{ $sl->image }}"
                                        data-src="source/image/slide/{{ $sl->image }}"
                                        style="background-color: rgba(0, 0, 0, 0); background-repeat: no-repeat; background-image: url('source/image/slide/{{ $sl->image }}'); background-size: cover; background-position: center center; width: 100%; height: 100%; opacity: 1; visibility: inherit;">
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="tp-bannertimer"></div>
        </div>
    </div>
    <!--slider-->


    <div class="container">
        <div id="content" class="space-top-none">
            <div class="main-content">
                <div class="space60">&nbsp;</div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="beta-products-list">
                            <h4>New Products</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy {{ count($newProduct) }} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                @foreach ($newProduct as $pr)
                                    <div class="col-sm-3">
                                        <div class="single-item">
                                            @if ($pr->promotion != 0)
                                                <div class="ribbon-wrapper">
                                                    <div class="ribbon sale">i love you</div>
                                                </div>
                                            @endif
                                            <div class="single-item-header">
                                                <a href="detail/{{$pr->id}}"><img width="200" height="200" src="source/image/product/{{ $pr->image }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{ $pr->name }}</p>
                                                <p class="single-item-price" style="font-size: 18px">
                                                    @if ($pr->promotion_price == 0)
                                                        <span
                                                            class="flash-sale">{{ number_format($pr->unit_price) }}đồng</span>
                                                    @else
                                                        <span
                                                            class="flash-del">{{ number_format($pr->unit_price) }}đồng</span>
                                                        <span
                                                            class="flash-sale">{{ number_format($pr->promotion_price) }}đồng</span>
                                                    @endif
                                                </p>
                                            </div>


                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left" href="{{route('themgiohang',$pr->id)}}"><i
                                                        class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary" href="{{route('chitietsanpham',$pr->id)}}">Details <i
                                                        class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>                           
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="row">{{ $newProduct->links() }}</div>
                        </div> <!-- .beta-products-list -->
                        <div class="space50">&nbsp;</div>
                        <div class="beta-products-list">
                            <h4>Top Products</h4>
                            <div class="beta-products-details">
                                <p class="pull-left">Tìm thấy {{ count($topProduct) }} sản phẩm</p>
                                <div class="clearfix"></div>
                            </div>
                            <div class="row">
                                @foreach ($topProduct as $tp)
                                    <div class="col-sm-3">
                                        <div class="single-item">
                                            <div class="single-item-header">
                                                <a href="detail/{{$tp->id}}"><img src="source/image/product/{{ $tp->image }}"
                                                        alt=""></a>
                                            </div>
                                            <div class="single-item-body">
                                                <p class="single-item-title">{{ $tp->name }}</p>
                                                <p class="single-item-price" style="font-size: 18px">
                                                    <span class="flash-del">{{ number_format($tp->unit_price) }}đồng</span>
                                                    <span
                                                        class="flash-sale">{{ number_format($tp->promotion_price) }}đồng</span>

                                                </p>
                                            </div>
                                            <div class="single-item-caption">
                                                <a class="add-to-cart pull-left" href="shopping_cart.html"><i
                                                        class="fa fa-shopping-cart"></i></a>
                                                <a class="beta-btn primary" href="detail/{{$tp->id}}">Details <i
                                                        class="fa fa-chevron-right"></i></a>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div> <!-- .beta-products-list -->
                    </div>
                </div> <!-- end section with sidebar and main content -->
            </div> <!-- .main-content -->
        </div> <!-- #content -->
    </div> <!-- .container -->
@endsection
