@extends('admin.admin_dashboard')
@section('admin')
@section('title')
    Report
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Report</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Report By Customer</li>
                </ol>
            </nav>
        </div>
    </div>
    <!--end breadcrumb-->
    <hr />
    <div class="row row-cols-1 row-cols-md-1 row-cols-lg-3 row-cols-xl-3">
        <form action="{{ route('search-by-customer') }}" method="post" id="myForm">
            @csrf
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="col-md-12 form-group">
                            <h5 class="card-title">Search By Customer</h5>
                            <label class="form-label">Select Customer: </label>
                            <select name="user" class="form-control form-select mb-3 single-select"
                                aria-label="Default select example">
                                <option selected="" disabled></option>
                                @foreach ($users as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <br>
                            <input type="submit" class="btn btn-rounded btn-primary" value="Search">
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#myForm').validate({
            rules: {
                user: {
                    required: true,
                },
            },
            messages: {
                user: {
                    required: 'Please select customer name.',
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
