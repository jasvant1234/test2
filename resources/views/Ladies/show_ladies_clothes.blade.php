@extends('layouts.app')

@section('content')

    <style>
        h3::first-letter {
            font-size: 200%;
            color: #FFC100;
            font-weight: 900;

        }
    </style>



    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="card-title"><b style="font-size: 30px">SHOW LADIES CLOTHES</b></h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">SHOW LADIES CLOTHES</a></li>
                        <li class="breadcrumb-item active">HOME</li>
                    </ol>
                </div>
            </div>
            @include('flash-message')
{{--            @if(session()->has('success'))--}}
{{--                <div class="alert alert-danger">--}}
{{--                    {{ session()->get('success') }}--}}
{{--                </div>--}}
{{--            @endif--}}
        </div>
    </div>


    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap" id="myTable">
            <thead>
            <tr>

                <th>Id</th>
                <th>Image</th>
                <th>Product Price</th>
                <th>Product Size</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>

            @foreach($get_all_ladies as $get_all_ladi)
                <tr>

                    <td>{{$loop->iteration}}</td>
                    <td>
                        <img src="{{asset('storage/vendors/dist/all/'.$get_all_ladi->product_image)}}" height="50px" width="50px" alt="user">
                    </td>
                    <td>{{$get_all_ladi->product_price}}</td>
                    <td>{{$get_all_ladi->product_size}}</td>
                    <td>
                        <a href="" class="btn btn-sm btn-warning"><i class="fa fas-solid fa-pen"></i></a>
                        <a href="{{route('delete_ladies',$get_all_ladi->id)}}" class="btn btn-sm btn-danger" ><i class="fa fas-solid fa-trash"></i></a>
                    </td>

                </tr>
            @endforeach


            </tbody>
        </table>

{{--        <div class="d-flex justify-content" style="margin-left: 825px;">--}}
{{--            {!! $get_all_ladies->links() !!}--}}
{{--        </div>--}}

    </div>

    <script>
        $(function () {
            $("#myTable").DataTable({
                "responsive": true, "lengthChange": true, "autoWidth": true,
                "responsive": true,
                "scrollX": false,
                // "buttons": ["copy", "csv", "excel", "pdf",]
            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        });
    </script>

@endsection

