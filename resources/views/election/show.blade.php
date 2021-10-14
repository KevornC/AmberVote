@extends('layouts.app')

@section('content')

    <div class="flex flex-col">

        {{-- <div class="w-full flex flex-col max-w-xs"> --}}
        {{-- <div class="w-full my-4"> --}}
        {{-- <a class="bg-blue-600 shadow-md rounded py-1 px-2" href="{{ route('ballots', $election->id) }}">Create --}}
        {{-- Ballot</a> --}}
        {{-- </div> --}}
        {{-- <div> --}}
        {{-- <ul> --}}
        {{-- <li>{{ $election->election_nm }}</li> --}}
        {{-- <li>{{ $election->start_date }}</li> --}}
        {{-- <li>{{ $election->end_date }}</li> --}}
        {{-- <li>{{ $election->desc }}</li> --}}
        {{-- <li>{{ $election->status }}</li> --}}
        {{-- </ul> --}}
        {{-- </div> --}}
        {{-- </div> --}}

        {{-- <div class="bg-gray-200 w-full h-full flex flex-col max-w-x ">
        <div class="mt-10 flex justify-center items-center">


                    <div class="rounded cursor-default p-5">
                    <table class="text-left p-5">
                      <thead class="bg-blue-600 ">
                      <tr>
                          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Name:</th>
                          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Start date:</th>
                          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">End date:</th>
                          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Description:</th>
                          <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Status:</th>
                      </tr>
                      </thead>
                        <tbody class="bg-gray-400 ">
                        <tr>
                            <td class="py-4 px-6"> {{ $election->election_nm }}</td>
                            <td class="py-4 px-6">{{ $election->start_date }}</td>
                            <td class="py-4 px-6">{{ $election->end_date }}</td>
                            <td class="py-4 px-6">{{ $election->desc }}</td>
                            <td class="py-4 px-6">{{ $election->status }}</td>
                        </tr>
                        </tbody>
                    </table>
                    </div>
                </div>

        <div class="flex justify-center items-center">
            <a class=" p-2 pl-5 pr-5 bg-blue-600 text-gray-100 rounded-lg focus:border-4 border-blue-300 hover:bg-blue-400 hover:text-gray-100" href="{{ route('ballots', $election->id) }}">
                Create Ballot
            </a> --}}

        <div class="w-full flex flex-col ">

            <div class="w-full my-4">
                <a class="p-2 px-5 bg-blue-600 text-gray-100 text-lg rounded-lg focus:border-4 border-blue-300 hover:bg-blue-400 hover:text-gray-100"
                    href="{{ route('ballots', $election->id) }}">Create
                    Ballot</a>
                <a class="p-2 px-5 bg-blue-600 text-gray-100 text-lg rounded-lg focus:border-4 border-blue-300 hover:bg-blue-400 hover:text-gray-100"
                    href="{{ route('voter.create', $election->id) }}">Add Voters</a>
                <a class="p-2 px-5 bg-blue-600 text-gray-100 text-lg rounded-lg focus:border-4 border-blue-300 hover:bg-blue-400 hover:text-gray-100"
                    href="{{ route('ViewVoterIndex') }}">View Voters</a>
            </div>

            <div class="flex my-12 m-auto">
                <div class="flex mr-12">
                    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8">
                        <ul>
                            <li class="text-lg font-bold my-4">{{ $election->election_nm }}</li>
                            <li class="my-2">
                                <span class="font-semibold">Start Date:
                                </span>{{ $election->start_date }}
                            </li>
                            <li class="my-2">
                                <span class="font-semibold">End Date:
                                </span>{{ $election->end_date }}
                            </li>
                            <li class="my-2">
                                <span class="font-semibold">Description:
                                </span>{{ $election->desc }}
                            </li>
                            <li class="my-2">
                                <span class="font-semibold">Election Status:
                                </span>{{ $election->status }}
                            </li>
                        </ul>
                    </div>
                </div>

                <div>
                    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8">
                        <ul>
                            <li class="text-lg font-bold my-4">Ballot</li>
                            <li class="my-2">
                                <span class="font-semibold">Ballot Type:
                                </span>{{ $ballot->ballot_type }}
                            </li>
                            <li class="my-2">
                                <span class="font-semibold">Description:
                                </span>{{ $ballot->desc }}
                            </li>
                            <li class="my-2">
                                <span class="font-semibold">Date Created:
                                </span>{{ $ballot->created_at }}
                            </li>
                        </ul>
                        <div class="mt-8">
                            <a class="p-2 px-5 bg-blue-600 text-gray-100 text-lg rounded-lg focus:border-4 border-blue-300 hover:bg-blue-400 hover:text-gray-100"
                                href="{{ route('ballots', $ballot->id) }}">Add Questions</a>
                        </div>
                    </div>
                </div>
                {{-- <div class="m-auto bg-white shadow-md rounded px-8 pt-6 pb-8 m-4">
            <ul>
                <li class="text-lg font-bold my-4">{{ $election->election_nm }}</li>
                <li class="my-2">
                    <span class="font-semibold">Start Date:
                    </span>{{ $election->start_date }}
                </li>
                <li class="my-2">
                    <span class="font-semibold">End Date:
                    </span>{{ $election->end_date }}
                </li>
                <li class="my-2">
                    <span class="font-semibold">Description:
                    </span>{{ $election->desc }}
                </li>
                <li class="my-2">
                    <span class="font-semibold">Election Status:
                    </span>{{ $election->status }}
                </li>
            </ul>

        </div> --}}
                <div>
                    <a class="
                text-lg font-semibold text-red-500" href="{{ url()->previous() }}"
                        type="submit">
                        {{ '<<< Back' }}
                    </a>
                </div>
            </div>



        @endsection
