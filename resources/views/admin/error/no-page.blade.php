@extends("admin.layouts.ready-to-use")

@section("imported_content")

	<div class="alert alert-danger">
		Ошибка. Страница не найдена : "{{$error_view_name}}"
	</div>

@endsection