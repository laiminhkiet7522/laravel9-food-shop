@extends('admin.admin_dashboard')
@section('admin')
@section('title')
    Blog
@endsection
<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Blog Comment</div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">All Blog Comments</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">

        </div>
    </div>
    <!--end breadcrumb-->
    <hr />
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table id="example" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Post Title </th>
                            <th>Post Image </th>
                            <th>Full Name </th>
                            <th>Comment </th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($comment as $key => $item)
                            <tr>
                                <td> {{ $key + 1 }} </td>
                                <td>{{ Str::limit($item['blogpost']['post_title'], 30, '...') }}</td>
                                <td> <img src="{{ asset($item['blogpost']['post_image']) }}"
                                        style="width: 150px; height:80px;"> </td>
                                <td>{{ $item['user']['name'] }}</td>
                                <td>{{ Str::limit($item->comment, 30, '...') }}</td>
                                @if ($item->parent_id == null && $item->status == 0)
                                    <td>
                                        <a href="{{ route('admin.comment.reply', $item->id) }}"
                                            class="btn btn-warning">Reply</a>
                                    </td>
                                @else
                                    <td><a href="#" class="btn btn-success">Responded</a></td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No.</th>
                            <th>Post Title </th>
                            <th>Post Image </th>
                            <th>Full Name </th>
                            <th>Comment </th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection