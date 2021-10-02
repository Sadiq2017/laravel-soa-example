
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Page Tracker Table</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <h2>Page Tracker Table</h2>
    <table class="table">
        <thead>
        <tr>
            <th>Url</th>
            <th>Visit Count</th>
            <th>Create Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach($data as $item)
            <tr>
                <td>{{$item['url']}}</td>
                <td>{{$item['visit_count']}}</td>
                <td>{{$item['last_date']}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <ul class="pagination">
        @for($i = 1; $i <= $pageCount; $i++)
            @if($i==$page)
                <?php $className='active'?>
            @else
                <?php $className=''?>
            @endif
            <li class="{{$className}}"><a href="{{route('admin.activity')}}?page={{$i}}">{{$i}}</a></li>
        @endfor
    </ul>

</div>

</body>
</html>
