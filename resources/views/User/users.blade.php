
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="{{asset('vendors/dist/css/bootstrap1.min.css')}}" rel="stylesheet">
    <script src="{{asset('vendors/dist/js/jquery1.min.js')}}"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>

<div class="container">


    <button class="btn btn-success send-email">Send Email</button>

    <table class="table table-bordered data-table">
        <thead>
        <tr>
            <th>#</th>
            <th>No</th>
            <th>Name</th>
            <th>Email</th>
        </tr>
        </thead>
        <tbody>
        @foreach($users as $user)
            <tr>
                <td><input type="checkbox" class="user-checkbox" name="users[]" value="{{ $user->id }}"></td>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {{ $users->links() }}
</div>


<script type="text/javascript">

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(".send-email").click(function(){
        var selectRowsCount = $("input[class='user-checkbox']:checked").length;

        if (selectRowsCount > 0) {

            var ids = $.map($("input[class='user-checkbox']:checked"), function(c){return c.value; });

            $.ajax({
                type:'POST',
                url:"{{ route('ajax.send.email') }}",
                data:{ids:ids},
                success:function(data){
                    alert(data.success);
                }
            });

        }else{
            alert("Please select at least one user from list.");
        }
        console.log(selectRowsCount);
    });

</script>

</body>
</html>
