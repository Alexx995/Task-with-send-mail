<h2>Show Dates</h2>
<form action="{{route('dates.show')}}" method="GET">
    <label for="start_date">Start Date:</label>
    <input type="date" name="start_date" id="start_date">
    <br>
    <label for="end_date">End Date:</label>
    <input type="date" name="end_date" id="end_date">
    <br>
    <button type="submit">Show Tasks</button>
</form>
@if (isset($tasks))
@foreach ($tasks as $task)
    <div>
        <h3>{{ $task->name }}</h3>
        <p>{{ $task->task }}</p>
        <p>Created at: {{ $task->created_at }}</p>
        @if ($task->image)
            <img src="data:image/jpeg;base64,{{ base64_encode($task->image) }}" alt="{{ $task->name }}" width="250" height="150"/>
        @endif
    </div>
@endforeach
@else
<p>{{ $message }}</p>
@endif
