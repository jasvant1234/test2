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
                    <h3 class="card-title"><b style="font-size: 30px">SHOW ALL CLOTHES</b></h3>

                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">SHOW ALL CLOTHES</a></li>
                        <li class="breadcrumb-item active">HOME</li>
                    </ol>
                </div>

            </div>




            @include('flash-message')
{{--            @if(session()->has('success'))--}}
{{--                <div class="alert alert-success">--}}
{{--                    {{ session()->get('success') }}--}}
{{--                </div>--}}
{{--            @endif--}}
{{--            @if(session()->has('unsuccess'))--}}
{{--                <div class="alert alert-danger">--}}
{{--                    {{ session()->get('unsuccess') }}--}}
{{--                </div>--}}
{{--            @endif--}}
        </div>
    </div>


    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap" id="myTable">
            <thead>
            <tr>

                <th>Id</th>
                <th>Gender</th>
                <th>Image</th>
                <th>Product Price</th>
                <th>Product Size</th>
                <th>Action</th>

            </tr>
            </thead>
            <tbody>

            @foreach($all_clothes_gets as $all_clothes_get)
                <tr>

                    <td>{{$loop->iteration}}</td>
                    <td>{{$all_clothes_get->gender}}</td>
                    <td>
                        <img src="{{asset('storage/vendors/dist/all/'.$all_clothes_get->product_image)}}" height="50px" width="50px" alt="user">
                    </td>
                    <td>{{$all_clothes_get->product_price}}</td>
                    <td>{{$all_clothes_get->product_size}}</td>


                    <td>
                        <a href="" class="btn btn-sm btn-warning"><i class="fa fas-solid fa-pen"></i></a>
                        <a href="{{route('delete_all_gents',$all_clothes_get->id)}}" class="btn btn-sm btn-danger" ><i class="fa fas-solid fa-trash"></i></a>
                    </td>

                </tr>
            @endforeach


            </tbody>
        </table>

{{--        <div class="d-flex justify-content" style="margin-left: 825px;">--}}
{{--            {!! $all_clothes_gets->links() !!}--}}
{{--        </div>--}}

    </div>


{{--    script for search record--}}

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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

@endsection



