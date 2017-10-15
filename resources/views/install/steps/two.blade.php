@extends("install.layouts.main", ['title' => 'FirstStep'])

@section('imported_content')

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
					
					<div class="panel-body">
						<h1>Второй этап</h1>

						<img width='100%' src="/dxec-images/big-logo.png" alt="Image not found!">
						
						<p>
							Введите данные для регистрации администратора в админ-панель, а также укажите информацию для заполнения стартового шаблона магазина.
						</p>
						<form class='form-field' action='/dx-install/step/3' method='post'>
							{{csrf_field()}}

							<div class="form-group">
								<input type="text" class='form-control' name='admin_login' placeholder="admin login">
							</div>
							<div class="form-group">
								<input type="text" class='form-control' name='admin_email' placeholder='admin email'>
							</div>
							<div class="input-group">
								<input type="text" class='form-control' name='admin_name[first]' placeholder='admin first name'>
								<input type="text" class='form-control' name='admin_name[second]' placeholder='admin second name'>
							</div>
							<div class="form-group">
								
								<input type="text" class='form-control' name='admin_password' placeholder='admin password'>
							</div>
							<div class="form-group">
								<input type="text" class='form-control' name='store_title' placeholder='store title'>
							</div>
							<div class="form-group">
								<textarea class='form-control' name='store_description' placeholder='store description'></textarea>
							</div>
							<div class="form-group">
								<button type='submit' class='btn btn-primary'>
									Завершить
								</button>
							</div>
							
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>

@endsection