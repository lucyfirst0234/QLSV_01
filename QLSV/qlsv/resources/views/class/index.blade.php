@extends('../master')

@section('header')

@endsection

@section('content')

<h3><?php echo __('qlsv.index_title') ?></h3>

<a href="{{route('class.create')}}"><?php echo __('qlsv.New');?></a>

<table class="table table-borderd table-striped table-hover">
    <tr>
        <th><?php echo __('qlsv.ID');?> </th>
        <th><?php echo __('qlsv.Name');?></th>
        <th><?php echo __('qlsv.Description');?></th>
        <th><?php echo __('qlsv.Action');?></th>
    </tr>
@foreach($classes as $class)
    <tr>
        <td>{{$class->id}}</td>
        <td>{{$class->name}}</td>
        <td>{{$class->description}}</td>
        <td><a href="{{route('class.edit', ['class'=>$class->id])}}">
            <button class="btn btn-primary"><?php echo __('qlsv.Update');?></button>
        </a>
        <form action ="{{route('class.destroy', ['class'=>$class->id])}}"  method="POST">
    @csrf
    @method('DELETE')
    <input type = "submit" class="btn btn-danger" value="<?php echo __('qlsv.Delete');?>" onclick="return confirm('<?php echo __('qlsv.delete_confirm');?>');">
        </form>

    
    </td>
    </tr>
@endforeach

</table>


@endsection