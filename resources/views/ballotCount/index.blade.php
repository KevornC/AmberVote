@extends('layouts.app')

@section('content')
    
<!-- component -->
<table class="border-collapse w-full">
    Election Name
    
    <thead>
        <tr>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Question</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Option</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Count</th>
            <th class="p-3 font-bold uppercase bg-gray-200 text-gray-600 border border-gray-300 hidden lg:table-cell">Winner</th>
        </tr>
    </thead>
    <tbody>
     @foreach ($question as $ques)
        <tr class="bg-white lg:hover:bg-gray-100 flex lg:table-row flex-row lg:flex-row flex-wrap lg:flex-no-wrap mb-10 lg:mb-0">
           
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Question</span>
                {{ $ques['question'] }}
            </td>
           
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Option</span>
                 @foreach($ques['ques_opt'] as $quest)
               <span>{{ $quest ['option']}}</span><br>
                
            </td>
            
            
          	<td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">{{ count($quest['answer']) }}</span>
                <span class="rounded bg-red-400 py-1 px-3 text-xs font-bold">deleted</span>
          	</td>
              @endforeach
            <td class="w-full lg:w-auto p-3 text-gray-800 text-center border border-b text-center block lg:table-cell relative lg:static">
                <span class="lg:hidden absolute top-0 left-0 bg-blue-200 px-2 py-1 text-xs font-bold uppercase">Winner</span>
                <a href="#" class="text-blue-400 hover:text-blue-600 underline">Edit</a>
                <a href="#" class="text-blue-400 hover:text-blue-600 underline pl-6">Remove</a>
            </td>
        </tr>
       
        @endforeach
    </tbody>
</table>
@endsection