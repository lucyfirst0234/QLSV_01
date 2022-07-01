@extends('../master')

@section('content')
<h3>SUA SINH VIÊN</h3>

<div>
    <ul class="text-danger">
        @foreach($errors->all() as $errors)
            <li>{{$errors}}</li>
        @endforeach

    </ul>
</div>

<form action="{{route('student.update', ['student'=>$student->id])}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
<table>

	<tr>
		<td>Họ tên</td>
		<td><input type="text" name="fullname" value="{{count($errors)?old('fullname'):
        $student->fullname}}"></td>
	</tr>

	<tr>
		<td>Ngày sinh</td>
		<td><input type="date" name="DOB" value="{{count($errors)?old('DOB'):
        $student->DOB}}"></td>
	</tr>

	<tr>
		<td>Giới tính</td>
		<td>
			<input type="radio" name="sex" value="0" {{(count($errors)?old('sex'):
        $student->sex)?"":" checked"}}> Nam
			<input type="radio" name="sex" value="1" {{(count($errors)?old('sex'):
        $student->sex)?" checked":""}}> Nữ
		</td>
	</tr>

	<tr>
		<td>Quê quán</td>
        <td><input type="text" name="hometown" value="{{count($errors)?old('hometown'):
        $student->hometown}}"></td>
	</tr>

	<tr>
		<td>Địa chỉ</td>
		<td><input type="text" name="address" value="{{count($errors)?old('address'):
        $student->address}}"></td>
	</tr>

	<tr>
		<td>Sở thích</td>

		<td>

		<?php
		
			$total = 0;

            if(count($errors))

			    if(is_array(old('hobbies')))
			        foreach(old('hobbies') as $hobby)
				    $total += $hobby;
            else $total = $student->hobbies;
		?>
			<input type="checkbox" name="hobbies[]" value="1" {{$total & 1 ?"checked" : ""}}> Thể thao
			<input type="checkbox" name="hobbies[]" value="2" {{$total & 2 ?"checked" : ""}}> Du lịch
			<input type="checkbox" name="hobbies[]" value="4" {{$total & 4 ?"checked" : ""}}> Phim ảnh
			<input type="checkbox" name="hobbies[]" value="8" {{$total & 8 ?"checked" : ""}}> Ẩm thực
		</td>
	</tr>

	<tr>
		<td>Màu yêu thích</td>
		<td><input type="color" name="favourite_color" value="{{count($errors)?old('favourite_color'):
        $student->favourite_color}}"></td>
	</tr>

	<tr>
		<td>Email</td>
		<td><input type="email" name="email" value="{{count($errors)?old('email'):
        $student->email}}"></td>
	</tr>

	<tr>
		<td>Trang Facebook</td>
		<td><input type="url" name="facebook" value="{{count($errors)?old('facebook'):
        $student->facebook}}"></td>
	</tr>

	<tr>
		<td>Lớp</td>
		<td>
			<select name="class_id">
                @foreach($classes as $class)
                    <option value="{{$class->id}}" {{(count($errors)?old('class_id'):
        $student->class_id) == $class->id?"selected":""}}> 
						{{$class->name}} </option>
                @endforeach
			</select>	
		</td>
	</tr>


	<tr>
		<td>Tên đăng nhập</td>
		<td><input type="text" name="username" value="{{count($errors)?old('username'):
        $student->username}}"></td>
	</tr>

	<tr>
		<td>Mật khẩu</td>
		<td><input type="password" name="password" value="{{count($errors)?old('password'):
        $student->password}}"></td>
	</tr>
	<tr>
		<td>Ảnh thẻ</td>
		<td><input type="file" name="avatar" value=""></td>
	</tr>

	<tr>
		<td>Mô tả</td>
		<td><textarea name="description" value ="{{count($errors)?old('description'):
        $student->description}}">Nhập nội dung vào đây!</textarea></td>
	</tr>

	<tr>
		<td><input type="submit" name="" value="Gửi"></td>
		<td><input type="reset" name="" value="Nhập lại"></td>
	</tr>

</table>

</form>