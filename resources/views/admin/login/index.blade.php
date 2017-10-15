@extends("admin.layouts.index", ["title" => "Вход в админ-панель"])

@section("imported_content")

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
					<div class="panel-body">
						@if(isset($error_message))
							@if($error_message == true)
							
							<div class="alert alert-danger">
								login or password are incorrect!
							</div>

							@endif
						@endif
						<form action="/dx-login" 
							 class="form-field"
							 method="post">

							 {{csrf_field()}}
							 	
								<div class="form-group">
									<input type="text" name="admin_login" placeholder="login" required class='form-control'>
								</div>
								<div class="form-group">
									<input type="password" name="admin_password" placeholder="password" required class='form-control'>
								</div>
								<div class="form-group">
									<button type="submit" class="btn btn-default btn-sm">
										Войти
									</button>
								</div>

							 </form>
					</div>
				</div>
			</div>
		</div>
	</div>

@endsection