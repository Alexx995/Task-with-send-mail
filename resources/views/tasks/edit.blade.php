<h4>Edit Task</h4>

<form action="{{route('tasks.update', $task)}}" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="_method" value="PUT">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="title">Name</label>
        <input type="text" value="{{$task->name}}" class="form-control" id="name"  name="name">
    </div>
    <div class="form-group">
        <label for="description">Task</label>
        <input type="text" value="{{$task->task}}" class="form-control" id="task" name="task" >
    </div>
    <div class="form-group">
        <label for="image">Image</label>
        <input type="file" name="image" id="image" class="form-control-file @error('image') is-invalid @enderror" accept="image/*">
        @if ($task->image)
            <img src="data:image/jpeg;base64,{{ base64_encode($task->image) }}" alt="{{ $task->name }}" width="250" height="150"/>
        @endif
        @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
