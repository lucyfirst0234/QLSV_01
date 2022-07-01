@extends('../master')

@section('content')

<h3>SUA LOP</h3>
<form action ="{{route('class.update', ['class'=>$class->id])}}"method="POST">
    @csrf
    @method('PUT')
    <table>
        <tr>
            <td>Name</td>
            <td><input type ="text" name = 'name' value="{{$class->name}}"</td>
        </tr>
        <tr>
            <td>Description</td>
            <td><textarea name='description'>{{$class->description}}</textarea></td>
        </tr>

        <tr>
            <td><input type ="submit" value="Sua"</td>
            <td><input type ="reset" value="Nhap lai"</td>
        </tr>
    </table>

</form>

@endsection