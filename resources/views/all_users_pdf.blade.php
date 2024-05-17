
{{-- {{dd($users)}} --}}


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    



<h2>{{$name}} </h2>





 {{-- {{ dd($u->name ) }} --}}


 <table>
   
    <tr>
        <th>id</th>
        <th>name</th>
        <th>email</th>
    </tr>


    @foreach ($users as $u)

        <tr>
            <td>{{$u->id}}</td>
            <td>{{$u->name}}</td>
            <td> {{ $u->email }} </td>
        </tr>
        
        @endforeach
    
 </table>
    



</body>
</html>