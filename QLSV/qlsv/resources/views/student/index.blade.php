@extends('../master')

@section('header')

@endsection

@section('content')

<h3>DANH SACH SINH VIEN</h3>

<a href="{{route('student.create')}}">Them Sinh Vien</a>

<table class="table table-borderd table-striped table-hover">
    <tr>
        <th>ID</th>
        <th>Photo</th>
        <th>FullName</th>
        <th>DOB</th>
        <th>Sex</th>
        <th>Address</th>
        <th>Hometown</th>
        <th>Class name</th>
        <th>Description</th>
        <th>Action</th>
    </tr>
@foreach($students as $student)
    <tr>
        <td>{{$student->id}}</td>
        <td><img width="75" height="100" src ="<?php 
                if(file_exists("./uploads/{$student->id}.jpg"))
                    echo "./uploads/{$student->id}.jpg";
                else
                    echo "./uploads/no_photo.jpg";    
            ?>"
            
        </td>
        <td>{{$student->fullname}}</td>
        <td>{{$student->DOB}}</td>
        <td>{{$student->address}}</td>
        <td>{{$student->hometown}}</td>
        <td>{{$student->class_id}}</td>
        <td>{{$student->id}}</td>
        
        <td><a href="{{route('student.edit', ['student'=>$student->id])}}">
            <button class="btn btn-primary">Sua</button>
        </a>
        <form action ="{{route('student.destroy', ['student'=> $student->id])}}" method="POST">
    @csrf
    @method('DELETE')
    <input type = "submit" class="btn btn-danger" value="Xoa" onclick="return confirm('Ban that su muon xoa?');">
        </form>

    
    </td>
    </tr>
@endforeach

</table>


@endsection