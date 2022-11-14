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
                    <h3 class="card-title"><b style="font-size: 30px">SHOW EMAIL</b></h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">SHOW EMAIL</a></li>
                        <li class="breadcrumb-item active">HOME</li>
                    </ol>
                </div>
            </div>

        </div>
    </div>


    <div class="card-body table-responsive p-0">
      @include('flash-message')
        <table class="table table-hover text-nowrap" id="myTable">
            <thead>
            <tr>
                <th>Id</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>Check</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>

            @foreach($mail_lists as $mail_list)
                <tr>

                    <td>{{$loop->iteration}}</td>
                    <td>{{$mail_list->name}}</td>
                    <td>{{$mail_list->email}}</td>
                    <td>
                    @if($mail_list->check == 'Yes')

                             <i class="fas fa-solid fa-check " style="color: green"></i>

                    @endif
                    </td>
                    <td>
                        <a href="{{route('send_thanks_mail',$mail_list->id)}}" class="btn btn-sm btn-danger">SEND MAIL<i class="fa fas-solid fa-show"></i></a>
                    </td>

                </tr>
            @endforeach


            </tbody>
        </table>

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

