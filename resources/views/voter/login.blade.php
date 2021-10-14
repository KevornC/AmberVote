@extends('layouts.app')

@section('content')


    <section class="text-blueGray-700 ">
        <div class="container items-center px-5 py-12 lg:px-20">
            <div
                class="flex flex-col w-full p-10 mx-auto my-6 transition duration-500 ease-in-out transform bg-white border rounded-lg lg:w-2/6 md:w-1/2 md:mt-0">
                <form action="{{ route('voter.auth') }}" method="post">
                    @csrf
                    <div class="relative mt-4">
                        <label for="name" class=" sr-only text-base leading-7 text-blueGray-500">Voter ID</label>
                        <input type="text" id="name" name="unique_id" placeholder="Voter ID"
                            class="w-full px-4 py-2 mt-2 text-base text-black transition duration-500 ease-in-out transform border-transparent rounded-lg bg-blueGray-100 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
                    </div>
                    <div class="relative mt-4">
                        <label for="name" class=" sr-only text-base leading-7 text-blueGray-500">Voter Password</label>
                        <input type="password" id="password" name="unique_key" placeholder="Voter Password"
                            class="w-full px-4 py-2 mt-2 text-base text-black transition duration-500 ease-in-out transform border-transparent rounded-lg bg-blueGray-100 focus:border-blueGray-500 focus:bg-white focus:outline-none focus:shadow-outline focus:ring-2 ring-offset-current ring-offset-2">
                    </div>
                    {{-- <div class="flex my-6">
                    <label class="flex items-center">
                        <input type="checkbox" class="form-checkbox ">
                        <span class="ml-2 text-blueGray-500">Subscribe me </span>
                    </label>
                </div> --}}
                    <button
                        class="w-full px-16 py-2 my-2 mr-2 text-base text-white transition duration-500 ease-in-out transform bg-blue-600 border-blue-600 rounded-md focus:shadow-outline focus:outline-none focus:ring-2 ring-offset-current ring-offset-2 hover:bg-blue-800 ">
                        Sign In </button>
                </form>
            </div>
        </div>
    </section>

@endsection
