@extends('layouts.app')
@section('content')
  <review-detailed-component :reviewee="{{ $reviewee }}"/>
@endsection
