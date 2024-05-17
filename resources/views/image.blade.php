


<table>
   
        <tr>
            <th>name</th>
            <th>email</th>
            <th>image</th>
        </tr>

        <tbody>

            @foreach ($users as $u)
                
            
            <tr>
                <td>{{$u->name}} </td>
                <td>{{$u->email}} </td>
                <td><img src=" {{asset('storage/avatars/'. $u->image)}} " alt="" style="width:100px; height:100px">  </td>
                
                
            </tr>


            @endforeach
        </tbody>

</table>