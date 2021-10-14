@extends('layouts.app')

@section('content')

{{--    <div class="flex flex-col w-full max-w-xs">--}}
{{--        <div class="w-full my-4">--}}
{{--            <a class="px-2 py-1 bg-blue-600 rounded shadow-md" href="{{ route('AddElection') }}">Create Election</a>--}}
{{--        </div>--}}
{{--        <div>--}}
{{--            <table>--}}
{{--                <tr>--}}
{{--                    <th>Election Name</th>--}}
{{--                </tr>--}}
{{--                @forelse ($elections as $election)--}}
{{--                    <tr>--}}
{{--                        <td>--}}
{{--                            <a href="{{ route('election.show', $election->id) }}">--}}
{{--                                {{ $election->election_nm }}--}}
{{--                            </a>--}}
{{--                        </td>--}}
{{--                    </tr>--}}
{{--                @empty--}}
{{--                    <tr>--}}
{{--                        <td>No elections created</td>--}}
{{--                    </tr>--}}
{{--                @endforelse--}}
{{--            </table>--}}
{{--        </div>--}}
{{--    </div>--}}



    <!-- component that Lewis did
    <div class="h-full px-10 py-10 bg-gray-200 ">
        <div class="flex items-center justify-center pb-5">
            <a class="p-2 pl-5 pr-5 text-gray-100 bg-blue-600 border-blue-300 rounded-lg focus:border-4 hover:bg-blue-400 hover:text-gray-100" href="{{ route('AddElection') }}">
                Create an election
            </a>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-4 lg:grid-cols-4 md:gap-x-8 xl-grid-cols-4 gap-y-8 gap-x-4">
            <!-- Card 1
            @forelse ($elections as $election)
            <div class="p-2 ">
                <div class="container px-8 py-10 mx-auto text-center bg-white rounded-lg shadow-lg ">
                    <h2 class="mb-4 text-xl font-medium text-center text-gray-700">{{ $election->election_nm }}</h2>
                    <span class="block text-gray-500 ">Created: {{$election->created_at}}</span>
                    <a href="{{ route('election.show', $election->id)}}" class="flex items-center justify-center px-4 py-2 mt-5 text-white bg-blue-600 rounded-full hover:bg-blue-500"> See details... </a>
                </div>
            </div>
            @empty
                <p class="mb-3 font-normal text-gray-700">No election created.</p>
            @endforelse
 -->

    <div class="flex flex-col w-full">
        <div class="w-full my-4">
            <a class="p-2 pl-5 pr-5 text-lg text-gray-100 bg-blue-600 border-blue-300 rounded-lg focus:border-4 hover:bg-blue-400 hover:text-gray-100"
                href="{{ route('AddElection') }}">Create Election</a>
        </div>
        <div class="w-full">
            <section class="text-gray-600 ">
                <div class="container px-5 py-24 mx-auto">
                    <div class="w-full mx-auto overflow-auto lg:w-2/3">
                        <table class="w-full text-left whitespace-no-wrap table-auto">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 text-sm font-medium tracking-widest text-gray-500 title-font">
                                        Election Name</th>
                                    <th class="px-4 py-2 text-sm font-medium tracking-widest text-gray-500 title-font">
                                        Election Status</th>
                                    <th
                                        class="px-4 py-2 text-sm font-medium tracking-widest text-center text-gray-500 title-font">
                                        Option</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($elections as $election)
                                    <tr class="items-center border border-blue-100">
                                        <td class="px-4 py-2 text-black bg-gray-50">
                                            <a class="text-blue-600" href="{{ route('election.show', $election->id) }}">
                                                {{ $election->election_nm }}
                                            </a>
                                        </td>
                                        <td class="px-4 py-2 text-black bg-gray-50">
                                            <span>{{ $election->status }}</span>
                                        </td>
                                        <td class="px-4 py-2 bg-gray-50">
                                            <div class="flex">
                                                <a class="px-4 py-2 mx-auto text-base font-medium text-green-600 transition duration-500 ease-in-out transform bg-green-100 rounded-lg hover:bg-green-300 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2"
                                                    href="{{ route('election.show', $election->id) }}">View</a>
                                                <a class="px-4 py-2 mx-auto text-base font-medium text-blue-600 transition duration-500 ease-in-out transform bg-blue-100 rounded-lg hover:bg-blue-300 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2"
                                                    href="{{ route('election.edit', $election->id) }}">Edit</a>
                                                <form action="{{ route('election.destroy', $election->id) }}"
                                                    method="post">
                                                    @csrf
                                                    <button role="button"
                                                        class="px-4 py-2 mx-auto text-base font-medium text-red-600 transition duration-500 ease-in-out transform bg-red-100 rounded-lg hover:bg-red-300 focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td>No elections created</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </section>

        </div>
    </div>





@endsection
