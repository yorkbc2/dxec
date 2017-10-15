@extends("install.layouts.main", ['title' => 'Install'])

@section('imported_content')

	<div class="container">
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-default">
					
					<div class="panel-body">
						<h1>Установка движка</h1>

						<img width='100%' src="/dxec-images/big-logo.png" alt="Image not found!">
						
						<p>
							Добро пожаловать на этап установки движка для создания интернет-магазино от DoubleX Studio.
						</p>
						<p>
							Вы можете написать нам на почту:
							<ul>
								<li>
									<a href="mailto: yorkbc2@gmail.com">yorkbc2@gmail.com</a>
								</li>
							</ul>
						</p>
						<form action='/dx-install/step/1' method='post'>
							{{csrf_field()}}
							<button type='submit' class='btn btn-primary'>
								Начать установку
							</button>
						</form>
					</div>

				</div>
			</div>
		</div>
	</div>

@endsection