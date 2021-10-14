@extends('layouts.app')
@section('title')
    View Ballot Question
@endsection
@section('content')
{{--    <h1 class="bg-gray-100 p-2 text-BLACK font-bold  text-center ">Ballot OPTION</h1>--}}
    {{--    <div class="w-full max-w-xs">--}}
    <div class="bg-white   w-full py-8 px-2 sm:py-10 sm:px-6  lg:px-2">
        <div class="grid grid-cols-3 sm:grid-cols-3  lg:grid-cols-3 xl:grid-cols-3 ">
            <div>
                <form class="bg-white w-11/12 shadow-md rounded px-8 pt-6 pb-8 mb-4" ACTION="{{route('AddBO')}}" method="post" enctype="multipart/form-data">
                    @CSRF
                    <input value="{{$ballot_question_id}}" type="hidden" name="quest_id">
                    <input value="{{$ballot_id}}" type="hidden" name="ballot_id">
                    <div class="mb-4">
                    <label class="py-2 pl-16 font-bold text-gray-700">Create new option</label>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" >
                            Option
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" name="option">
                    </div>


                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" >
                            Photo
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="file" name="photo">
                    </div>

                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2" >
                            Description
                        </label>
                        {{--            <input class="shadow-outlinehadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="desc">--}}
                        <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="desc"></textarea>
                    </div>
                    <div class="flex items-center justify-between">
                        <button class="p-2 pl-5 pr-5 bg-blue-600 text-gray-100 text-lg rounded-lg focus:border-4 border-blue-300 hover:bg-blue-400 hover:text-gray-100" type="Submit"> Submit </button>
                        <button class="p-2 pl-5 pr-5 bg-red-600 text-gray-100 text-lg rounded-lg focus:border-4 border-red-300 hover:bg-red-400 hover:text-gray-100" type="Reset"> Clear </button>
                    </div>
                </form>
                <div class="flex items-center justify-between">
{{--                    <form action="{{route('FinishAddingOptions')}}" method="post">--}}
{{--                        @csrf--}}
{{--                        <input value="{{$ballot_id}}" type="hidden" name="ballot_id">--}}
{{--                        <button class="p-2 pl-5 pr-5 bg-blue-600 text-gray-100 text-lg rounded-lg focus:border-4 border-blue-300 hover:bg-blue-400 hover:text-gray-100" type="Submit"> Finish </button>--}}
{{--                    </form>--}}
                    <a href="{{route('BQ',$ballot_id)}}"><button class="p-2 pl-5 pr-5 bg-blue-600 text-gray-100 text-lg rounded-lg focus:border-4 border-blue-300 hover:bg-blue-400 hover:text-gray-100" >Return to add more question </button></a>
                    <a href="{{route('voter.create',$election_id)}}"><button class="p-2 pl-5 pr-5 bg-blue-600 text-gray-100 text-lg rounded-lg focus:border-4 border-blue-300 hover:bg-blue-400 hover:text-gray-100" >Add Voter </button></a>

                </div>

            </div>

            <div class="col-span-2">
                <table class="w-max-2xl border ">
                    <thead>
                    <tr class="bg-gray-50 border-b">
                        <th class="border-r p-2"></th>
{{--                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">--}}
{{--                            <div class="flex items-center justify-center">--}}
{{--                                Election Question--}}
{{--                            </div>--}}
{{--                        </th>--}}
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                Option
                            </div>
                        </th>
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                Photo
                            </div>
                        </th>
                        <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                Description
                            </div>
                        </th>
                        <th colspan="2" class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                            <div class="flex items-center justify-center">
                                Action
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                </svg>
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($displayBO as $questionoption)
                        <tr  class="bg-gray-100 text-center border-b text-sm text-gray-600">
                            <td class="p-2 border-r">
                                <input type="checkbox">
                            </td>
{{--                            <td class="p-2 border-r">{{$questionoption->ballotQuestion->question}}</td>--}}
                            <td class="p-2 border-r">{{$questionoption->option}}</td>
                            <td class="p-2 border-r"><a href="{{url('/images/'.$questionoption->photo)}}" target="_blank">{{$questionoption->photo}}</a></td>
                            <td class="p-2 border-r">{{$questionoption->opts_desc}}</td>
                            <td>
                                <a href="{{url('dashboard/Edit/BallotOption/'.$questionoption->id)}}" class="bg-green-500 text-white hover:shadow-lg text-xs font-thin rounded py-1.5 px-4">Edit</a>
                            </td>
                            <td>
                                <form action="{{route('DeleteBO')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$questionoption->id}}">
                                    <button class="bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin">Remove</button>
                                </form>
                                {{--                        <a href="{{url('dashboard/Delete/BallotOption/'.$questionoption->id)}}" class="bg-red-500 p-2 text-white hover:shadow-lg text-xs font-thin">Remove</a>--}}
                            </td>
                        </tr>
                    @empty
                        <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                            <td colspan="6" class="p-2 border-r">No options added</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div></div>
@endsection
