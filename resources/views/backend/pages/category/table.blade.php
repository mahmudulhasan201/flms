
<h1>ALL LIST</h1>


<table>

<tr>
<th>id</th>
<th>Name</th>
<th>price</th>
<th>Quantity</th>
<!-- <th>description</th> -->
</tr>

<tbody>
    @foreach($attribute as $data)
    <tr>
        <td>{{$data->id}}</td>
        <td>{{$data->name}}</td>
        <td>{{$data->price}}</td>
        <td>{{$data->Quantity}}</td>
        <!-- <td>{{$data->description}}</td> -->
     </tr>
     @endforeach



</tbody>
</table>

