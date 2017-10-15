<nav class="panel-nav--inside">
	
	<h2>
		<a href="/dx-admin">
			DXE-Commerce
		</a>
	</h2>
	
	<ul>
		@foreach(get_admin_page_links() as $pageLink)
		
			@if(isset($pageLink['childs']))
				<li class='panel-nav--dropdown'>
					<a href="/dx-admin/custom/{{$pageLink['url']}}">
						{{$pageLink['name']}}
					</a>
					<div class="caret"></div>
					<ul class='panel-nav--dropitem'>
						@foreach($pageLink['childs'] as $pageChild)
						<li>
							<a href="/dx-admin/custom/{{$pageChild['url']}}">
								{{$pageChild['name']}}
							</a>
						</li>
						@endforeach
					</ul>
				</li>
			@else
				<li>
					<a href="/dx-admin/custom/{{$pageLink['url']}}">
						{{$pageLink['name']}}
					</a>
				</li>
			@endif
		@endforeach
	</ul>

</nav>