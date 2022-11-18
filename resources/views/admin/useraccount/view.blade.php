@extends('layouts.admin')

@section('title', 'User Account')

@section('content')
<h2 class="text-center text-lg-left mx-0 mx-lg-5 my-4"><a href="{{ route('user.index') }}" class="text-decoration-none text-1"><i class="fas fa-chevron-left mr-2"></i>Users</a></h2>
<hr class="hr-thick" style="border-color: #707070;">

<div class="col-12 my-2 mx-auto">
	<div class="card mx-auto">
	</div>
</div>
@endsection