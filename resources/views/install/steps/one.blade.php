@extends("install.layouts.main", ['title' => 'FirstStep'])

@section('imported_content')

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
					
					<div class="panel-body">
						<h1>Первый этап</h1>

						<img width='100%' src="/dxec-images/big-logo.png" alt="Image not found!">
						
						<p>
							Введите данные для подключения к БД. Они нужны для нормальной работы движка!
						</p>
						<form class='form-field' action='/dx-install/step/2' method='post'>
							{{csrf_field()}}
							<div class="form-group">
								<input type="text" class='form-control' name='db_host' placeholder="DB HOST">
							</div>
							<div class="form-group">
								<input type="text" class='form-control' name='db_name' placeholder="DB NAME">
							</div>
							<div class="form-group">
								<input type="text" class='form-control' name='db_username' placeholder="DB USERNAME">
							</div>
							<div class="form-group">
								<input type="text" class='form-control' name='db_password' placeholder="DB PASSWORD">
							</div>
							<button type='submit' class='btn btn-primary'>
								Продолжить
							</button>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>

@endsection