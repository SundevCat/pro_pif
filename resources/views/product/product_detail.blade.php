@extends('main.layouts.master')
@section('title', 'Plantoys PIF')

@section('header_script')
    <style>
        .table {
            margin-bottom: 0px;
        }

        .table td {
            padding: 0.75rem;
            padding-left: 2rem;
        }

        tr td:first-child {
            background-color: #fcfcfc;
            vertical-align: top;
        }

        .font-10-url-img {
            font-size: 10px;
        }

        .icon-copy {
            color: blue;
            cursor: pointer;
        }

        .img-detail {
            width: 70px;
            height: 60px;
        }

        .img-detail-package {
            width: 80px;
            height: 60px;
        }
    </style>
@endsection

@section('content')

    @include('main.layouts.message')
    
	<div class="page-header">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="title">
                    <h4>Product Detail</h4>
                </div>
                <nav aria-label="breadcrumb" role="navigation">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ URL::to('/') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ URL::to('/product_detail') }}">Product Info</a></li>
						<li class="breadcrumb-item"><a href="javascript: history.go(-1)">Product Info 7 Digit</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Product Detail</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="card-box pd-20 height-100-p mb-30">
        <div class="row">
            {{-- <div class="col-sm-4">
                <h4 class="mb-20 h4">export excel</h4>
            </div> --}}
            <div class="col-sm-12">
                <div class="faq-wrap">
                    <div id="product_detail">
                        <div class="card">
                            <div class="card-header">
                                <button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq1">
                                    Product
                                </button>
                            </div>
                            <div id="faq1" class="collapse" data-parent="#product_detail">
                                <div class="card-body p-0">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="col-3">
                                                    SKU
                                                </td>
                                                <td class="col-9">
                                                    {{ $product_detail->sku_code }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    7 Digit
                                                </td>
                                                <td>
                                                    {{ $product_detail->sku_7digit }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Name
                                                </td>
                                                <td>
                                                    {{ $product_detail->sku_name }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="col-3">
                                                    Main image
                                                </td>
                                                @if ($product_detail->main_image == 'N/A')
                                                    <td class="col-9 pt-0 pb-0">
                                                        <img src="../../public/images/Image-Not-Available.png"
                                                            alt="" srcset="" width="50px" height="50px">
                                                    </td>
                                                @else
                                                    <td class="row">
                                                        <div class="col-2 text-center">
                                                            <img class="img-detail"
                                                                src="{{ $product_detail->main_image }} "alt=""
                                                                srcset="">
                                                        </div>
                                                        <div class="col-9">
                                                            <p class=" font-10-url-img">
                                                                {{ $product_detail->main_image }}</p>
                                                        </div>
                                                        <div class="col-1 d-flex">
                                                            <p class=" mt-auto mb-auto" id="tool"
                                                                onclick="copyurl( '{{ $product_detail->main_image }}' )"
                                                                data-toggle="tooltip" title="Copy URL">
                                                                <i class="icon-copy fa fa-copy" aria-hidden="true"></i>
                                                                <i class="icon-copy fa fa-check" style="display:none"
                                                                    aria-hidden="true"></i>
                                                            </p>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td>
                                                    Product Year
                                                </td>
                                                <td>
                                                    {{ $product_detail->product_year }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Catagory
                                                </td>
                                                <td class="col-sm-6">
                                                    {{ $product_detail->category }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Catalog Status
                                                </td>
                                                <td class="col-sm-6">
                                                    {{ $product_detail->catalog_status }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Age
                                                </td>
                                                <td>
                                                    {{ $product_detail->age }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    EAN Barcode (on inner box)
                                                </td>
                                                <td class="col-sm-6">
                                                    {{ $product_detail->ean_barcode }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Flag DIA
                                                </td>
                                                <td>
                                                    {{ $product_detail->flag_dia }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Product Width (Inch)
                                                </td>
                                                <td>
                                                    {{ floatval($product_detail->product_width_inch) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Product Lenght (Inch)
                                                </td>
                                                <td>
                                                    {{ floatval($product_detail->product_length_inch) }}
                                                </td>
                                            <tr>
                                                <td>
                                                    Product Height (Inch)
                                                </td>
                                                <td>
                                                    {{ floatval($product_detail->product_height_inch) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Product Weight (lbs)
                                                </td>
                                                <td>
                                                    {{ floatval($product_detail->product_weight_lbs) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Size Biggest
                                                </td>
                                                <td class="col-sm-6">
                                                    {{ $product_detail->size_biggest }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Product Width (cm)
                                                </td>
                                                <td>
                                                    {{ floatval($product_detail->product_width_cm) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Product Length (cm)
                                                </td>
                                                <td>
                                                    {{ floatval($product_detail->product_length_cm) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Product Height (cm)
                                                </td>
                                                <td>
                                                    {{ floatval($product_detail->product_height_cm) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Product Weight (kg)
                                                </td>
                                                <td>
                                                    {{ floatval($product_detail->product_weight_kg) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Product Description
                                                </td>
                                                <td>
                                                    {{ $product_detail->sku_description }}
                                                </td>
                                            </tr>
                                            <tr style="height: auto">
                                                <td>
                                                    Care Instruction
                                                </td>
                                                <td>
                                                    {{ $product_detail->care_instruction }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Assembly Instruction
                                                </td>
                                                <td>
                                                    {{ $product_detail->assembly_instruction }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Caution Sheet
                                                </td>
                                                <td>
                                                    {{ $product_detail->caution_sheet }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    How to Play
                                                </td>
                                                <td>
                                                    {{ $product_detail->how_to_play }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Pieces Count
                                                </td>
                                                <td>
                                                    {{ $product_detail->pieces_count }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Compositions
                                                </td>
                                                <td>
                                                    {{ $product_detail->compositions }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    List of Accessories
                                                </td>
                                                <td>
                                                    {{ $product_detail->list_of_accessories }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Dimension (cm)
                                                </td>
                                                <td>
                                                    {{ $product_detail->dimension_cm }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Dimension (Inch)
                                                </td>
                                                <td>
                                                    {{ $product_detail->dimension_inch }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Color
                                                </td>
                                                <td>
                                                    {{ $product_detail->colors }}
                                                </td>
                                                </td>
                                            <tr>
                                                <td>
                                                    Long Description
                                                </td>
                                                <td>
                                                    {{ $product_detail->long_description }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Plastic type
                                                </td>
                                                <td>
                                                    {{ $product_detail->plastic_type }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Plastic Location
                                                </td>
                                                <td>
                                                    {{ $product_detail->plastic_location }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    NRF Color Number
                                                </td>
                                                <td>
                                                    {{ $product_detail->nrf_color_number }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    NRF Color Name
                                                </td>
                                                <td>
                                                    {{ $product_detail->nrf_color_name }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Max Child Height (cm)
                                                </td>
                                                <td>
                                                    {{ floatval($product_detail->max_child_height_cm) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Max Child Weight (kg)
                                                </td>
                                                <td>
                                                    {{ floatval($product_detail->max_child_weight_kg) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Planwood
                                                </td>
                                                <td>
                                                    {{ $product_detail->planwood }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Carbon Footprint (kg)
                                                </td>
                                                <td>
                                                    {{ floatval($product_detail->carbon_footprint_kg) }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Carbon Footprint (lbs)
                                                </td>
                                                <td>
                                                    {{ floatval($product_detail->carbon_footprint_lbs) }}
                                                </td>
                                                </td>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq2">
                                    Award
                                </button>
                            </div>
                            <div id="faq2" class="collapse" data-parent="#product_detail">
                                <div class="card-body p-0">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="col-3">
                                                    Award-1
                                                </td>
                                                <td class="col-9">
                                                    {{ $product_detail->award_1 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Award-2
                                                </td>
                                                <td>
                                                    {{ $product_detail->award_2 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Award-3
                                                </td>
                                                <td>
                                                    {{ $product_detail->award_3 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Award-4
                                                </td>
                                                <td>
                                                    {{ $product_detail->award_4 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Award-5
                                                </td>
                                                <td>
                                                    {{ $product_detail->award_5 }}
                                            </tr>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Award-6
                                                </td>
                                                <td>
                                                    {{ $product_detail->award_6 }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq3">
                                    Child Development
                                </button>
                            </div>
                            <div id="faq3" class="collapse" data-parent="#product_detail">
                                <div class="card-body p-0">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="col-3">
                                                    Child Development 1
                                                </td>
                                                <td class="col-9">
                                                    {{ $product_detail->child_dev_1 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Child Development 2
                                                </td>
                                                <td>
                                                    {{ $product_detail->child_dev_2 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Child Development 3
                                                </td>
                                                <td class="col-sm-6">
                                                    {{ $product_detail->child_dev_3 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Child Development 4
                                                </td>
                                                <td>
                                                    {{ $product_detail->child_dev_4 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Child Development 5
                                                </td>
                                                <td>
                                                    {{ $product_detail->child_dev_5 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Child Development 6
                                                </td>
                                                <td>
                                                    {{ $product_detail->child_dev_6 }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq4">
                                    Warning Statements
                                </button>
                            </div>
                            <div id="faq4" class="collapse" data-parent="#product_detail">
                                <div class="card-body p-0">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="col-3">
                                                    PROP65
                                                </td>
                                                <td class="col-9">
                                                    {{ $product_detail->prop65 }}
                                                </td>
                                            <tr>
                                                <td>
                                                    Choking Hazard
                                                </td>
                                                <td>
                                                    {{ $product_detail->choking_hazard }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Warning Label
                                                </td>
                                                <td>
                                                    {{ $product_detail->warning_label }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq5">
                                    Lifestyle Image
                                </button>
                            </div>
                            <div id="faq5" class="collapse" data-parent="#product_detail">
                                <div class="card-body p-0">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="col-2">
                                                    Lifestyle Image 1
                                                </td>
                                                @if ($product_detail->lifestyle_img_2 == 'N/A')
                                                    <td class="col-10 pt-0 pb-0">
                                                        <img src="../../public/images/Image-Not-Available.png"
                                                            alt="" srcset="" width="50px" height="50px">
                                                    </td>
                                                @else
                                                    <td class="row">
                                                        <div class="col-2 text-center">
                                                            <img class="img-detail"
                                                                src="{{ $product_detail->lifestyle_img_1 }} "alt=""
                                                                srcset="">
                                                        </div>
                                                        <div class="col-9">
                                                            <p class=" font-10-url-img">
                                                                {{ $product_detail->lifestyle_img_1 }}</p>
                                                        </div>
                                                        <div class="col-1 d-flex">
                                                            <p class="mt-auto mb-auto" id="tool"
                                                                onclick="copyurl( '{{ $product_detail->lifestyle_img_1 }}' )"
                                                                data-toggle="tooltip" title="Copy URL">
                                                                <i class="icon-copy fa fa-copy" aria-hidden="true"></i>
                                                                <i class="icon-copy fa fa-check" style="display:none"
                                                                    aria-hidden="true"></i>
                                                            </p>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td class="col-2">
                                                    Lifestyle Image 2
                                                </td>
                                                @if ($product_detail->lifestyle_img_2 == 'N/A')
                                                    <td class="col-10 pt-0 pb-0">
                                                        <img src="../../public/images/Image-Not-Available.png"
                                                            alt="" srcset="" width="50px" height="50px">
                                                    </td>
                                                @else
                                                    <td class="row">
                                                        <div class="col-2 text-center">
                                                            <img class="img-detail"
                                                                src="{{ $product_detail->lifestyle_img_2 }} "alt=""
                                                                srcset="">
                                                        </div>
                                                        <div class="col-9">
                                                            <p class=" font-10-url-img">
                                                                {{ $product_detail->lifestyle_img_2 }}</p>
                                                        </div>
                                                        <div class="col-1 d-flex">
                                                            <p class="mt-auto mb-auto" id="tool"
                                                                onclick="copyurl( '{{ $product_detail->lifestyle_img_2 }}' )"
                                                                data-toggle="tooltip" title="Copy URL">
                                                                <i class="icon-copy fa fa-copy" aria-hidden="true"></i>
                                                                <i class="icon-copy fa fa-check" style="display:none"
                                                                    aria-hidden="true"></i>
                                                            </p>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td class="col-2">
                                                    Lifestyle Image 3
                                                </td>
                                                @if ($product_detail->lifestyle_img_3 == 'N/A')
                                                    <td class="col-10 pt-0 pb-0">
                                                        <img src="../../public/images/Image-Not-Available.png"
                                                            alt="" srcset="" width="50px" height="50px">
                                                    </td>
                                                @else
                                                    <td class="row">
                                                        <div class="col-2 text-center">
                                                            <img class="img-detail"
                                                                src="{{ $product_detail->lifestyle_img_3 }} "alt=""
                                                                srcset="">
                                                        </div>
                                                        <div class="col-9">
                                                            <p class=" font-10-url-img">
                                                                {{ $product_detail->lifestyle_img_3 }}</p>
                                                        </div>
                                                        <div class="col-1 d-flex">
                                                            <p class=" mt-auto mb-auto" id="tool"
                                                                onclick="copyurl( '{{ $product_detail->lifestyle_img_3 }}' )"
                                                                data-toggle="tooltip" title="Copy URL">
                                                                <i class="icon-copy fa fa-copy" aria-hidden="true"></i>
                                                                <i class="icon-copy fa fa-check" style="display:none"
                                                                    aria-hidden="true"></i>
                                                            </p>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td class="col-2">
                                                    Lifestyle Image 4
                                                </td>
                                                @if ($product_detail->lifestyle_img_4 == 'N/A')
                                                    <td class="col-10 pt-0 pb-0">
                                                        <img src="../../public/images/Image-Not-Available.png"
                                                            alt="" srcset="" width="50px" height="50px">
                                                    </td>
                                                @else
                                                    <td class="row">
                                                        <div class="col-2 text-center">
                                                            <img class="img-detail"
                                                                src="{{ $product_detail->lifestyle_img_4 }} "alt=""
                                                                srcset="">
                                                        </div>
                                                        <div class="col-9">
                                                            <p class=" font-10-url-img">
                                                                {{ $product_detail->lifestyle_img_4 }}</p>
                                                        </div>
                                                        <div class="col-1 d-flex">
                                                            <p class=" mt-auto mb-auto" id="tool"
                                                                onclick="copyurl( '{{ $product_detail->lifestyle_img_4 }}' )"
                                                                data-toggle="tooltip" title="Copy URL">
                                                                <i class="icon-copy fa fa-copy" aria-hidden="true"></i>
                                                                <i class="icon-copy fa fa-check" style="display:none"
                                                                    aria-hidden="true"></i>
                                                            </p>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td class="col-2">
                                                    Lifestyle Image 5
                                                </td>
                                                @if ($product_detail->lifestyle_img_5 == 'N/A')
                                                    <td class="col-10 pt-0 pb-0">
                                                        <img src="../../public/images/Image-Not-Available.png"
                                                            alt="" srcset="" width="50px" height="50px">
                                                    </td>
                                                @else
                                                    <td class="row">
                                                        <div class="col-2 text-center">
                                                            <img class="img-detail"
                                                                src="{{ $product_detail->lifestyle_img_5 }} "alt=""
                                                                srcset="">
                                                        </div>
                                                        <div class="col-9">
                                                            <p class=" font-10-url-img">
                                                                {{ $product_detail->lifestyle_img_5 }}</p>
                                                        </div>
                                                        <div class="col-1 d-flex">
                                                            <p class=" mt-auto mb-auto" id="tool"
                                                                onclick="copyurl( '{{ $product_detail->lifestyle_img_5 }}' )"
                                                                data-toggle="tooltip" title="Copy URL">
                                                                <i class="icon-copy fa fa-copy" aria-hidden="true"></i>
                                                                <i class="icon-copy fa fa-check" style="display:none"
                                                                    aria-hidden="true"></i>
                                                            </p>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td class="col-2">
                                                    Lifestyle Image 6
                                                </td>
                                                @if ($product_detail->lifestyle_img_6 == 'N/A')
                                                    <td class="col-10 pt-0 pb-0">
                                                        <img src="../../public/images/Image-Not-Available.png"
                                                            alt="" srcset="" width="50px" height="50px">
                                                    </td>
                                                @else
                                                    <td class="row">
                                                        <div class="col-2 text-center">
                                                            <img class="img-detail"
                                                                src="{{ $product_detail->lifestyle_img_6 }} "alt=""
                                                                srcset="">
                                                        </div>
                                                        <div class="col-9">
                                                            <p class=" font-10-url-img">
                                                                {{ $product_detail->lifestyle_img_6 }}</p>
                                                        </div>
                                                        <div class="col-1 d-flex">
                                                            <p class=" mt-auto mb-auto" id="tool"
                                                                onclick="copyurl( '{{ $product_detail->lifestyle_img_6 }}' )"
                                                                data-toggle="tooltip" title="Copy URL">
                                                                <i class="icon-copy fa fa-copy" aria-hidden="true"></i>
                                                                <i class="icon-copy fa fa-check" style="display:none"
                                                                    aria-hidden="true"></i>
                                                            </p>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td class="col-2">
                                                    Lifestyle Image 7
                                                </td>
                                                @if ($product_detail->lifestyle_img_7 == 'N/A')
                                                    <td class="col-10 pt-0 pb-0">
                                                        <img src="../../public/images/Image-Not-Available.png"
                                                            alt="" srcset="" width="50px" height="50px">
                                                    </td>
                                                @else
                                                    <td class="row">
                                                        <div class="col-2 text-center">
                                                            <img class="img-detail"
                                                                src="{{ $product_detail->lifestyle_img_7 }} "alt=""
                                                                srcset="">
                                                        </div>
                                                        <div class="col-9">
                                                            <p class=" font-10-url-img">
                                                                {{ $product_detail->lifestyle_img_7 }}</p>
                                                        </div>
                                                        <div class="col-1 d-flex">
                                                            <p class=" mt-auto mb-auto" id="tool"
                                                                onclick="copyurl( '{{ $product_detail->lifestyle_img_7 }}' )"
                                                                data-toggle="tooltip" title="Copy URL">
                                                                <i class="icon-copy fa fa-copy" aria-hidden="true"></i>
                                                                <i class="icon-copy fa fa-check" style="display:none"
                                                                    aria-hidden="true"></i>
                                                            </p>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td class="col-2">
                                                    Lifestyle Image 8
                                                </td>
                                                @if ($product_detail->lifestyle_img_8 == 'N/A')
                                                    <td class="col-10 pt-0 pb-0">
                                                        <img src="../../public/images/Image-Not-Available.png"
                                                            alt="" srcset="" width="50px" height="50px">
                                                    </td>
                                                @else
                                                    <td class="row">
                                                        <div class="col-2 text-center">
                                                            <img class="img-detail"
                                                                src="{{ $product_detail->lifestyle_img_8 }} "alt=""
                                                                srcset="">
                                                        </div>
                                                        <div class="col-9">
                                                            <p class=" font-10-url-img">
                                                                {{ $product_detail->lifestyle_img_8 }}</p>
                                                        </div>
                                                        <div class="col-1 d-flex">
                                                            <p class=" mt-auto mb-auto" id="tool"
                                                                onclick="copyurl( '{{ $product_detail->lifestyle_img_8 }}' )"
                                                                data-toggle="tooltip" title="Copy URL">
                                                                <i class="icon-copy fa fa-copy" aria-hidden="true"></i>
                                                                <i class="icon-copy fa fa-check" style="display:none"
                                                                    aria-hidden="true"></i>
                                                            </p>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td class="col-2">
                                                    Lifestyle Image 9
                                                </td>
                                                @if ($product_detail->lifestyle_img_9 == 'N/A')
                                                    <td class="col-10 pt-0 pb-0">
                                                        <img src="../../public/images/Image-Not-Available.png"
                                                            alt="" srcset="" width="50px" height="50px">
                                                    </td>
                                                @else
                                                    <td class="row">
                                                        <div class="col-2 text-center">
                                                            <img class="img-detail"
                                                                src="{{ $product_detail->lifestyle_img_9 }} "alt=""
                                                                srcset="">
                                                        </div>
                                                        <div class="col-9">
                                                            <p class=" font-10-url-img">
                                                                {{ $product_detail->lifestyle_img_9 }}</p>
                                                        </div>
                                                        <div class="col-1 d-flex">
                                                            <p class=" mt-auto mb-auto" id="tool"
                                                                onclick="copyurl( '{{ $product_detail->lifestyle_img_9 }}' )"
                                                                data-toggle="tooltip" title="Copy URL">
                                                                <i class="icon-copy fa fa-copy" aria-hidden="true"></i>
                                                                <i class="icon-copy fa fa-check" style="display:none"
                                                                    aria-hidden="true"></i>
                                                            </p>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td class="col-2">
                                                    Lifestyle Image 10
                                                </td>
                                                @if ($product_detail->lifestyle_img_10 == 'N/A')
                                                    <td class="col-10 pt-0 pb-0">
                                                        <img src="../../public/images/Image-Not-Available.png"
                                                            alt="" srcset="" width="50px" height="50px">
                                                    </td>
                                                @else
                                                    <td class="row">
                                                        <div class="col-2 text-center">
                                                            <img class="img-detail"
                                                                src="{{ $product_detail->lifestyle_img_10 }} "alt=""
                                                                srcset="">
                                                        </div>
                                                        <div class="col-9">
                                                            <p class=" font-10-url-img">
                                                                {{ $product_detail->lifestyle_img_10 }}</p>
                                                        </div>
                                                        <div class="col-1 d-flex">
                                                            <p class=" mt-auto mb-auto" id="tool"
                                                                onclick="copyurl( '{{ $product_detail->lifestyle_img_10 }}' )"
                                                                data-toggle="tooltip" title="Copy URL">
                                                                <i class="icon-copy fa fa-copy" aria-hidden="true"></i>
                                                                <i class="icon-copy fa fa-check" style="display:none"
                                                                    aria-hidden="true"></i>
                                                            </p>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq6">
                                    Product Image
                                </button>
                            </div>
                            <div id="faq6" class="collapse" data-parent="#product_detail">
                                <div class="card-body p-0">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="col-3">
                                                    Main image
                                                </td>
                                                @if ($product_detail->main_image == 'N/A')
                                                    <td class="col-9 pt-0 pb-0">
                                                        <img src="../../public/images/Image-Not-Available.png"
                                                            alt="" srcset="" width="50px" height="50px">
                                                    </td>
                                                @else
                                                    <td class="row">
                                                        <div class="col-2 text-center">
                                                            <img class="img-detail"
                                                                src="{{ $product_detail->main_image }} "alt=""
                                                                srcset="">
                                                        </div>
                                                        <div class="col-9">
                                                            <p class=" font-10-url-img">
                                                                {{ $product_detail->main_image }}</p>
                                                        </div>
                                                        <div class="col-1 d-flex">
                                                            <p class=" mt-auto mb-auto" id="tool"
                                                                onclick="copyurl( '{{ $product_detail->main_image }}' )"
                                                                data-toggle="tooltip" title="Copy URL">
                                                                <i class="icon-copy fa fa-copy" aria-hidden="true"></i>
                                                                <i class="icon-copy fa fa-check" style="display:none"
                                                                    aria-hidden="true"></i>
                                                            </p>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td class="col-3">
                                                    Product image 1
                                                </td>
                                                @if ($product_detail->product_img_1 == 'N/A')
                                                    <td class="col-9 pt-0 pb-0">
                                                        <img src="../../public/images/Image-Not-Available.png"
                                                            alt="" srcset="" width="50px" height="50px">
                                                    </td>
                                                @else
                                                    <td class="row">
                                                        <div class="col-2 text-center">
                                                            <img class="img-detail-package"
                                                                src="{{ $product_detail->product_img_1 }} "alt=""
                                                                srcset="">
                                                        </div>
                                                        <div class="col-9">
                                                            <p class=" font-10-url-img">
                                                                {{ $product_detail->product_img_1 }}</p>
                                                        </div>
                                                        <div class="col-1 d-flex">
                                                            <p class=" mt-auto mb-auto" id="tool"
                                                                onclick="copyurl( '{{ $product_detail->product_img_1 }}' )"
                                                                data-toggle="tooltip" title="Copy URL">
                                                                <i class="icon-copy fa fa-copy" aria-hidden="true"></i>
                                                                <i class="icon-copy fa fa-check" style="display:none"
                                                                    aria-hidden="true"></i>
                                                            </p>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td class="col-3">
                                                    Product image 2
                                                </td>
                                                @if ($product_detail->product_img_2 == 'N/A')
                                                    <td class="col-9 pt-0 pb-0">
                                                        <img src="../../public/images/Image-Not-Available.png"
                                                            alt="" srcset="" width="50px" height="50px">
                                                    </td>
                                                @else
                                                    <td class="row">
                                                        <div class="col-2 text-center">
                                                            <img class="img-detail"
                                                                src="{{ $product_detail->product_img_2 }} "alt=""
                                                                srcset="">
                                                        </div>
                                                        <div class="col-9">
                                                            <p class=" font-10-url-img">
                                                                {{ $product_detail->product_img_2 }}</p>
                                                        </div>
                                                        <div class="col-1 d-flex">
                                                            <p class=" mt-auto mb-auto" id="tool"
                                                                onclick="copyurl( '{{ $product_detail->product_img_2 }}' )"
                                                                data-toggle="tooltip" title="Copy URL">
                                                                <i class="icon-copy fa fa-copy" aria-hidden="true"></i>
                                                                <i class="icon-copy fa fa-check" style="display:none"
                                                                    aria-hidden="true"></i>
                                                            </p>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td class="col-3">
                                                    Product image 3
                                                </td>
                                                @if ($product_detail->product_img_3 == 'N/A')
                                                    <td class="col-9 pt-0 pb-0">
                                                        <img src="../../public/images/Image-Not-Available.png"
                                                            alt="" srcset="" width="50px" height="50px">
                                                    </td>
                                                @else
                                                    <td class="row">
                                                        <div class="col-2 text-center">
                                                            <img class="img-detail"
                                                                src="{{ $product_detail->product_img_3 }} "alt=""
                                                                srcset="">
                                                        </div>
                                                        <div class="col-9">
                                                            <p class=" font-10-url-img">
                                                                {{ $product_detail->product_img_3 }}</p>
                                                        </div>
                                                        <div class="col-1 d-flex">
                                                            <p class=" mt-auto mb-auto" id="tool"
                                                                onclick="copyurl( '{{ $product_detail->product_img_3 }}' )"
                                                                data-toggle="tooltip" title="Copy URL">
                                                                <i class="icon-copy fa fa-copy" aria-hidden="true"></i>
                                                                <i class="icon-copy fa fa-check" style="display:none"
                                                                    aria-hidden="true"></i>
                                                            </p>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td class="col-3">
                                                    Product image 4
                                                </td>
                                                @if ($product_detail->product_img_4 == 'N/A')
                                                    <td class="col-9 pt-0 pb-0">
                                                        <img src="../../public/images/Image-Not-Available.png"
                                                            alt="" srcset="" width="50px" height="50px">
                                                    </td>
                                                @else
                                                    <td class="row">
                                                        <div class="col-2 text-center">
                                                            <img class="img-detail"
                                                                src="{{ $product_detail->product_img_4 }} "alt=""
                                                                srcset="">
                                                        </div>
                                                        <div class="col-9">
                                                            <p class=" font-10-url-img">
                                                                {{ $product_detail->product_img_4 }}</p>
                                                        </div>
                                                        <div class="col-1 d-flex">
                                                            <p class=" mt-auto mb-auto" id="tool"
                                                                onclick="copyurl( '{{ $product_detail->product_img_4 }}' )"
                                                                data-toggle="tooltip" title="Copy URL">
                                                                <i class="icon-copy fa fa-copy" aria-hidden="true"></i>
                                                                <i class="icon-copy fa fa-check" style="display:none"
                                                                    aria-hidden="true"></i>
                                                            </p>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td class="col-3">
                                                    Product image 5
                                                </td>
                                                @if ($product_detail->product_img_5 == 'N/A')
                                                    <td class="col-9 pt-0 pb-0">
                                                        <img src="../../public/images/Image-Not-Available.png"
                                                            alt="" srcset="" width="50px" height="50px">
                                                    </td>
                                                @else
                                                    <td class="row">
                                                        <div class="col-2 text-center">
                                                            <img class="img-detail"
                                                                src="{{ $product_detail->product_img_5 }} "alt=""
                                                                srcset="">
                                                        </div>
                                                        <div class="col-9">
                                                            <p class=" font-10-url-img">
                                                                {{ $product_detail->product_img_5 }}</p>
                                                        </div>
                                                        <div class="col-1 d-flex">
                                                            <p class=" mt-auto mb-auto" id="tool"
                                                                onclick="copyurl( '{{ $product_detail->product_img_5 }}' )"
                                                                data-toggle="tooltip" title="Copy URL">
                                                                <i class="icon-copy fa fa-copy" aria-hidden="true"></i>
                                                                <i class="icon-copy fa fa-check" style="display:none"
                                                                    aria-hidden="true"></i>
                                                            </p>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td class="col-3">
                                                    Product image 6
                                                </td>
                                                @if ($product_detail->product_img_6 == 'N/A')
                                                    <td class="col-9 pt-0 pb-0">
                                                        <img src="../../public/images/Image-Not-Available.png"
                                                            alt="" srcset="" width="50px" height="50px">
                                                    </td>
                                                @else
                                                    <td class="row">
                                                        <div class="col-2 text-center">
                                                            <img class="img-detail"
                                                                src="{{ $product_detail->product_img_6 }} "alt=""
                                                                srcset="">
                                                        </div>
                                                        <div class="col-9">
                                                            <p class=" font-10-url-img">
                                                                {{ $product_detail->product_img_6 }}</p>
                                                        </div>
                                                        <div class="col-1 d-flex">
                                                            <p class=" mt-auto mb-auto" id="tool"
                                                                onclick="copyurl( '{{ $product_detail->product_img_6 }}' )"
                                                                data-toggle="tooltip" title="Copy URL">
                                                                <i class="icon-copy fa fa-copy" aria-hidden="true"></i>
                                                                <i class="icon-copy fa fa-check" style="display:none"
                                                                    aria-hidden="true"></i>
                                                            </p>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td class="col-3">
                                                    Product image 7
                                                </td>
                                                @if ($product_detail->product_img_7 == 'N/A')
                                                    <td class="col-9 pt-0 pb-0">
                                                        <img src="../../public/images/Image-Not-Available.png"
                                                            alt="" srcset="" width="50px" height="50px">
                                                    </td>
                                                @else
                                                    <td class="row">
                                                        <div class="col-2 text-center">
                                                            <img class="img-detail"
                                                                src="{{ $product_detail->product_img_7 }} "alt=""
                                                                srcset="">
                                                        </div>
                                                        <div class="col-9">
                                                            <p class=" font-10-url-img">
                                                                {{ $product_detail->product_img_7 }}</p>
                                                        </div>
                                                        <div class="col-1 d-flex">
                                                            <p class=" mt-auto mb-auto" id="tool"
                                                                onclick="copyurl( '{{ $product_detail->product_img_7 }}' )"
                                                                data-toggle="tooltip" title="Copy URL">
                                                                <i class="icon-copy fa fa-copy" aria-hidden="true"></i>
                                                                <i class="icon-copy fa fa-check" style="display:none"
                                                                    aria-hidden="true"></i>
                                                            </p>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td class="col-3">
                                                    Product image 8
                                                </td>
                                                @if ($product_detail->product_img_8 == 'N/A')
                                                    <td class="col-9 pt-0 pb-0">
                                                        <img src="../../public/images/Image-Not-Available.png"
                                                            alt="" srcset="" width="50px" height="50px">
                                                    </td>
                                                @else
                                                    <td class="row">
                                                        <div class="col-2 text-center">
                                                            <img class="img-detail"
                                                                src="{{ $product_detail->product_img_8 }} "alt=""
                                                                srcset="">
                                                        </div>
                                                        <div class="col-9">
                                                            <p class=" font-10-url-img">
                                                                {{ $product_detail->product_img_ }}</p>
                                                        </div>
                                                        <div class="col-1 d-flex">
                                                            <p class=" mt-auto mb-auto" id="tool"
                                                                onclick="copyurl( '{{ $product_detail->product_img_8 }}' )"
                                                                data-toggle="tooltip" title="Copy URL">
                                                                <i class="icon-copy fa fa-copy" aria-hidden="true"></i>
                                                                <i class="icon-copy fa fa-check" style="display:none"
                                                                    aria-hidden="true"></i>
                                                            </p>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td class="col-3">
                                                    Product image 9
                                                </td>
                                                @if ($product_detail->product_img_9 == 'N/A')
                                                    <td class="col-9 pt-0 pb-0">
                                                        <img src="../../public/images/Image-Not-Available.png"
                                                            alt="" srcset="" width="50px" height="50px">
                                                    </td>
                                                @else
                                                    <td class="row">
                                                        <div class="col-2 text-center">
                                                            <img class="img-detail"
                                                                src="{{ $product_detail->product_img_9 }} "alt=""
                                                                srcset="">
                                                        </div>
                                                        <div class="col-9">
                                                            <p class=" font-10-url-img">
                                                                {{ $product_detail->product_img_9 }}</p>
                                                        </div>
                                                        <div class="col-1 d-flex">
                                                            <p class=" mt-auto mb-auto" id="tool"
                                                                onclick="copyurl( '{{ $product_detail->product_img_9 }}' )"
                                                                data-toggle="tooltip" title="Copy URL">
                                                                <i class="icon-copy fa fa-copy" aria-hidden="true"></i>
                                                                <i class="icon-copy fa fa-check" style="display:none"
                                                                    aria-hidden="true"></i>
                                                            </p>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq7">
                                    Package Shot Image
                                </button>
                            </div>
                            <div id="faq7" class="collapse" data-parent="#product_detail">
                                <div class="card-body p-0">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="col-3">
                                                    Package Front
                                                </td>
                                                @if ($product_detail->package_front == 'N/A')
                                                    <td class="col-9 pt-0 pb-0">
                                                        <img src="../../public/images/Image-Not-Available.png"
                                                            alt="" srcset="" width="50px" height="50px">
                                                    </td>
                                                @else
                                                    <td class="row">
                                                        <div class="col-2 text-center">
                                                            <img class="img-detail"
                                                                src="{{ $product_detail->package_front }} "alt=""
                                                                srcset="">
                                                        </div>
                                                        <div class="col-9">
                                                            <p class=" font-10-url-img">
                                                                {{ $product_detail->package_front }}</p>
                                                        </div>
                                                        <div class="col-1 d-flex">
                                                            <p class=" mt-auto mb-auto" id="tool"
                                                                onclick="copyurl( '{{ $product_detail->package_front }}' )"
                                                                data-toggle="tooltip" title="Copy URL">
                                                                <i class="icon-copy fa fa-copy" aria-hidden="true"></i>
                                                                <i class="icon-copy fa fa-check" style="display:none"
                                                                    aria-hidden="true"></i>
                                                            </p>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td class="col-3">
                                                    Package Back
                                                </td>
                                                @if ($product_detail->package_back == 'N/A')
                                                    <td class="col-9 pt-0 pb-0">
                                                        <img src="../../public/images/Image-Not-Available.png"
                                                            alt="" srcset="" width="50px" height="50px">
                                                    </td>
                                                @else
                                                    <td class="row">
                                                        <div class="col-2 text-center">
                                                            <img class="img-detail"
                                                                src="{{ $product_detail->package_back }} "alt=""
                                                                srcset="">
                                                        </div>
                                                        <div class="col-9">
                                                            <p class=" font-10-url-img">
                                                                {{ $product_detail->package_back }}</p>
                                                        </div>
                                                        <div class="col-1 d-flex">
                                                            <p class=" mt-auto mb-auto" id="tool"
                                                                onclick="copyurl( '{{ $product_detail->package_back }}' )"
                                                                data-toggle="tooltip" title="Copy URL">
                                                                <i class="icon-copy fa fa-copy" aria-hidden="true"></i>
                                                                <i class="icon-copy fa fa-check" style="display:none"
                                                                    aria-hidden="true"></i>
                                                            </p>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td class="col-3">
                                                    Package Top
                                                </td>
                                                @if ($product_detail->package_top == 'N/A')
                                                    <td class="col-9 pt-0 pb-0">
                                                        <img src="../../public/images/Image-Not-Available.png"
                                                            alt="" srcset="" width="50px" height="50px">
                                                    </td>
                                                @else
                                                    <td class="row">
                                                        <div class="col-2 text-center">
                                                            <img class="img-detail-package"
                                                                src="{{ $product_detail->package_top }} "alt=""
                                                                srcset="">
                                                        </div>
                                                        <div class="col-9">
                                                            <p class=" font-10-url-img">
                                                                {{ $product_detail->package_top }}</p>
                                                        </div>
                                                        <div class="col-1 d-flex">
                                                            <p class=" mt-auto mb-auto" id="tool"
                                                                onclick="copyurl( '{{ $product_detail->package_top }}' )"
                                                                data-toggle="tooltip" title="Copy URL">
                                                                <i class="icon-copy fa fa-copy" aria-hidden="true"></i>
                                                                <i class="icon-copy fa fa-check" style="display:none"
                                                                    aria-hidden="true"></i>
                                                            </p>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td class="col-3">
                                                    Package Bottom
                                                </td>
                                                @if ($product_detail->package_bottom == 'N/A')
                                                    <td class="col-9 pt-0 pb-0">
                                                        <img src="../../public/images/Image-Not-Available.png"
                                                            alt="" srcset="" width="50px" height="50px">
                                                    </td>
                                                @else
                                                    <td class="row">
                                                        <div class="col-2 text-center">
                                                            <img class="img-detail-package"
                                                                src="{{ $product_detail->package_bottom }} "alt=""
                                                                srcset="">
                                                        </div>
                                                        <div class="col-9">
                                                            <p class=" font-10-url-img">
                                                                {{ $product_detail->package_bottom }}</p>
                                                        </div>
                                                        <div class="col-1 d-flex">
                                                            <p class=" mt-auto mb-auto" id="tool"
                                                                onclick="copyurl( '{{ $product_detail->package_bottom }}' )"
                                                                data-toggle="tooltip" title="Copy URL">
                                                                <i class="icon-copy fa fa-copy" aria-hidden="true"></i>
                                                                <i class="icon-copy fa fa-check" style="display:none"
                                                                    aria-hidden="true"></i>
                                                            </p>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td class="col-3">
                                                    Package Left
                                                </td>
                                                @if ($product_detail->package_left == 'N/A')
                                                    <td class="col-9 pt-0 pb-0">
                                                        <img src="../../public/images/Image-Not-Available.png"
                                                            alt="" srcset="" width="50px" height="50px">
                                                    </td>
                                                @else
                                                    <td class="row">
                                                        <div class="col-2 text-center">
                                                            <img style=" width: 80px; height:60px; "
                                                                src="{{ $product_detail->package_left }} "alt=""
                                                                srcset="">
                                                        </div>
                                                        <div class="col-9">
                                                            <p class=" font-10-url-img">
                                                                {{ $product_detail->package_left }}</p>
                                                        </div>
                                                        <div class="col-1 d-flex">
                                                            <p class=" mt-auto mb-auto" id="tool"
                                                                onclick="copyurl( '{{ $product_detail->package_left }}' )"
                                                                data-toggle="tooltip" title="Copy URL">
                                                                <i class="icon-copy fa fa-copy" aria-hidden="true"></i>
                                                                <i class="icon-copy fa fa-check" style="display:none"
                                                                    aria-hidden="true"></i>
                                                            </p>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td class="col-3">
                                                    Package Right
                                                </td>
                                                @if ($product_detail->package_right == 'N/A')
                                                    <td class="col-9 pt-0 pb-0">
                                                        <img src="../../public/images/Image-Not-Available.png"
                                                            alt="" srcset="" width="50px" height="50px">
                                                    </td>
                                                @else
                                                    <td class="row">
                                                        <div class="col-2 text-center">
                                                            <img style=" width: 80px; height:60px; "
                                                                src="{{ $product_detail->package_right }} "alt=""
                                                                srcset="">
                                                        </div>
                                                        <div class="col-9">
                                                            <p class=" font-10-url-img">
                                                                {{ $product_detail->package_right }}</p>
                                                        </div>
                                                        <div class="col-1 d-flex">
                                                            <p class=" mt-auto mb-auto" id="tool"
                                                                onclick="copyurl( '{{ $product_detail->package_right }}' )"
                                                                data-toggle="tooltip" title="Copy URL">
                                                                <i class="icon-copy fa fa-copy" aria-hidden="true"></i>
                                                                <i class="icon-copy fa fa-check" style="display:none"
                                                                    aria-hidden="true"></i>
                                                            </p>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td class="col-3">
                                                    Package Shot 1
                                                </td>
                                                @if ($product_detail->package_shot_1 == 'N/A')
                                                    <td class="col-9 pt-0 pb-0">
                                                        <img src="../../public/images/Image-Not-Available.png"
                                                            alt="" srcset="" width="50px" height="50px">
                                                    </td>
                                                @else
                                                    <td class="row">
                                                        <div class="col-2 text-center">
                                                            <img style=" width: 80px; height:60px; "
                                                                src="{{ $product_detail->package_shot_1 }} "alt=""
                                                                srcset="">
                                                        </div>
                                                        <div class="col-9">
                                                            <p class=" font-10-url-img">
                                                                {{ $product_detail->package_shot_1 }}</p>
                                                        </div>
                                                        <div class="col-1 d-flex">
                                                            <p class=" mt-auto mb-auto" id="tool"
                                                                onclick="copyurl( '{{ $product_detail->package_shot_1 }}' )"
                                                                data-toggle="tooltip" title="Copy URL">
                                                                <i class="icon-copy fa fa-copy" aria-hidden="true"></i>
                                                                <i class="icon-copy fa fa-check" style="display:none"
                                                                    aria-hidden="true"></i>
                                                            </p>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td class="col-3">
                                                    Package Shot 2
                                                </td>
                                                @if ($product_detail->package_shot_2 == 'N/A')
                                                    <td class="col-9 pt-0 pb-0">
                                                        <img src="../../public/images/Image-Not-Available.png"
                                                            alt="" srcset="" width="50px" height="50px">
                                                    </td>
                                                @else
                                                    <td class="row">
                                                        <div class="col-2 text-center">
                                                            <img style=" width: 80px; height:60px; "
                                                                src="{{ $product_detail->package_shot_2 }} "alt=""
                                                                srcset="">
                                                        </div>
                                                        <div class="col-9">
                                                            <p class=" font-10-url-img">
                                                                {{ $product_detail->package_shot_2 }}</p>
                                                        </div>
                                                        <div class="col-1 d-flex">
                                                            <p class=" mt-auto mb-auto" id="tool"
                                                                onclick="copyurl( '{{ $product_detail->package_shot_2 }}' )"
                                                                data-toggle="tooltip" title="Copy URL">
                                                                <i class="icon-copy fa fa-copy" aria-hidden="true"></i>
                                                                <i class="icon-copy fa fa-check" style="display:none"
                                                                    aria-hidden="true"></i>
                                                            </p>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td class="col-3">
                                                    Package Shot 3
                                                </td>
                                                @if ($product_detail->package_shot_3 == 'N/A')
                                                    <td class="col-9 pt-0 pb-0">
                                                        <img src="../../public/images/Image-Not-Available.png"
                                                            alt="" srcset="" width="50px" height="50px">
                                                    </td>
                                                @else
                                                    <td class="row">
                                                        <div class="col-2 text-center">
                                                            <img style=" width: 80px; height:60px; "
                                                                src="{{ $product_detail->package_shot_3 }} "alt=""
                                                                srcset="">
                                                        </div>
                                                        <div class="col-9">
                                                            <p class=" font-10-url-img">
                                                                {{ $product_detail->package_shot_3 }}</p>
                                                        </div>
                                                        <div class="col-1 d-flex">
                                                            <p class=" mt-auto mb-auto" id="tool"
                                                                onclick="copyurl( '{{ $product_detail->package_shot_3 }}' )"
                                                                data-toggle="tooltip" title="Copy URL">
                                                                <i class="icon-copy fa fa-copy" aria-hidden="true"></i>
                                                                <i class="icon-copy fa fa-check" style="display:none"
                                                                    aria-hidden="true"></i>
                                                            </p>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                            <tr>
                                                <td class="col-3">
                                                    Package Shot 4
                                                </td>
                                                @if ($product_detail->package_shot_4 == 'N/A')
                                                    <td class="col-9 pt-0 pb-0">
                                                        <img src="../../public/images/Image-Not-Available.png"
                                                            alt="" srcset="" width="50px" height="50px">
                                                    </td>
                                                @else
                                                    <td class="row">
                                                        <div class="col-2 text-center">
                                                            <img class="img-detail-package"
                                                                src="{{ $product_detail->package_shot_4 }} "alt=""
                                                                srcset="">
                                                        </div>
                                                        <div class="col-9">
                                                            <p class=" font-10-url-img">
                                                                {{ $product_detail->package_shot_4 }}</p>
                                                        </div>
                                                        <div class="col-1 d-flex">
                                                            <p class=" mt-auto mb-auto" id="tool"
                                                                onclick="copyurl( '{{ $product_detail->package_shot_4 }}' )"
                                                                data-toggle="tooltip" title="Copy URL">
                                                                <i class="icon-copy fa fa-copy" aria-hidden="true"></i>
                                                                <i class="icon-copy fa fa-check" style="display:none"
                                                                    aria-hidden="true"></i>
                                                            </p>
                                                        </div>
                                                    </td>
                                                @endif
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq8">
                                    Bullet
                                </button>
                            </div>
                            <div id="faq8" class="collapse" data-parent="#product_detail">
                                <div class="card-body p-0">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <td class="col-3">
                                                    Bullet Point 1
                                                </td>
                                                <td class="col-9">
                                                    {{ $product_detail->bullet_point_1 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Bullet Point 2
                                                </td>
                                                <td class="col-sm-6">
                                                    {{ $product_detail->bullet_point_2 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Bullet Point 3
                                                </td>
                                                <td>
                                                    {{ $product_detail->bullet_point_3 }}
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    Bullet Point 4
                                                </td>
                                                <td>
                                                    {{ $product_detail->bullet_point_4 }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq9">
                                    Master
                                </button>
                            </div>
                            <div id="faq9" class="collapse" data-parent="#product_detail">
                                <div class="card-body p-0">
                                    @foreach($product_master as $value)
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="col-3">
                                                        Master Code
                                                    </td>
                                                    <td>
                                                        {{ $value->master_code }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Master Width (cm)
                                                    </td>
                                                    <td>
                                                        {{ floatval($value->master_width_cm) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Master Deep (cm)
                                                    </td>
                                                    <td>
                                                        {{ floatval($value->master_deep_cm) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Master Height (cm)
                                                    </td>
                                                    <td>
                                                        {{ floatval($value->master_height_cm) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Master Width (Inch)
                                                    </td>
                                                    <td>
                                                        {{ floatval($value->master_width_inch) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Master Deep (Inch)
                                                    </td>
                                                    <td>
                                                        {{ floatval($value->master_deep_inch) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Master Height (Inch)
                                                    </td>
                                                    <td>
                                                        {{ floatval($value->master_height_inch) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Master Weight (kg)
                                                    </td>
                                                    <td>
                                                        {{ floatval($value->master_weight_kg) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Master Weight (lbs)
                                                    </td>
                                                    <td>
                                                        {{ floatval($value->master_weight_lbs) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Master Box Type
                                                    </td>
                                                    <td>
                                                        {{ $value->master_box_type }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Per Set
                                                    </td>
                                                    <td>
                                                        {{ $value->per_set }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Per Piece
                                                    </td>
                                                    <td>
                                                        {{ $value->per_piece }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Per NW (kg)
                                                    </td>
                                                    <td>
                                                        {{ floatval($value->per_nw_kg) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Per GW (kg)
                                                    </td>
                                                    <td>
                                                        {{ floatval($value->per_gw_kg) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Per NW (lbs)
                                                    </td>
                                                    <td>
                                                        {{ floatval($value->per_nw_lbs) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Per GW (lbs)
                                                    </td>
                                                    <td>
                                                        {{ floatval($value->per_gw_lbs) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Per CUFT
                                                    </td>
                                                    <td>
                                                        {{ $value->per_cuft }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Per CTNS
                                                    </td>
                                                    <td>
                                                        {{ $value->per_ctns }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <br><br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq10">
                                    Retail
                                </button>
                            </div>
                            <div id="faq10" class="collapse" data-parent="#product_detail">
                                <div class="card-body p-0">
                                    @foreach($product_retail as $value)
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="col-3">
                                                        Retail Code
                                                    </td>
                                                    <td class="col-9">
                                                        {{ $value->retail_code }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Retail Width (cm)
                                                    </td>
                                                    <td>
                                                        {{ floatval($value->retail_width_cm) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Retail Deep (cm)
                                                    </td>
                                                    <td>
                                                        {{ floatval($value->retail_deep_cm) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Retail Height (cm)
                                                    </td>
                                                    <td>
                                                        {{ floatval($value->retail_height_cm) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Retail Width (Inch)
                                                    </td>
                                                    <td>
                                                        {{ floatval($value->retail_width_inch) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Retail Deep (Inch)
                                                    </td>
                                                    <td>
                                                        {{ floatval($value->retail_deep_inch) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Retail Height (Inch)
                                                    </td>
                                                    <td>
                                                        {{ floatval($value->retail_height_inch) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Retail Weight (kg)
                                                    </td>
                                                    <td>
                                                        {{ floatval($value->retail_weight_kg) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Retail Weight (lbs)
                                                    </td>
                                                    <td>
                                                        {{ floatval($value->retail_weight_lbs) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Retail Box Type
                                                    </td>
                                                    <td>
                                                        {{ $value->retail_box_type }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Retail Pack Box
                                                    </td>
                                                    <td>
                                                        {{ $value->retail_pack_box }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Product Retail W (lbs)
                                                    </td>
                                                    <td>
                                                        {{ floatval($value->product_retail_w_lbs) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Product Retail W (kg)
                                                    </td>
                                                    <td>
                                                        {{ floatval($value->product_retail_w_kg) }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <br><br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq11">
                                    Inner
                                </button>
                            </div>
                            <div id="faq11" class="collapse" data-parent="#product_detail">
                                <div class="card-body p-0">
                                    @foreach($product_inner as $value)
                                        <table class="table">
                                            <tbody>
                                                <tr>
                                                    <td class="col-3">
                                                        Inner Code
                                                    </td>
                                                    <td class="col-9">
                                                        {{ $value->inner_code }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Inner Width (cm)
                                                    </td>
                                                    <td>
                                                        {{ floatval($value->inner_width_cm) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Inner Deep (cm)
                                                    </td>
                                                    <td>
                                                        {{ floatval($value->inner_deep_cm) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Inner Height (cm)
                                                    </td>
                                                    <td>
                                                        {{ floatval($value->inner_height_cm) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Inner Width (Inch)
                                                    </td>
                                                    <td>
                                                        {{ floatval($value->inner_width_inch) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Inner Deep (Inch)
                                                    </td>
                                                    <td>
                                                        {{ floatval($value->inner_deep_inch) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Inner Height (Inch)
                                                    </td>
                                                    <td>
                                                        {{ floatval($value->inner_height_inch) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Inner Weight (kg)
                                                    </td>
                                                    <td>
                                                        {{ floatval($value->inner_weight_kg) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Inner Weight (lbs)
                                                    </td>
                                                    <td>
                                                        {{ floatval($value->inner_weight_lbs) }}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>
                                                        Inner Box Type
                                                    </td>
                                                    <td>
                                                        @if ($value->inner_box_type == '')
                                                            N/A
                                                        @else
                                                            {{ $value->inner_box_type }}
                                                        @endif
                                                    </td>

                                                </tr>
                                                <tr>
                                                    <td>
                                                        Inner Pack Box
                                                    </td>
                                                    <td>
                                                        {{ floatval($value->inner_pack_box) }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                        <br><br>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        @endsection

        @section('footer_script')
            <script type="text/javascript">
                function copyurl(url) {
                    navigator.clipboard.writeText(url);
                    let elcopy = document.querySelectorAll('#tool');
                    let urlInnerhtml = document.getElementsByClassName('font-10-url-img');
                    // let classcopy = elcopy.getElementsByClassName('icon-copy');
                    for (let i = 0; i < urlInnerhtml.length; i++) {
                        if (urlInnerhtml[i].innerText == url) {
                            elcopy[i].getElementsByClassName('icon-copy')[0].style.display = "none";
                            elcopy[i].getElementsByClassName('icon-copy')[1].style.display = "block";
                        }
                    }
                }
                $(document).ready(function() {

                });
            </script>
        @endsection

        {{-- 
<div class="col-sm-12">
	<h4 class="mb-20 h4">Product Detail</h4>
	<div class="faq-wrap">
		<div id="product_detail">
			<div class="card">
				<div class="card-header">
					<button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq1">
						Product
					</button>
				</div>
				<div id="faq1" class="collapse" data-parent="#product_detail">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-6">
								SKU_CODE :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->sku_code }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								SKU_7DIGIT :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->sku_7digit }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								SKU_NAME :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->sku_name }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								PRODUCT_YEAR :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->product_year }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								CATEGORY :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->category }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								CATALOG_STATUS :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->catalog_status }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								AGE :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->age }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								EAN_BARCODE :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->ean_barcode }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								FLAG_DIA :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->flag_dia }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								PRODUCT_WIDTH_INCH :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->product_width_inch }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								PRODUCT_LENGTH_INCH :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->product_length_inch }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								PRODUCT_HEIGHT_INCH :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->product_height_inch }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								PROCUCT_WEIGHT_LBS :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->product_weight_lbs }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								SIZE_BIGGEST :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->size_biggest }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								PRODUCT_WIDTH_CM :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->product_width_cm }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								PRODUCT_LENGTH_CM :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->product_length_cm }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								PRODUCT_HEIGHT_CM :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->product_height_cm }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								PROCUCT_WEIGHT_KG :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->product_weight_kg }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								SKU_DESCRIPTION :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->sku_description }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								CARE_INSTRUCTION :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->care_instruction }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								ASSEMBLY_INSTRUCTION :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->assembly_instruction }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								CAUTION_SHEET :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->caution_sheet }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								HOW_TO_PLAY :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->how_to_play }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								PIECES_COUNT :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->pieces_count }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								COMPOSITIONS :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->compositions }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								LIST_OF_ACCESSORIES :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->list_of_accessories }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								DIMENSION_CM :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->dimension_cm }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								DIMENSION_INCH :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->dimension_inch }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								COLORS :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->colors }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								LONG_DESCRIPTION :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->long_description }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								PLASTIC_TYPE :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->plastic_type }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								PLASTIC_LOCATION :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->plastic_location }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								NRF_COLOR_NUMBER :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->nrf_color_number }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								NRF_COLOR_NAME :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->nrf_color_name }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								MAX_CHILD_HEIGHT_CM :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->max_child_height_cm }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								MAX_CHILD_WEIGHT_KG :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->max_child_weight_kg }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								PLANWOOD :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->planwood }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								CARBON_FOOTPRINT_KG :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->carbon_footprint_kg }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								CARBON_FOOTPRINT_LBS :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->carbon_footprint_lbs }}
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					<button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq2">
						Award
					</button>
				</div>
				<div id="faq2" class="collapse" data-parent="#product_detail">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-6">
								AWARD_1 :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->award_1 }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								AWARD_2 :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->award_2 }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								AWARD_3 :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->award_3 }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								AWARD_4 :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->award_4 }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								AWARD_5 :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->award_5 }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								AWARD_6 :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->award_6 }}
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					<button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq3">
						Child Development
					</button>
				</div>
				<div id="faq3" class="collapse" data-parent="#product_detail">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-6">
								CHILD_DEV_1 :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->child_dev_1 }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								CHILD_DEV_2 :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->child_dev_2 }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								CHILD_DEV_3 :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->child_dev_3 }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								CHILD_DEV_4 :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->child_dev_4 }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								CHILD_DEV_5 :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->child_dev_5 }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								CHILD_DEV_6 :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->child_dev_6 }}
							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					<button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq4">
						Warning Statements
					</button>
				</div>
				<div id="faq4" class="collapse" data-parent="#product_detail">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-6">
								PROP65 :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->prop65 }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								CHOKING_HAZARD :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->choking_hazard }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								WARNING_LABEL :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->warning_label }}
							</div>
						</div>								
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					<button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq5">
						Lifestyle Image
					</button>
				</div>
				<div id="faq5" class="collapse" data-parent="#product_detail">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-6">
								LIFESTYLE_IMG_1 :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->lifestyle_img_1 }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								LIFESTYLE_IMG_2 :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->lifestyle_img_2 }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								LIFESTYLE_IMG_3 :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->lifestyle_img_3 }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								LIFESTYLE_IMG_4 :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->lifestyle_img_4 }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								LIFESTYLE_IMG_5 :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->lifestyle_img_5 }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								LIFESTYLE_IMG_6 :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->lifestyle_img_6 }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								LIFESTYLE_IMG_7 :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->lifestyle_img_7 }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								LIFESTYLE_IMG_8 :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->lifestyle_img_8 }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								LIFESTYLE_IMG_9 :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->lifestyle_img_9 }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								LIFESTYLE_IMG_10 :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->lifestyle_img_10 }}
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					<button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq6">
						Product Image
					</button>
				</div>
				<div id="faq6" class="collapse" data-parent="#product_detail">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-6">
								MAIN_IMAGE :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->main_image }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								PRODUCT_IMG_1 :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->product_img_1 }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								PRODUCT_IMG_2 :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->product_img_2 }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								PRODUCT_IMG_3 :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->product_img_3 }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								PRODUCT_IMG_4 :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->product_img_4 }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								PRODUCT_IMG_5 :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->product_img_5 }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								PRODUCT_IMG_6 :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->product_img_6 }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								PRODUCT_IMG_7 :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->product_img_7 }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								PRODUCT_IMG_8 :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->product_img_8 }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								PRODUCT_IMG_9 :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->product_img_9 }}
							</div>
						</div>

					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					<button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq7">
						Package Shot Image
					</button>
				</div>
				<div id="faq7" class="collapse" data-parent="#product_detail">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-6">
								PACKAGE_FRONT
							</div>
							<div class="col-sm6">
								{{ $product_detail->package_front }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								PACKAGE_BACK
							</div>
							<div class="col-sm6">
								{{ $product_detail->package_back }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								PACKAGE_TOP
							</div>
							<div class="col-sm6">
								{{ $product_detail->package_top }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								PACKAGE_BOTTOM
							</div>
							<div class="col-sm6">
								{{ $product_detail->package_bottom }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								PACKAGE_LEFT
							</div>
							<div class="col-sm6">
								{{ $product_detail->package_left }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								PACKAGE_RIGHT
							</div>
							<div class="col-sm6">
								{{ $product_detail->package_right }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								PACKAGE_SHOT_1
							</div>
							<div class="col-sm6">
								{{ $product_detail->package_shot_1 }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								PACKAGE_SHOT_2
							</div>
							<div class="col-sm6">
								{{ $product_detail->package_shot_2 }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								PACKAGE_SHOT_3
							</div>
							<div class="col-sm6">
								{{ $product_detail->package_shot_3 }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								PACKAGE_SHOT_4
							</div>
							<div class="col-sm6">
								{{ $product_detail->package_shot_4 }}
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					<button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq8">
						Bullet
					</button>
				</div>
				<div id="faq8" class="collapse" data-parent="#product_detail">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-6">
								BULLET_POINT_1 :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->bullet_point_1 }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								BULLET_POINT_2 :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->bullet_point_2 }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								BULLET_POINT_3 :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->bullet_point_3 }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								BULLET_POINT_4 :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->bullet_point_4 }}
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					<button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq9">
						Master
					</button>
				</div>
				<div id="faq9" class="collapse" data-parent="#product_detail">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-6">
								MASTER_CODE :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->master_code }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								MASTER_WIDTH_CM :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->master_width_cm }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								MASTER_DEEP_CM :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->master_deep_cm }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								MASTER_HEIGHT_CM :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->master_height_cm }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								MASTER_WIDTH_INCH :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->master_width_inch }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								MASTER_DEEP_INCH :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->master_deep_inch }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								MASTER_HEIGHT_INCH :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->master_height_inch }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								MASTER_WEIGHT_KG :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->master_weight_kg }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								MASTER_WEIGHT_LBS :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->master_weight_lbs }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								MASTER_BOX_TYPE :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->master_box_type }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								PER_SET :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->per_set }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								PER_PIECE :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->per_piece }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								PER_NW_KG :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->per_nw_kg }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								PER_GW_KG :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->per_gw_kg }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								PER_NW_LBS :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->per_nw_lbs }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								PER_GW_LBS :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->per_gw_lbs }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								PER_CUFT :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->per_cuft }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								PER_CTNS :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->per_ctns }}
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					<button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq10">
						Retail
					</button>
				</div>
				<div id="faq10" class="collapse" data-parent="#product_detail">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-6">
								RETAIL_CODE :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->retail_code }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								RETAIL_WIDTH_CM :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->retail_width_cm }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								RETAIL_DEEP_CM :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->retail_deep_cm }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								RETAIL_HEIGHT_CM :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->retail_height_cm }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								RETAIL_WIDTH_INCH :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->retail_width_inch }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								RETAIL_DEEP_INCH :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->retail_deep_inch }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								RETAIL_HEIGHT_INCH :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->retail_height_inch }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								RETAIL_WEIGHT_KG :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->retail_weight_kg }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								RETAIL_WEIGHT_LBS :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->retail_weight_lbs }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								RETAIL_BOX_TYPE :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->retail_box_type }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								RETAIL_PACK_BOX :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->retail_pack_box }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								PRODUCT_RETAIL_W_LBS :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->product_retail_w_lbs }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								PRODUCT_RETAIL_W_KG :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->product_retail_w_kg }}
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="card">
				<div class="card-header">
					<button class="btn btn-block collapsed" data-toggle="collapse" data-target="#faq11">
						Inner
					</button>
				</div>
				<div id="faq11" class="collapse" data-parent="#product_detail">
					<div class="card-body">
						<div class="row">
							<div class="col-sm-6">
								INNER_CODE :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->inner_code }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								INNER_WIDTH_CM :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->inner_width_cm }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								INNER_DEEP_CM :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->inner_deep_cm }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								INNER_HEIGHT_CM :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->inner_height_cm }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								INNER_WIDTH_INCH :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->inner_width_inch }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								INNER_DEEP_INCH :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->inner_deep_inch }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								INNER_HEIGHT_INCH :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->inner_height_inch }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								INNER_WEIGHT_KG :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->inner_weight_kg }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								INNER_WEIGHT_LBS :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->inner_weight_lbs }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								INNER_BOX_TYPE :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->inner_box_type }}
							</div>
						</div>
						<div class="row">
							<div class="col-sm-6">
								INNER_PACK_BOX :
							</div>
							<div class="col-sm-6">
								{{ $product_detail->inner_pack_box }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div> --}}
