@extends('layout.dasbormaster')
@section('datamateri','active')

@section('content')

<h1>User Profile</h1>

<p>Name: {{ $teachers->nama }}</p>
<p>Email: {{ $teachers->email }}</p>
<p>Id: {{ $teachers->id }}</p>

@endsection