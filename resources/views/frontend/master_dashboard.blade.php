<!DOCTYPE html>
<html class="no-js" lang="en">
@php
    $seo = \App\Models\Seo::find(1);
@endphp

<head>
    <meta charset="utf-8" />
    <title>@yield('title')</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />

    <meta name="title" content="{{ $seo->meta_title }}" />
    <meta name="author" content="{{ $seo->meta_author }}" />
    <meta name="keyword" content="{{ $seo->meta_keyword }}" />
    <meta name="description" content="{{ $seo->meta_description }}" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('frontend/assets/imgs/theme/logo.png') }}" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/plugins/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/main.css?v=5.3') }}" />
    <!-- Toaster -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" type="text/css"
        media="all" />

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.4/moment.min.js"></script>

    <script src="https://js.stripe.com/v3/"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/6.4.2/tinymce.min.js"></script>

</head>

<body>
    <!-- Modal -->

    <!-- Quick view -->
    @include('frontend.body.quickview')
    <!-- Header  -->
    @include('frontend.body.header')
    <!-- End Header  -->

    <main class="main">
        @yield('main')
    </main>


    <!-- Footer -->
    @include('frontend.body.footer')
    <!-- End Footer -->
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="{{ asset('frontend/assets/imgs/theme/loading.gif') }}" alt="" />
                </div>
            </div>
        </div>
    </div>


    <!-- Bootstrap JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
    <!-- Vendor JS-->
    <script src="{{ asset('frontend/assets/js/vendor/modernizr-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/slick.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/slider-range.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.vticker-min.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.theia.sticky.js') }}"></script>
    <script src="{{ asset('frontend/assets/js/plugins/jquery.elevatezoom.js') }}"></script>
    <!-- Template  JS -->
    <script src="{{ asset('frontend/assets/js/main.js?v=5.3') }}"></script>
    <script src="{{ asset('frontend/assets/js/shop.js?v=5.3') }}"></script>

    <script src="{{ asset('frontend/assets/js/validate.min.js') }}"></script>

    <script src="{{ asset('frontend/assets/js/script.js') }}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" type="text/javascript"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/11.7.12/sweetalert2.all.min.js"></script>

    <script>
        @if (Session::has('order_success'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Xin cảm ơn!',
                text: 'Bạn đã đặt hàng và thanh toán thành công. Chúng tôi sẽ sắp xếp giao hàng trong thời gian sớm nhất. Cảm ơn bạn đã tin tưởng và mua sắm cùng chúng tôi!',
                timerProgressBar: true,
                showConfirmButton: true,
                timer: 10000,
                confirmButtonText: "OK",
                confirmButtonColor: '#3BB77E',
            })
        @endif
    </script>

    <script>
        @if (Session::has('order_cancel'))
            Swal.fire({
                position: 'center',
                icon: 'error',
                title: 'Thật đáng tiếc!',
                text: 'Bạn đã hủy thanh toán online cho đơn hàng này!',
                timerProgressBar: true,
                showConfirmButton: true,
                timer: 10000,
                confirmButtonText: "OK",
                confirmButtonColor: '#FF0000',
            })
        @endif
    </script>

    <script>
        @if (Session::has('cash_order_success'))
            Swal.fire({
                position: 'center',
                icon: 'success',
                title: 'Xin cảm ơn!',
                text: 'Bạn đã đặt hàng thành công. Vui lòng thanh toán bằng tiền mặt khi nhận hàng. Cảm ơn bạn đã tin tưởng và mua sắm cùng chúng tôi!',
                timerProgressBar: true,
                showConfirmButton: true,
                timer: 10000,
                confirmButtonText: "OK",
                confirmButtonColor: '#3BB77E',
            })
        @endif
    </script>


    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <script>
        @if (Session::has('message'))
            toastr.options = {
                'progressBar': true,
                'closeButton': true,
                'timeOut': 3000,
                'extendedTimeOut': 3000,
            }
            var type = "{{ Session::get('alert-type', 'info') }}"
            switch (type) {
                case 'info':
                    toastr.info(" {{ Session::get('message') }} ", "Noitce");
                    break;

                case 'success':
                    toastr.success(" {{ Session::get('message') }} ", "Success");
                    break;

                case 'warning':
                    toastr.warning(" {{ Session::get('message') }} ", "Warning");
                    break;

                case 'error':
                    toastr.error(" {{ Session::get('message') }} ", "Error");
                    break;
            }
        @endif
    </script>

    <script>
        tinymce.init({
            selector: '#mytextarea',
            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
        });
    </script>

    <script type="text/javascript">
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // Start Product View With Modal
        function productView(id) {
            // alert(id)
            $.ajax({
                type: 'GET',
                url: '/product/view/modal/' + id,
                dataType: 'json',
                success: function(data) {
                    // console.log(data)

                    $('#pname').text(data.product.product_name);
                    $('#pprice').text(data.product.selling_price);
                    $('#pcode').text(data.product.product_code);
                    $('#pcategory').text(data.product.category.category_name);
                    $('#psubcategory').text(data.product.subcategory.subcategory_name);
                    $('#pbrand').text(data.product.brand.brand_name);
                    $('#pmfg').text("TRÊN BAO BÌ");
                    $('#pimage').attr('src', '/' + data.product.product_thumbnail);

                    $('#brand_id').val(data.product.brand_id);

                    $('#product_id').val(id);
                    $('#qty').val(1);

                    var formattedSellingPrice = parseInt(data.product.selling_price).toLocaleString('vi-VN');
                    var formattedDiscountPrice = parseInt(data.product.discount_price).toLocaleString('vi-VN');

                    // Product Price
                    if (data.product.discount_price == null) {
                        $('#pprice').text('');
                        $('#oldprice').text('');
                        $('#pprice').text(formattedSellingPrice + 'đ');

                    } else {
                        $('#pprice').text(formattedDiscountPrice + 'đ');
                        $('#oldprice').text(formattedSellingPrice + 'đ');
                    }

                    //Start Stock Option
                    if (data.product.product_quantity > 0) {
                        $('#instock').text('');
                        $('#outofstock').text('');
                        $('#instock').text('Còn hàng');
                    } else {
                        $('#instock').text('');
                        $('#outofstock').text('');
                        $('#outofstock').text('Hết hàng');
                    }
                    //End Stock Option
                }
            });
        }
        // End Product View With Modal

        // Start Add To Cart Quick View
        function addToCart() {
            var product_name = $('#pname').text();
            var id = $('#product_id').val();
            var brand_id = $('#brand_id').val();
            var quantity = $('#qty').val();

            $.ajax({
                type: "POST",
                dataType: 'json',
                data: {
                    quantity: quantity,
                    product_name: product_name,
                    brand_id: brand_id,
                },
                url: "/cart/data/store/" + id,
                success: function(data) {
                    if (data.error_quantity) {
                        $('#closeModal').click();
                        // Start Message
                        const Toast = Swal.mixin({
                            position: 'center',
                            title: 'Sorry!',
                            timerProgressBar: true,
                            showConfirmButton: true,
                            timer: 2000,
                            confirmButtonText: "OK",
                            confirmButtonColor: '#3BB77E',
                        })
                        Toast.fire({
                            icon: 'error',
                            text: data.error_quantity,
                        })
                        // End Message
                    } else {
                        miniCart();
                        $('#closeModal').click();
                        // Start Message
                        const Toast = Swal.mixin({
                            position: 'top-end',
                            toast: true,
                            showConfirmButton: false,
                            timer: 2000,
                        })
                        if ($.isEmptyObject(data.error)) {
                            Toast.fire({
                                icon: 'success',
                                title: data.success,
                            })
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: data.error,
                            })
                        }
                        // End Message
                    }
                }
            })
        }
        // End Add To Cart Quick View

        // Start Details Page Add To Cart
        function addToCartDetails() {
            var product_name = $('#dpname').text();
            var id = $('#dproduct_id').val();
            var brand_id = $('#pbrand_id').val();
            var quantity = $('#dqty').val();
            $.ajax({
                type: 'POST',
                dataType: 'json',
                data: {
                    quantity: quantity,
                    product_name: product_name,
                    brand_id: brand_id,
                },
                url: "/dcart/data/store/" + id,
                success: function(data) {
                    if (data.error_quantity) {
                        // Start Message
                        const Toast = Swal.mixin({
                            position: 'center',
                            title: 'Sorry!',
                            timerProgressBar: true,
                            showConfirmButton: true,
                            timer: 2000,
                            confirmButtonText: "OK",
                            confirmButtonColor: '#3BB77E',
                        })
                        Toast.fire({
                            icon: 'error',
                            text: data.error_quantity,
                        })
                        // End Message
                    } else {
                        miniCart();
                        // Start Message
                        const Toast = Swal.mixin({
                            position: 'top-end',
                            toast: true,
                            showConfirmButton: false,
                            timer: 2000,
                        })
                        if ($.isEmptyObject(data.error)) {
                            Toast.fire({
                                icon: 'success',
                                title: data.success,
                            })
                        } else {
                            Toast.fire({
                                icon: 'error',
                                title: data.error,
                            })
                        }
                        // End Message
                    }
                }
            })
        }
        // End Details Page Add To Cart
    </script>

    <script type="text/javascript">
        //Start Mini Cart
        function miniCart() {
            $.ajax({
                type: 'GET',
                url: '/product/mini/cart',
                dataType: 'json',
                success: function(response) {
                    var formattedTotal = parseInt(response.cartTotal).toLocaleString('vi-VN');

                    $('#cartQty').text(response.cartQty);
                    $('span[id="cartSubTotal"]').text(formattedTotal + 'đ');

                    var miniCart = "";
                    $.each(response.carts, function(key, value) {
                        var formattedPrice = parseInt(value.price).toLocaleString('vi-VN');
                        miniCart += ` <ul>
                                    <li>
                                        <div class="shopping-cart-img">
                                            <a href="shop-product-right.html"><img alt="Bảo Linh" src="/${value.options.image}" style="width: 60px;height: 60px;" /></a>
                                        </div>
                                        <div class="shopping-cart-title" style="margin: -73px 74px 14px; width" 146px;>
                                            <h4><a href="shop-product-right.html"> ${value.name} </a></h4>
                                            <h4><span>${value.qty} × </span>${formattedPrice}đ</h4>
                                        </div>
                                        <div class="shopping-cart-delete" style="margin: -85px 1px 0px;">
                                            <a type="submit" id="${value.rowId}" onclick="miniCartRemove(this.id)"><i class="fi-rs-cross-small"></i></a>
                                        </div>
                                    </li>
                                    </ul>
                                    <hr><br>
                                        `
                    });

                    $('#miniCart').html(miniCart);
                }
            })
        }
        miniCart();
        //End Mini Cart

        //Start Mini Cart Remove
        function miniCartRemove(rowId) {
            $.ajax({
                type: 'GET',
                url: '/minicart/product/remove/' + rowId,
                dataType: 'json',
                success: function(data) {
                    cart();
                    miniCart();
                    couponCalculation();
                    // Start Message
                    const Toast = Swal.mixin({
                        position: 'top-end',
                        toast: true,
                        showConfirmButton: false,
                        timer: 2000,
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            icon: 'success',
                            title: data.success,
                        })
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: data.error,
                        })
                    }
                    // End Message
                }
            })
        }
        //End Mini Cart Remove
    </script>

    <!--  /// Start Load Wishlist Data -->
    <script type="text/javascript">
        function wishlist() {
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/get-wishlist-product",
                success: function(response) {
                    $('#wishlistQty').text(response.wishlistQuantity);
                    $('#countproductwishlist').text(response.wishlistQuantity);
                    var rows = "";
                    $.each(response.wishlist, function(key, value) {
                        var formattedSellingPrice = parseInt(value.product.selling_price)
                            .toLocaleString('vi-VN');
                        var formattedDiscountPrice = parseInt(value.product.discount_price)
                            .toLocaleString('vi-VN');

                        rows += `<tr class="pt-30">
                        <td class="custome-checkbox pl-30">
                        </td>
                        <td class="image product-thumbnail pt-40"><img src="/${value.product.product_thumbnail}" alt="#" /></td>
                        <td class="product-des product-name">
                            <h6><a class="product-name mb-10" href="${`product/details/${value.product.id}/${value.product.product_slug}`}">${value.product.product_name}</a></h6>
                        </td>
                        <td class="price" data-title="Price">
                        ${(value.product.discount_price == null || value.product.discount_price == 0)
                        ? `<h3 class="text-brand">${formattedSellingPrice}đ</h3>`
                        :`<h3 class="text-brand">${formattedDiscountPrice}đ</h3>`
                        }
                        </td>
                        <td class="text-center detail-info" data-title="Stock">
                            ${value.product.product_quantity > 0
                                ? `<span class="stock-status in-stock mb-0"> Còn hàng </span>`
                                :`<span class="stock-status out-stock mb-0"> Hết hàng </span>`
                            }

                        </td>
                        <td class="action text-center" data-title="Remove">
                            <a type="submit" class="text-body" id="${value.id}" onclick="wishlistRemove(this.id)"><i class="fi-rs-trash"></i></a>
                        </td>
                    </tr> `
                    });
                    $('#wishlist').html(rows);
                }
            })
        }
        wishlist();

        function wishlistRemove(id) {
            $.ajax({
                type: "GET",
                url: "/wishlist-remove/" + id,
                dataType: "json",
                success: function(data) {
                    wishlist();
                    // Start Message
                    const Toast = Swal.mixin({
                        position: 'top-end',
                        toast: true,
                        showConfirmButton: false,
                        timer: 2000,
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            icon: 'success',
                            title: data.success,
                        })
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: data.error,
                        })
                    }
                    // End Message
                }
            });
        }
    </script>
    <!--  /// End Load Wishlist Data -->

    <!--  /// Start Add To Wishlist -->
    <script type="text/javascript">
        function addToWishlist(product_id) {
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: "/add-to-wishlist/" + product_id,
                success: function(data) {
                    wishlist();
                    // Start Message
                    const Toast = Swal.mixin({
                        position: 'top-end',
                        toast: true,
                        showConfirmButton: false,
                        timer: 2000,
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            icon: 'success',
                            title: data.success,
                        })
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: data.error,
                        })
                    }
                    // End Message
                }
            })
        }
    </script>
    <!--  /// End Add To Wishlist -->


    <!--  /// Start Load Data To Compare -->
    <script type="text/javascript">
        function compare() {
            $.ajax({
                type: 'GET',
                dataType: 'json',
                url: "/get-compare-product",
                success: function(response) {
                    $('#compareQty').text(response.compareQuantity);
                    $('#countproductcompare').text(response.compareQuantity);
                    var images = `<td class="text-muted font-sm fw-600 font-heading mw-200">Hình ảnh</td>`;
                    var title = `<td class="text-muted font-sm fw-600 font-heading">Tên</td>`;
                    var price = `<td class="text-muted font-sm fw-600 font-heading">Giá</td>`;
                    var description = `<td class="text-muted font-sm fw-600 font-heading">Miêu tả</td>`;
                    var stock = `<td class="text-muted font-sm fw-600 font-heading">Trạng thái</td>`;
                    var weight = `<td class="text-muted font-sm fw-600 font-heading">Trọng lượng/Thể tích</td>`;
                    var dimensions = `<td class="text-muted font-sm fw-600 font-heading">Kích thước (d/r/c)</td>`;
                    var details = `<td class="text-muted font-sm fw-600 font-heading">Xem chi tiết</td>`;
                    var remove = `<td class="text-muted font-sm fw-600 font-heading">Xóa</td>`;

                    $.each(response.compare, function(key, value) {

                        var formattedSellingPrice = parseInt(value.product.selling_price)
                            .toLocaleString('vi-VN');
                        var formattedDiscountPrice = parseInt(value.product.discount_price)
                            .toLocaleString('vi-VN');

                        images +=
                            `<td class="row_img"><img src="/${value.product.product_thumbnail}"alt="compare-img" /></td>`;
                        title += `<td class="product_name">
                                    <h6 class="text-heading">${value.product.product_name}</h6>
                                </td>`;
                        price += `<td class="product_price">
                                    <h4 class="price text-brand">${(value.product.discount_price == null || value.product.discount_price == 0)
                        ? `${formattedSellingPrice}đ`
                        :`${formattedDiscountPrice}đ`
                        }</h4>
                                    </td>`;

                        description += `<td class="row_text font-xs">
                                    <p class="font-sm text-muted">${value.product.short_description}</p>
                                        </td>`;

                        stock += `<td class="row_stock">${value.product.product_quantity > 0 ? `<span class="stock-status in-stock mb-0">Còn hàng</span>` :`<span class="stock-status out-stock mb-0">Hết hàng</span>`}
                            </td>`;

                        weight +=
                            `<td class="row_weight">${(value.product.product_weight == null)?`N/A`:`${value.product.product_weight} ${value.product.product_measure}`}</td>`;

                        dimensions +=
                            `<td class="row_dimensions">${(value.product.product_dimensions == null)?`N/A`:`${value.product.product_dimensions}`}</td>`;

                        details += `<td class="row_btn">
                                        ${value.product.product_quantity > 0 ?
                                            `<a href="${`product/details/${value.product.id}/${value.product.product_slug}`}" class="btn btn-sm" type="submit"><i class="fi-rs-shopping-cart mr-5"></i>Xem chi tiết</a>`:`<button class="btn btn-sm btn-secondary"><i class="fi-rs-headset mr-5"></i>Liên hệ</button>`}
                                    </td>`;
                        remove += `<td class="row_remove">
                                    <a type="submit" class="text-muted" id="${value.id}" onclick="compareRemove(this.id)"><i class="fi-rs-trash mr-5"></i><span>Xóa</span>
                                    </a>
                                    </td>`;
                    });
                    $('#images').html(images);
                    $('#title').html(title);
                    $('#price').html(price);
                    $('#product_description').html(description);
                    $('#stock').html(stock);
                    $('#weight').html(weight);
                    $('#dimensions').html(dimensions);
                    $('#details').html(details);
                    $('#remove').html(remove);
                }
            });
        }
        compare();

        function compareRemove(id) {
            $.ajax({
                type: "GET",
                url: "/compare-remove/" + id,
                dataType: "json",
                success: function(data) {
                    compare();
                    // Start Message
                    const Toast = Swal.mixin({
                        position: 'top-end',
                        toast: true,
                        showConfirmButton: false,
                        timer: 2000,
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            icon: 'success',
                            title: data.success,
                        })
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: data.error,
                        })
                    }
                    // End Message
                }
            });
        }
    </script>
    <!--  /// End Load Data To Compare -->

    <!--  /// Start Add To Compare -->
    <script type="text/javascript">
        function addToCompare(product_id) {
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: "/add-to-compare/" + product_id,
                success: function(data) {
                    compare();
                    // Start Message
                    const Toast = Swal.mixin({
                        position: 'top-end',
                        toast: true,
                        showConfirmButton: false,
                        timer: 2000,
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            icon: 'success',
                            title: data.success,
                        })
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: data.error,
                        })
                    }
                    // End Message
                }
            })
        }
    </script>
    <!--  /// End Add To Compare -->


    <!--  /// Start Load Data My Cart -->
    <script type="text/javascript">
        function cart() {
            $.ajax({
                type: "GET",
                url: "/get-cart-product",
                dataType: "json",
                success: function(response) {
                    var rows = "";
                    $('#mycartQty').text(response.cartQty);
                    $.each(response.carts, function(key, value) {
                        var formattedPrice = parseInt(value.price).toLocaleString('vi-VN');
                        var formattedSubtotal = parseInt(value.subtotal).toLocaleString('vi-VN');

                        rows += `<tr class="pt-30">
                                <td class="custome-checkbox pl-30">
                                </td>
                                <td class="image product-thumbnail pt-40"><img src="/${value.options.image}"
                                        alt="#"></td>
                                <td class="product-des product-name">
                                    <h6 class="mb-5"><a class="product-name mb-10 text-heading"
                                            href="#">${value.name}</a></h6>
                                </td>
                                <td class="price" data-title="Price">
                                    <h4 class="text-body">${formattedPrice}đ</h4>
                                </td>
                                <td class="text-center detail-info" data-title="Stock">
                                    <div class="detail-extralink mr-15">
                                        <div class="detail-qty border radius">

                                            <a type="submit" id="${value.rowId}" onclick = "cartDecrement(this.id)" class="qty-down"><i class="fi-rs-angle-small-down"></i></a>

                                            <input type="text" name="quantity" class="qty-val" value="${value.qty}"
                                                min="1">

                                            <a type="submit" id="${value.rowId}" onclick = "cartIncrement(this.id)" class="qty-up"><i class="fi-rs-angle-small-up"></i></a>

                                        </div>
                                    </div>
                                </td>
                                <td class="price" data-title="Price">
                                    <h4 class="text-brand">${formattedSubtotal}đ</h4>
                                </td>
                                <td class="action text-center" data-title="Remove"><a type="submit" id="${value.rowId}" onclick = "cartRemove(this.id)" class="text-body"><i
                                            class="fi-rs-trash"></i></a></td>
                            </tr>`;
                    });
                    $("#cartPage").html(rows);
                }
            });
        }
        cart();

        //Start Cart Remove
        function cartRemove(id) {
            $.ajax({
                type: "GET",
                url: "/cart-remove/" + id,
                dataType: "json",
                success: function(data) {
                    cart();
                    miniCart();
                    couponCalculation();

                    // Start Message
                    const Toast = Swal.mixin({
                        position: 'top-end',
                        toast: true,
                        showConfirmButton: false,
                        timer: 2000,
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            icon: 'success',
                            title: data.success,
                        })
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: data.error,
                        })
                    }
                    // End Message
                }
            });
        }
        //End Cart Remove

        //Start Cart Decrement
        function cartDecrement(rowId) {
            $.ajax({
                type: "GET",
                url: "/cart-decrement/" + rowId,
                dataType: "json",
                success: function(data) {
                    couponCalculation();
                    cart();
                    miniCart();
                }
            });
        }
        //End Cart Decrement

        //Start Cart Increment
        function cartIncrement(rowId) {
            $.ajax({
                type: "GET",
                url: "/cart-increment/" + rowId,
                dataType: "json",
                success: function(data) {
                    if (data.error_quantity) {
                        // Start Message
                        const Toast = Swal.mixin({
                            position: 'center',
                            title: 'Sorry!',
                            timerProgressBar: true,
                            showConfirmButton: true,
                            timer: 2000,
                            confirmButtonText: "OK",
                            confirmButtonColor: '#3BB77E',
                        })
                        Toast.fire({
                            icon: 'error',
                            text: data.error_quantity,
                        })
                        // End Message
                    }
                    couponCalculation();
                    cart();
                    miniCart();
                }
            });
        }
        //End Cart Increment
    </script>
    <!--  /// End Load Data My Cart -->


    <!--  ///////////////    Start Apply Coupon        /////////////-->
    <script type="text/javascript">
        function applyCoupon() {
            var coupon_code = $('#coupon_code').val();
            $.ajax({
                type: "POST",
                url: "/coupon-apply",
                dataType: 'json',
                data: {
                    coupon_code: coupon_code
                },
                success: function(data) {
                    couponCalculation();
                    // Start Message
                    const Toast = Swal.mixin({
                        position: 'top-end',
                        toast: true,
                        showConfirmButton: false,
                        timer: 2000,
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            icon: 'success',
                            title: data.success,
                        })
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: data.error,
                        })
                    }
                    // End Message
                }
            });
        }

        // Start CouponCalulation Method
        function couponCalculation() {
            $.ajax({
                type: 'GET',
                url: "/coupon-calculation",
                dataType: 'json',
                success: function(data) {
                    var formattedTotal = parseInt(data.total).toLocaleString('vi-VN');
                    var formattedSubtotal = parseInt(data.subtotal).toLocaleString('vi-VN');
                    var formattedDiscountAmount = parseInt(data.discount_amount).toLocaleString('vi-VN');
                    var formattedTotalAmount = parseInt(data.total_amount).toLocaleString('vi-VN');

                    if (data.total) {
                        $('#couponCalField').html(
                            `<tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Tạm tính</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end">${formattedTotal}đ</h4>
                                    </td>
                                        </tr>

                                <tr>
                                    <td class="cart_total_label">
                                        <h6 class="text-muted">Tổng tiền</h6>
                                    </td>
                                    <td class="cart_total_amount">
                                        <h4 class="text-brand text-end">${formattedTotal}đ</h4>
                                    </td>
                                </tr>`)
                    } else {
                        $('#couponCalField').html(
                            `<tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Tạm tính</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h4 class="text-brand text-end">${formattedSubtotal}đ</h4>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Mã giảm giá </h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h4 class="text-brand text-end">${data.coupon_code} <a type="submit" onclick="couponRemove()"><i class="fi-rs-trash"></i></a></h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Giảm </h6>
                                        </td>
                                        <td class="cart_total_amount">
                                        <h4 class="text-brand text-end">${formattedDiscountAmount}đ</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Tổng tiền </h6>
                                        </td>
                                        <td class="cart_total_amount">
                                    <h4 class="text-brand text-end">${formattedTotalAmount}đ</h4>
                                        </td>
                                    </tr> `)
                    }
                }
            });
        }
        couponCalculation();
        // End CouponCalulation Method
    </script>
    <!--  ///////////////    End Apply Coupon        /////////////-->


    <script type="text/javascript">
        // Coupon Remove Start
        function couponRemove() {
            $.ajax({
                type: "GET",
                dataType: 'json',
                url: "/coupon-remove",
                success: function(data) {
                    couponCalculation();
                    // Start Message
                    const Toast = Swal.mixin({
                        position: 'top-end',
                        toast: true,
                        showConfirmButton: false,
                        timer: 2000,
                    })
                    if ($.isEmptyObject(data.error)) {
                        Toast.fire({
                            icon: 'success',
                            title: data.success,
                        })
                    } else {
                        Toast.fire({
                            icon: 'error',
                            title: data.error,
                        })
                    }
                    // End Message
                }
            });
        }
        // Coupon Remove End
    </script>

</body>

</html>
