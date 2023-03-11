@extends('layouts.dashboard')

@section('content')
<livewire:dashboard.users.edit :user='$user'>
@endsection