@extends('layouts.app')

@section('content')
    <h1 class="w-full p-10 text-4xl text-center text-gray-600"> Add Voter</h1>
    @if (Session()->has('Success'))
        <div class="p-10 text-2xl text-center text-gray-200 bg-blue-400">
            <p>{{ Session('Success') }}</p>
        </div>
    @endif
    <form action="{{ Route('EditVoterIndex') }}" method="post">
        @csrf
        <div class="p-6 mt-10 bg-white rounded-lg shadow">
            <div class="grid gap-6 lg:grid-cols-2">

                <div
                    class="relative p-1 transition-all duration-500 border rounded focus-within:border-blue-500 focus-within:text-blue-500">
                    <div class="absolute px-1 -mt-4 text-xs tracking-wider uppercase">
                        <p>
                            <label for="voter_nm" class="px-1 text-gray-600 bg-white">Voter's name *</label>
                        </p>

                    </div>
                    <p>
                        <input id="voter_nm" autocomplete="false" tabindex="0" placeholder="e.g. John Brown" type="text"
                            name="voter_nm" value="{{ $voter->voter_nm }}"
                            class="@error('voter_nm') border-red-700 @enderror block w-full h-full px-1 py-1 text-gray-900 outline-none">
                        <input id="voter_nm" autocomplete="false" tabindex="0" placeholder="e.g. John Brown" type="hidden"
                            name="id" value="{{ $voter->id }}"
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
                        <input id="email" autocomplete="false" tabindex="0" type="email" placeholder="Example123@gmail.com"
                            name="email" value="{{ $voter->email }}" class="block w-full h-full px-1 py-1 outline-none">
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
                            name="valid_id" value="{{ $voter->valid_id }}"
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
                        <input id="phone_num" autocomplete="false" tabindex="0" placeholder="876-111-1111" type="telephone"
                            value="{{ $voter->phone_num }}" name="phone_num"
                            class="block w-full h-full px-1 py-1 text-gray-900 outline-none">
                    </p>
                    @error('phone_num')
                        <div class="mt-2 text-sm text-red-700">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

                <div
                    class="relative p-1 transition-all duration-500 border rounded focus-within:border-blue-500 focus-within:text-blue-500">
                    <div class="absolute px-1 -mt-4 text-xs tracking-wider uppercase">
                        <p>
                            <label for="unique_id" class="px-1 text-gray-600 bg-white">Unique ID *</label>
                        </p>
                    </div>
                    <p>
                        <input id="unique_id" autocomplete="false" tabindex="0" type="text" placeholder="TO101"
                            name="unique_id" value="{{ $voter->unique_id }}"
                            class="block w-full h-full px-1 py-1 outline-none">
                    </p>
                    @error('unique_id')
                        <div class="mt-2 text-sm text-red-700">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div
                    class="relative p-1 transition-all duration-500 border rounded focus-within:border-blue-500 focus-within:text-blue-500">
                    <div class="absolute px-1 -mt-4 text-xs tracking-wider uppercase">
                        <p>
                            <label for="unique_key" class="px-1 text-gray-600 bg-white">Unique Key *</label>
                        </p>
                    </div>
                    <p>
                        <input id="unique_key" autocomplete="false" tabindex="0" type="text" placeholder="191"
                            name="unique_key" value="{{ $voter->unique_key }}"
                            class="block w-full h-full px-1 py-1 text-gray-900 outline-none">
                    </p>
                    @error('unique_key')
                        <div class="mt-2 text-sm text-red-700">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            </div>

            <div class="flex justify-center pt-3 mt-6 border-t">
                <button type="submit"
                    class="px-3 py-1 text-gray-100 transition-all duration-300 bg-blue-500 rounded hover:shadow-inner hover:bg-blue-700">
                    Update
                </button>
            </div>
        </div>
    </form>
@endsection
