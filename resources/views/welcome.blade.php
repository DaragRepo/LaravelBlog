<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title></title>
</head>
<body>
	{{-- <h1>Hello, {{ $name }}  {{ $age }}</h1> --}}
	@if(count($tasks) < 1)
	<h1>No Tasks Available</h1>
	@else  
	<h1>Tasks</h1>
	<ul>
		@foreach($tasks as $task)
		<li>
			<a href="task/{{ $task->id }}">
				{{ $task->body }}
			</a>
		</li>
		@endforeach
	</ul>
	@endif

</body>
</html>