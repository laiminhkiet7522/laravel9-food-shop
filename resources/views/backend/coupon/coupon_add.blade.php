@extends('admin.admin_dashboard')
@section('admin')
@section('title')
    Coupon
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Coupon</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Add New Coupon</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">
            <div class="btn-group">
                <a href="{{ route('all.coupon') }}" class="btn btn-primary"><i class="lni lni-arrow-left"> Go
                        Back</i></a>
            </div>
        </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            @error('coupon_code')
                                <div class="alert alert-danger border-0 bg-danger alert-dismissible fade show">
                                    <div class="text-white">{{ $message }}</div>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                </div>
                            @enderror
                            <form method="post" action="{{ route('store.coupon') }}" id="myForm">
                                @csrf
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Coupon Code <span class="text-danger">*</span></h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <input type="text" name="coupon_code" class="form-control"
                                            value="{{ old('coupon_code') }}" />
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Discount(%) <span class="text-danger">*</span></h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <input type="text" name="coupon_discount" class="form-control"
                                            value="{{ old('coupon_discount') }}" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Coupon Validity Date <span class="text-danger">*</span></h6>
                                    </div>
                                    <div class="form-group col-sm-9 text-secondary">
                                        <input type="date" name="coupon_validity" class="form-control"
                                            value="{{ old('coupon_validity') }}"
                                            min="{{ Carbon\Carbon::now()->format('Y-m-d') }}" />
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-sm-3"></div>
                                    <div class="col-sm-9 text-secondary">
                                        <input type="submit" class="btn btn-primary px-4 savedata"
                                            value="Add" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {
        $('#myForm').validate({
            rules: {
                coupon_code: {
                    required: true,
                    maxlength: 10,
                },
                coupon_discount: {
                    required: true,
                    number: true,
                    min: 1,
                    max: 100,
                },
                coupon_validity: {
                    required: true,
                },
            },
            messages: {
                coupon_code: {
                    required: 'Please enter coupon name.',
                    maxlength: 'The coupon name must not be greater than 10 characters.',
                },
                coupon_discount: {
                    required: 'Please enter coupon discount.',
                    number: 'Please enter only positive integers or decimals.',
                    min: 'Coupon discount must be greater than 0.',
                    max: 'Coupon discount must be less than or equal 100.',
                },
                coupon_validity: {
                    required: 'Please select coupon validity.',
                },
            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            },
        });
    });
</script>
@endsection
