<!DOCTYPE html>
<html lang="en">

@include('layouts.theme.head')

<body class="no-skin">

	@include('layouts.theme.navbar')

	<div class="main-container ace-save-state" id="main-container">
		<script type="text/javascript">
			try {
				ace.settings.loadState('main-container')
			} catch (e) {}
		</script>

		@include('layouts.theme.sidebar')

		<div class="main-content">
			<div class="main-content-inner">


				<div class="page-content">
					<!-- /.boton izquierda para cambiar apariencia del tema -->
					<!-- @include('layouts.theme.settings') -->

					<div class="row">
						<div class="col-xs-12">
							<!-- PAGE CONTENT BEGINS -->

							@yield('content')



							<!-- PAGE CONTENT ENDS -->
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.page-content -->
			</div>
		</div><!-- /.main-content -->

		@include('layouts.theme.footer')

		<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
			<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
		</a>
	</div><!-- /.main-container -->

	@include('layouts.theme.scripts')


</body>

</html>