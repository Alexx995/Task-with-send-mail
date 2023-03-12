
@include('tasks.create')



@foreach($tasks as $task)
    <tr>
        <th scope="row">{{$task->id}}</th>
        <td>{{$task->name}}</td>
        <td>{{$task->task}}</td>
       <td><p>Created at: {{ $task->created_at }}</p></td>
        @if ($task->image)
            <img src="data:image/jpeg;base64,{{ base64_encode($task->image) }}" alt="{{ $task->name }}" width="250" height="150"/>
        @endif

        <td> <a href="{{ route('tasks.edit', $task)}}">
            <button type="button" class="btn btn-warning">Edit</button>
        </a>&nbsp;</td>
        <form action="{{route('tasks.destroy', $task)}}" method="POST">
            <input type="hidden" name="_method" value="DELETE">
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="submit" class="btn btn-danger" value="Delete"/>
        </form>
</tr>
@endforeach


<form action="{{route('dates.show')}}">
    <button type="submit">Show Dates</button>
</form>

