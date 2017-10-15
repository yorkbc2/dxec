@extends("install.layouts.main", ['title' => 'Database Error'])

@section('imported_content')

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
					
					<div class="panel-body">
						<h1>Ошибка установки</h1>

						<div class="alert alert-danger">
							Данные, которые Вы ввели для подключения к БД неправильные. Попробуйте снова!
						</div>

						<form action="/dx-install/step/{{$stepId}}" method='post'>
							{{csrf_field()}}
							<button class='btn btn-default'>
								Назад
							</button>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>

@endsection