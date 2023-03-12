<h1>Add New Task </h1>
<hr>
<form action="{{route('tasks.store')}}" method="post" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" class="form-control" id="NameTitle"  name="name" >
    </div>
    <div class="form-group">
        <label for="price">Task</label>
        <input type="text" class="form-control" id="TaskTitle" name="task">
    </div>
    <div>
        <label for="image">Image</label>
        <input type="file" name="image" id="image">
    </div>

{{--    @if ($errors->any())--}}
{{--        <div class="alert alert-danger">--}}
{{--            <ul>--}}
{{--                @foreach ($errors->all() as $error)--}}
{{--                    <li>{{ $error }}</li>--}}
{{--                @endforeach--}}
{{--            </ul>--}}
{{--        </div>--}}
{{--    @endif--}}
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
