@extends('layouts.personal-office')
@section('page')
	<div class="container-fluid-md">
		<div class="panel">
			<div class="panel-body text-center">
				<i class="fa fa-warning fa-5x text-muted"></i>
				<h3 class="thin margin-sm-bottom">@lang('personal-office.blocked.blocked')</h3>
				<p class="margin-lg-bottom">@lang('personal-office.blocked.contact_support')</p>
				<a href="{{route('personal-office.issues.index')}}" class="btn btn-success">@lang('personal-office.blocked.support')</a>
			</div>
		</div>
	</div>
@endsection
