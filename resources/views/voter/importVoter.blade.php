@extends('layouts.app')

@section('content')
    <div>
        <h1 class="w-full p-10 text-4xl text-center text-gray-600"> Add Voter</h1>
        @if (Session()->has('Success'))
            <div class="p-10 text-2xl text-center text-gray-200 bg-blue-400">
                <p>{{ Session('Success') }}</p>
            </div>
        @endif
        <form action="{{ route('import.voters') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="p-6 mt-10 bg-white rounded-lg shadow">
                <div class="flex flex-col">

                    <div class="hidden">
                        <input type="hidden" value="{{ $election_id }}" name="election_id">
                    </div>
                    <div
                        class="relative p-1 transition-all duration-500 border rounded focus-within:border-blue-500 focus-within:text-blue-500">
                        <div class="absolute px-1 -mt-4 text-xs tracking-wider uppercase">
                            <p>
                                <label for="v_file" class="px-1 text-gray-600 bg-white">Import Voters List File <span
                                        class="text-sm text-gray-600">(.csv)</span>
                                </label>
                            </p>

                        </div>
                        <p>
                            <input id="v_file" autocomplete="false" tabindex="0" placeholder="e.g. John Brown" type="file"
                                name="v_file" value="{{ old('v_file') }}"
                                class="@error('v_file') border-red-700 @enderror block w-full h-full px-1 py-1 text-gray-900 outline-none">
                        </p>
                        @error('v_file')
                            <div class="mt-2 text-sm text-red-700">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="flex justify-center pt-3 mt-6 border-t">
                        <button type="submit"
                            class="px-3 py-1 text-gray-100 transition-all duration-300 bg-blue-500 rounded hover:shadow-inner hover:bg-blue-700">
                            Submit
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
