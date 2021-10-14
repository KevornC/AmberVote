@extends('layouts.app')

@section('content')

<!-- component -->
<div class="h-screen bg-gray-100">
{{--  <div class="container">--}}
      @if(session()->has('Error'))
          <div class="flex p-4 mb-4 text-sm text-white bg-red-400 rounded-lg" role="alert">
              <div>
                  <span class="font-medium">Alert</span> {{session('Error')}}
              </div>
          </div>
      @endif
      <div class="flex justify-center p-4 mb-10">
        <h1 class="mt-5 text-xl text-blue-500">Type of Ballot </h1>
      </div>
      <div class="flex justify-center">
            <div class="w-1/2 m-auto bg-white rounded-lg shadow-xl">
                <ul class="divide-y divide-gray-300">
                  <div>
                    <li class="p-4 text-center cursor-pointer text-grey-800 hover:bg-gray-50">Mulitple Choice</li>
{{--                    <form method="POST" action="{{ route('storeBallot') }}">--}}
{{--                      @csrf--}}
{{--                      <input type="hidden" name="election_id" value="{{ $election->id}}">--}}
                     <a href="{{url('dashboard/ballotType/'.$election->id)}}"><button class="flex items-center justify-center px-4 py-2 m-auto mt-5 mb-5 text-white bg-green-600 rounded-md shadow-xl hover:bg-green-400">Select</button></a>
{{--                    </form>--}}
                    </div>

{{--                    <div>--}}
{{--                    <li class="p-4 cursor-pointer hover:bg-gray-50">Ranked Choice </li>--}}
{{--                    <form method="POST" form="{{ route('storeBallot') }}">--}}
{{--                      @csrf--}}
{{--                      <input type="hidden" name="election_id" value="{{ $election->id }}">--}}
{{--                      <button type="submit" class="py-2 px-4 mt-8 bg-green-600 hover:bg-green-400--}}
{{-- text-white rounded-md shadow-xl"  name="ballot_type" value="Ranked Choice">Select</button>--}}
{{--                    </form>--}}
{{--                    </div>--}}
                </ul>
            </div>
        </div>
  </div>
{{--</div>--}}

@endsection
