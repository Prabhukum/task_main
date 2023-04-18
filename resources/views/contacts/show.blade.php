@extends('contacts.layout')
@section('content')


<div class="card">
  <div class="card-header">Contactus Page</div>
  <div class="card-body">


        <div class="card-body">
        <p class="card-text">Emp_ID : {{ $contacts->Emp_ID }}</p>
        <h5 class="card-title">Name : {{ $contacts->name }}</h5>

        <p class="card-text">Email: {{ $contacts->email }}</p>
        <p class="card-text">Mobile : {{ $contacts->mobile }}</p>
  </div>

    </hr>

  </div>
</div>
