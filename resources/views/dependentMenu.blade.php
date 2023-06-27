<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    @if(session()->has('message'))
{{session()->get('message')}}
    @endif
    <form method="post" action="{{route('submitdata')}}" enctype="multipart/form-data">
        @csrf
    <div class="mb-3">
    <label for="prod">Product</label>
    <select name="data" id="change">
        <option value="">Select Product</option>
        @foreach ($data as $values)
            <option value="{{$values->id}}">{{$values->name}}</option>
        @endforeach
    </select>
</div>
<div class="mb-3">
    <label for="cat">Category</label>
    <select name="cat" id="sala">
        <option value="">Select Category</option>
    </select>
</div>
<div class="mb-3">
    <label>Name</label>
    <input type="text" name="header">
</div>
<div class="mb-3">
    <label>image</label>
    <input type="file" name="num">
</div>
<input type="submit" value="Submit" class="btn btn-primary">
    </form>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script>
    $(document).ready(function() {
            $('#change').on('change', function() {
               var categoryID = $(this).val();
               console.log(categoryID);
               if(categoryID) {
                   $.ajax({
                       url: '/getCourse/'+categoryID,
                       type: "GET",
                       data : {"_token":"{{ csrf_token() }}"},
                       dataType: "json",
                       success:function(data)
                       {
                         if(data!=""){
                            $('#sala').empty();
                         
                            $.each(data, function(key, value){
                                $('select[name="cat"]').append('<option value="'+ key +'">' + value.name+ '</option>');
                            });
                        }
                        else{
                            $('#sala').empty();
                            $('#sala').append('<option>Select Category</option>');

                        }
                     }
                   });
               }else{
                 $('#course').empty();
               }
            });
            });
        </script>
</body>
</html>