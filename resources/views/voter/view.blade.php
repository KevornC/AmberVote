@extends('layouts.app')

@section('content')
    <div
        class="inline-block w-full px-8 pt-3 overflow-hidden align-middle bg-white rounded-bl-lg rounded-br-lg shadow shadow-dashboard">
        
        <div class="w-full my-4">
            <a class="p-2 px-5 text-lg text-gray-100 bg-blue-600 border-blue-300 rounded-lg focus:border-4 hover:bg-blue-400 hover:text-gray-100"
                href="{{ route('Election.Index') }}">
                Election Listing</a>
        </div>
        <h1 class="p-6 text-3xl text-center text-gray-100 bg-blue-400 ">Voters Listing</h1>
        @if (Session()->has('Success'))
            <div class="p-10 text-2xl text-center text-gray-200 bg-red-400">
                <p>{{ Session('Success') }}</p>
            </div>
        @endif
        <table class="min-w-full">
            <thead>
                <tr>
                    <th
                        class="px-6 py-3 leading-4 tracking-wider text-left text-blue-500 border-b-2 border-gray-300 ">
                        Voter
                        Name</th>
                    <th
                        class="px-6 py-3 text-sm leading-4 tracking-wider text-left text-blue-500 border-b-2 border-gray-300">
                        Email</th>
                    <th
                        class="px-6 py-3 text-sm leading-4 tracking-wider text-left text-blue-500 border-b-2 border-gray-300">
                        Valid ID</th>
                    <th
                        class="px-6 py-3 text-sm leading-4 tracking-wider text-left text-blue-500 border-b-2 border-gray-300">
                        Phone Number</th>
                    <th class="px-6 py-3 border-b-2 border-gray-300">Action</th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach ($voters as $voter)
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class="flex items-center">
                                <div>
                                    <div class="text-sm leading-5 text-gray-800">{{ $voter->voter_nm }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class="text-sm leading-5 text-blue-900">{{ $voter->email }}</div>
                        </td>
                        <td class="px-6 py-4 text-sm leading-5 text-blue-900 whitespace-no-wrap border-b border-gray-500">
                            {{ $voter->valid_id }}</td>
                        <td class="px-6 py-4 text-sm leading-5 text-blue-900 whitespace-no-wrap border-b border-gray-500">
                            {{ $voter->phone_num }}</td>
                        <td class="px-6 py-4 text-sm leading-5 text-right whitespace-no-wrap border-b border-gray-500">
                            <button
                                class="px-5 py-2 text-blue-500 transition duration-300 border border-blue-500 rounded hover:bg-blue-700 hover:text-white focus:outline-none"><a
                                    href="{{ url('/Edit/Election/Voter' . $voter->id) }}">Edit</a></button>
                            <button
                                class="px-5 py-2 text-blue-500 transition duration-300 border border-blue-500 rounded hover:bg-blue-700 hover:text-white focus:outline-none"><a
                                    href="{{ url('/Delete/Election/Voter' . $voter->id) }}">Delete</a></button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="mt-4 sm:flex-1 sm:flex sm:items-center sm:justify-between work-sans">
        </div>
    </div>

@endsection
