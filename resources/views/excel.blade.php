
<h1>EXCEL</h1>

<form action="{{route('export-user')}}" method="GET">
    <label for="start_date">Start Date:</label>
    <input type="date" name="start_date" id="start_date">
    <br>
    <label for="end_date">End Date:</label>
    <input type="date" name="end_date" id="end_date">
    <br>
    <button type="submit">Show Tasks</button>
</form>


