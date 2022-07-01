@extends('../master')

@section('content')

<h3>THEM LOP</h3>
<form action ="{{route('class.store')}}"method="POST" enctype="multipart/form-data">
    @csrf
    <table>
        <tr>
            <td>Name</td>
            <td><input type ="text" name = 'name' value=""</td>
        </tr>
        <tr>
            <td>Description</td>
            <td><textarea name='description'></textarea></td>
        </tr>

        <tr>
            <td><input type ="submit" value="Them"</td>
            <td><input type ="reset" value="Nhap lai"</td>
        </tr>
    </table>

</form>

@endsection