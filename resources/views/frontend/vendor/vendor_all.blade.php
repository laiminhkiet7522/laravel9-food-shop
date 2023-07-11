@extends('frontend.master_dashboard')
@section('main')
@section('title')
    Vendors List
@endsection
<div class="page-header breadcrumb-wrap">
    <div class="container">
        <div class="breadcrumb">
            <a href="{{ url('/') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>HOME</a>
            <span></span> Vendors List
        </div>
    </div>
</div>
<div class="page-content pt-50">
    <div class="container">
        <div class="archive-header-2 text-center">
            <h1 class="display-2 mb-50">Vendors List</h1>
            <div class="row">
                <div class="col-lg-5 mx-auto">
                    <div class="sidebar-widget-2 widget_search mb-50">
                        <div class="search-form">
                            <form action="#">
                                <input type="text" placeholder="Search vendors (by name or ID)..." />
                                <button type="submit"><i class="fi-rs-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mb-50">
            <div class="col-12 col-lg-8 mx-auto">
                <div class="shop-product-fillter">
                    <div class="totall-product">
                        <p>We have <strong class="text-brand">{{ count($count_vendors) > 0 ? count($count_vendors) : 0 }}</strong> vendors now</p>
                    </div>
                    <div class="sort-by-product-area">
                        <div class="sort-by-cover mr-10">
                            <div class="sort-by-product-wrap">
                                <div class="sort-by">
                                    <span><i class="fi-rs-apps"></i>Show:</span>
                                </div>
                                <div class="sort-by-dropdown-wrap">
                                    <span> 50 <i class="fi-rs-angle-small-down"></i></span>
                                </div>
                            </div>
                            <div class="sort-by-dropdown">
                                <ul>
                                    <li><a class="active" href="#">50</a></li>
                                    <li><a href="#">100</a></li>
                                    <li><a href="#">150</a></li>
                                    <li><a href="#">200</a></li>
                                    <li><a href="#">All</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="sort-by-cover">
                            <div class="sort-by-product-wrap">
                                <div class="sort-by">
                                    <span><i class="fi-rs-apps-sort"></i>Sort by:</span>
                                </div>
                                <div class="sort-by-dropdown-wrap">
                                    <span> Featured <i class="fi-rs-angle-small-down"></i></span>
                                </div>
                            </div>
                            <div class="sort-by-dropdown">
                                <ul>
                                    <li><a class="active" href="#">Mall</a></li>
                                    <li><a href="#">Featured</a></li>
                                    <li><a href="#">Preferred</a></li>
                                    <li><a href="#">Total items</a></li>
                                    <li><a href="#">Avg. Rating</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row vendor-grid">
            @foreach ($vendors as $vendor)
                <div class="col-lg-3 col-md-6 col-12 col-sm-6">
                    <div class="vendor-wrap mb-40" style="height: 450px;">
                        <div class="vendor-img-action-wrap">
                            <div class="vendor-img">
                                <a href="{{ route('vendor.details', $vendor->id) }}">
                                    <img class="default-img"
                                        src="{{ !empty($vendor->photo) ? url('upload/vendor_images/' . $vendor->photo) : url('upload/no_image.jpg') }}"
                                        style="width:120px;height: 120px;" alt="" />
                                </a>
                            </div>
                            <div class="product-badges product-badges-position product-badges-mrg">
                                <span class="hot">Mall</span>
                            </div>
                        </div>
                        <div class="vendor-content-wrap">
                            <div class="d-flex justify-content-between align-items-end mb-30">
                                <div>
                                    <div class="product-category">
                                        <span class="text-muted">Since {{ $vendor->vendor_join }}</span>
                                    </div>
                                    <h4 class="mb-5"><a
                                            href="{{ route('vendor.details', $vendor->id) }}">{{ $vendor->shop_name }}</a>
                                    </h4>
                                </div>

                                @php
                                    $products = App\Models\Product::where('vendor_id', $vendor->id)->get();
                                @endphp
                                <div class="mb-10">
                                    <span class="font-small total-product">{{ count($products) }} products</span>
                                </div>
                            </div>
                            <div class="vendor-info mb-30">
                                <ul class="contact-infor text-muted" style="overflow: hidden;
                                line-height: 1.3em;
                                text-overflow: ellipsis;
                                white-space: initial;
                                display: -webkit-box;
                                -webkit-line-clamp: 3;
                                -webkit-box-orient: vertical;
                                min-height: 100px;
                                height: 30px;
                                box-sizing: border-box;">
                                    <li><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-location.svg') }}"
                                            alt="" /><strong>Address: </strong>
                                        <span>{{ $vendor->address }}</span>
                                    </li>
                                    <li><img src="{{ asset('frontend/assets/imgs/theme/icons/icon-contact.svg') }}"
                                            alt="" /><strong>Call Us:
                                        </strong><span>{{ $vendor->phone }}</span>
                                    </li>
                                </ul>
                            </div>
                            <a href="{{ route('vendor.details', $vendor->id) }}" class="btn btn-xs">Visit Store <i
                                    class="fi-rs-arrow-small-right"></i></a>
                        </div>
                    </div>
                </div>
                <!--end vendor card-->
            @endforeach

        </div>
        <div class="pagination-area mt-20 mb-20">
            {{ $vendors->links('vendor.pagination.custom') }}
        </div>
    </div>
</div>
@endsection
