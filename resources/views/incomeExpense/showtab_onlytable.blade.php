@extends('admin.template.main')

@section('tittle', 'Afiliaciones')

@section('stylesheet')
<link href="{{ asset('plugins/bdt/dateTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css">
<script src=" {{ asset('plugins/bdt/jquery.dateTables.js') }}"></script>
<script src=" {{ asset('plugins/steps/date.js') }}"></script>
<script src=" {{ asset('plugins/steps/date-es-CO.js') }}"></script>
<link href="{{ asset('plugins/NProgress/nprogress.css') }}" rel="stylesheet">
<script src="{{ asset('plugins/NProgress/nprogress.js') }}"></script>

@endsection

@section('header')


<h1 class="page-header">
	Ingresos / Egresos
</h1>
<ol class="breadcrumb">
	<li>
		<a href="{{ route("inicio") }}"><i class="fa fa-dashboard"></i> Inicio</a>
	</li>
	<li class="active">
		<i class="fa fa-credit-card"></i> Ingresos - Egresos
	</li>
</ol>


@endsection


@section('content')

<!-- section Tabs -->

<ul class="nav nav-tabs">
	<li role="presentation"><a href="{!! route('incomeExpense.index') !!}">Todos <span class="badge">{!! $countIE['todos'] !!}</span></a></li>

	<li role="presentation" class="{{ $countIE['page']  == 'week' ? 'active' : '' }}"	>
		<a href="{!! route('incomeExpense.lastweek') !!}">Ultima semana</span></a>
	</li>

	<li role="presentation" class="{{ $countIE['page']  == 'month' ? 'active' : '' }}" >
		<a href="{!! route('incomeExpense.lastmonth') !!}">Ultimo mes</span></a>
	</li>

	<li role="presentation" class="{{ $countIE['page']  == 'custom' ? 'active' : 'disabled' }}"><a href="#">Personalizado</span></a></li>
</ul>

<!-- Fin section Tabs -->

<div class="tab-content" style="border: 1px solid #ddd;">
	<div class="row">

		<div class="col-md-2">
			<div class="thumbnail">
				<div class="portlet">
				{!! Form::open(['route' =>'incomeExpense.search', 'method'=>'GET']) !!}
					<h4 class="text-center">Filtros</h4><hr>

					<h5 class="text-center text-primary">Fecha</h5>
					<div class="form-group">
						<label for="exampleInputEmail1" style="text-decoration: :none;">Desde</label>
						<input type="email" class="form-control" id="exampleInputEmail1" placeholder="desde">
					</div>
					<div class="form-group">
						<label for="exampleInputEmail1" style="text-decoration: :none;">Hasta</label>
						<input name="hasta" type="email" class="form-control" id="exampleInputEmail1" placeholder="Hasta">
					</div>

					<h5 class="text-center text-primary">Descripción</h5>
					<div class="form-group">
						<input type="email" class="form-control" id="exampleInputEmail1" placeholder="Descripción">
					</div>
					<h5 class="text-center text-primary">Tipo</h5>
					<div class="checkbox">
						<label>
							<input type="checkbox" value="">
							Ingreso
						</label>
						<label class="pull-right">
							<input type="checkbox" value="">
							Egreso
						</label>
					</div><br>
					<button type="submit" class="btn btn-default btn-block">Buscar</button>
					{!! Form::close() !!}
				</div>
			</div>
		</div>

		<div class="col-md-10">
			<!-- panel -->
			<div class="thumbnail">
				<div class="portlet">
					<div class="portlet-title">

						<div class="actions pull-right">
							<a class="btn btn-blue" data-toggle="modal" data-target="#newIncomeExpense" id="newOutflow">
								<i class="fa fa-file-text-o"></i>
								Nuevo
							</a>
							<a class="btn btn-blue buttonclickable">
								<span class="clickable"><i class="fa fa-chevron-up"></i></span>
							</a>
							<a class="btn btn-blue fullscreen">
								<i class="glyphicon glyphicon-fullscreen"></i>
							</a>
						</div>

						<div class="caption">
							<p class="text-primary"><i class="fa fa-money"></i> Ingresos y egresos</p>
						</div>
					</div>
					<div class="thumbnail-collapse collapse in">
						<div class="portlet-body">
							<div class="row">
								<div class="col-md-12">

									<div class="table-responsive">
										<table class="table table-striped table-bordered" id='allAffiliations'>
											<thead>
												<tr>
													<th>#</th>
													<th>Descripción</th>
													<th>Fecha</th>
													<th>Tipo</th>
													<th>Monto</th>
												</tr>
											</thead>
											<tbody>
												@foreach($incomeExpense as $outflow)

												<tr>
													<td>{!! "C-".($outflow->id + 100000) !!}</td>
													<td>{!! $outflow->description !!}</td>
													<td>{!! $outflow->created_at !!}</td>

													<td class="text-center">

														@if ($outflow->type == 'inflow')
														<span class="label label-success">Ingreso</span>
														@else
														<span class="label label-warning">Egreso</span>
														@endif

													</td>

													<td class="text-right">$ {!! $outflow->amount !!}</td>
												</tr>

												@endforeach
											</tbody>
										</table>
									</div>
									{!! $incomeExpense->appends(array_except(Request::query(), 'pageout'))->links() !!}
								</div>

							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- fin panel -->
		</div>

	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="newIncomeExpense" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			{!! Form::open(['route' =>'incomeExpense.store', 'method'=>'POST']) !!}
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title" id="myModalLabel">Nuevo Ingreso / Egreso</h4>
			</div>
			<div class="modal-body">
				@include('incomeExpense.forms.incomeExpenses_form')
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				{!! Form::submit('Guardar', ['class' => 'btn btn-success']) !!}
			</div>
			{!! Form::close() !!}
		</div>
	</div>
</div>

<script type="text/javascript">
	var fechaDate = new Date();
	var fecha = fechaDate.toString('dddd') +" "+ fechaDate.toString('dd') +", de " + fechaDate.toString('MMMM') + " de " + fechaDate.toString('yyyy');
	$('#spanDate').text(fecha);

</script>

<script type="text/javascript">

	$("#page-incomeExpenses").addClass("active");

//typeID id -> select
var element = document.getElementById('typeID');

$('#newOutflow').click(function() {
	element.value = 'outflow';
});

$('#newInflow').click(function() {
	element.value = 'inflow';
});

</script>

<script>
	NProgress.configure({ showSpinner: false});
	NProgress.start();
	NProgress.done();
</script>


@endsection