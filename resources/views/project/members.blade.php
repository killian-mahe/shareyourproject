@extends('project.layout')

@section('main')

<div class="member-card lg:flex md:rounded-lg p-6 shadow">
    <a href="#"><img class="lg:h-32 lg:w-32 rounded-full mx-auto lg:ml-0 lg:mr-6 hover:shadow-md transform ease-in-out duration-200 hover:scale-105" src="https://images.unsplash.com/photo-1569007889977-42e2392850d7?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=801&q=80"></a>
    <div class="text-center lg:text-left">
        <a href="#" class="member-card-name">Angelina Bober</a>
        <div class="member-card-job">Photographer</div>
        <a href="#" class="member-card-email">bober.angelina@example.com</a>
        <div class="member-card-phone">+33 6 14 15 16 17</div>
    </div>
</div>


@endsection
