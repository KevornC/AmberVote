@extends('layouts.app')

@section('content')
    <div>
        <h1 class="w-full p-10 text-4xl text-center text-gray-600"> Add Voter</h1>
        @if (Session()->has('Success'))
            <div class="p-10 text-2xl text-center text-gray-200 bg-blue-400">
                <p>{{ Session('Success') }}</p>
            </div>
        @endif
        <div>
            <a class="p-2 px-5 bg-blue-600 text-gray-100 text-lg rounded-lg focus:border-4 border-blue-300 hover:bg-blue-400 hover:text-gray-100"
                href="{{ route('import.voters.form', $election_id) }}">Import Voters</a>
        </div>
        <form action="{{ Route('AddVoterIndex') }}" method="post">
            @csrf
            <div class="p-6 mt-10 bg-white rounded-lg shadow">
                <div class="grid gap-6 lg:grid-cols-2">

                    <div class="hidden">
                        <input type="hidden" value="{{ $election_id }}" name="election_id">
                    </div>
                    <div
                        class="relative p-1 transition-all duration-500 border rounded focus-within:border-blue-500 focus-within:text-blue-500">
                        <div class="absolute px-1 -mt-4 text-xs tracking-wider uppercase">
                            <p>
                                <label for="voter_nm" class="px-1 text-gray-600 bg-white">Voter's name *</label>
                            </p>

                        </div>
                        <p>
                            <input id="voter_nm" autocomplete="false" tabindex="0" placeholder="e.g. John Brown" type="text"
                                name="voter_nm" value="{{ old('voter_nm') }}"
                                class="@error('voter_nm') border-red-700 @enderror block w-full h-full px-1 py-1 text-gray-900 outline-none">
                        </p>
                        @error('voter_nm')
                            <div class="mt-2 text-sm text-red-700">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div
                        class="relative p-1 transition-all duration-500 border rounded focus-within:border-blue-500 focus-within:text-blue-500">
                        <div class="absolute px-1 -mt-4 text-xs tracking-wider uppercase">
                            <p>
                                <label for="email" class="px-1 text-gray-600 bg-white">Email *</label>
                            </p>
                        </div>
                        <p>
                            <input id="email" autocomplete="false" tabindex="0" type="email"
                                placeholder="Example123@gmail.com" name="email" value="{{ old('email') }}"
                                class="block w-full h-full px-1 py-1 outline-none">
                        </p>
                        @error('email')
                            <div class="mt-2 text-sm text-red-700">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div
                        class="relative p-1 transition-all duration-500 border rounded focus-within:border-blue-500 focus-within:text-blue-500">
                        <div class="absolute px-1 -mt-4 text-xs tracking-wider uppercase">
                            <p>
                                <label for="valid_id" class="px-1 text-gray-600 bg-white">valid ID </label>
                            </p>
                        </div>
                        <p>
                            <input id="valid_id" autocomplete="false" tabindex="0" type="text" placeholder="123817"
                                name="valid_id" value="{{ old('valid_id') }}"
                                class="block w-full h-full px-1 py-1 outline-none">
                        </p>
                        @error('valid_id')
                            <div class="mt-2 text-sm text-red-700">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div
                        class="relative p-1 transition-all duration-500 border rounded focus-within:border-blue-500 focus-within:text-blue-500">
                        <div class="absolute px-1 -mt-4 text-xs tracking-wider uppercase">
                            <p>
                                <label for="phone_num" class="px-1 text-gray-600 bg-white">Phone Number *</label>
                            </p>
                        </div>
                        <p>
                            <input id="phone_num" autocomplete="false" tabindex="0" placeholder="876-111-1111"
                                type="telephone" name="phone_num" value="{{ old('phone_num') }}"
                                class="block w-full h-full px-1 py-1 text-gray-900 outline-none">
                        </p>
                        @error('phone_num')
                            <div class="mt-2 text-sm text-red-700">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>

                <div class="flex justify-center pt-3 mt-6 border-t">
                    <button type="submit"
                        class="px-3 py-1 text-gray-100 transition-all duration-300 bg-blue-500 rounded hover:shadow-inner hover:bg-blue-700">
                        Save
                    </button>
                    <a href="{{ url()->previous() }}" type="submit"
                        class="px-3 py-1 text-gray-100 transition-all duration-300 bg-red-500 rounded hover:shadow-inner hover:bg-red-700">
                        Cancel
                    </a>
                </div>
            </div>
        </form>
    </div>
@endsection
