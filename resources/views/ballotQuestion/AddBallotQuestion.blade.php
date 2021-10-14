@extends('layouts.app')
@section('title')
    Add Ballot Question
@endsection
@section('content')

    @if (session()->has('delete'))
        <div class="flex bg-green-400 text-center rounded-lg p-4 mb-4 text-sm text-green-700" role="alert">
            <div>
                <span class="font-medium">Alert</span> {{ session('delete') }}
            </div>
        </div>
    @endif

    <div class="bg-gray-200 w-full py-8 px-2 sm:py-10 sm:px-6  lg:px-2">
        <div class="grid grid-cols-3 sm:grid-cols-3  lg:grid-cols-3 xl:grid-cols-3 ">
            <div>
                <form class="bg-white w-11/12 shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{ route('AddBQ') }}"
                    method="post">
                    @CSRF
                    <div class="mb-4">
                        <label class="py-2 pl-16 font-bold text-gray-700">Create new question</label>
                    </div>
                    <input type="hidden" value="{{ $ballot_id }}" name="ballot_id">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="question">
                            Question
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="text" name="question">
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Max Response
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="number" name="max_res">
                    </div>

                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Min Response
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            type="number" name="min_res">
                    </div>
                    <div class="mb-6">
                        <label class="block text-gray-700 text-sm font-bold mb-2">
                            Description
                        </label>
                        {{-- <input class="shadow-outlinehadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="desc"> --}}
                        <textarea
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            name="desc"></textarea>
                    </div>
                    <div class="flex items-center justify-between">
                        <button
                            class="p-2 pl-5 pr-5 bg-blue-600 text-gray-100 text-lg rounded-lg focus:border-4 border-blue-300 hover:bg-blue-400 hover:text-gray-100"
                            type="Submit"> Submit </button>
                        <button
                            class="p-2 pl-5 pr-5 bg-red-600 text-gray-100 text-lg rounded-lg focus:border-4 border-red-300 hover:bg-red-400 hover:text-gray-100"
                            type="Reset"> Clear </button>
                    </div>
                </form>
            </div>
            <div class="col-span-2">
                <table class="w-full border ">
                    <thead>
                        <tr class="bg-gray-50 border-b">
                            <th class="border-r p-2"></th>
                            <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                <div class="flex items-center justify-center">
                                    Election Question
                                </div>
                            </th>
                            <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                <div class="flex items-center justify-center">
                                    Min Response
                                </div>
                            </th>
                            <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                <div class="flex items-center justify-center">
                                    Max Response
                                </div>
                            </th>
                            {{-- <th class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                <div class="flex items-center justify-center">
                                    Description
                                </div>
                            </th> --}}
                            <th colspan="3" class="p-2 border-r cursor-pointer text-sm font-thin text-gray-500">
                                <div class="flex items-center justify-center">
                                    Action
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M8 9l4-4 4 4m0 6l-4 4-4-4" />
                                    </svg>
                                </div>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($displayBQ as $question)
                            <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                                <td class="p-2 border-r">
                                    <input type="checkbox">
                                </td>
                                <td class="p-2 border-r">{{ $question->question }}</td>
                                <td class="p-2 border-r">{{ $question->min_res }}</td>
                                <td class="p-2 border-r">{{ $question->max_res }}</td>
                                {{-- <td class="p-2 border-r">{{ $question->desc }}</td> --}}

                                <td>
                                    <a href="{{ route('BO', $question->id) }}"
                                        class="bg-blue-500 text-white hover:shadow-lg text-xs font-thin rounded py-1.5 px-4">Add
                                        Options</a>
                                </td>
                                <td>
                                    <a href="{{ url('dashboard/Edit/BallotQuestion/' . $question->id) }}"
                                        class="bg-green-500 text-white hover:shadow-lg text-xs font-thin rounded py-1.5 px-4">Edit</a>
                                </td>
                                <td>
                                    <a href="{{ url('dashboard/Delete/BallotQuestion/' . $question->id) }}"
                                        class="bg-red-500 text-white hover:shadow-lg text-xs font-thin rounded py-1.5 px-4">Remove</a>
                                </td>
                            </tr>
                        @empty
                            <tr class="bg-gray-100 text-center border-b text-sm text-gray-600">
                                <td colspan="6" class="p-2 border-r">No questions added</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div> {{-- for third gap --}}



@endsection
