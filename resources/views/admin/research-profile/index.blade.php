@extends('layouts.app')
@section('content')


<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
<button type="button" data-modal-target="addScholar" data-modal-show="addScholar" class="text-white ml-4 mt-4 bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add New Research profile</button>
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    #
                </th>
                <th scope="col" class="px-6 py-3">
                    Category
                </th>
                <th scope="col" class="px-6 py-3">
                    Country
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
        @foreach($profile as $item)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                {{ $item->id }}
                </th>
                <td class="px-6 py-4">
                {{ $item->category }}
                </td>
                <td class="px-6 py-4">
                {{ $item->country }}
                </td>
                <td class="px-6 py-4">
                <details>
                    <summary>
                    research profile {{ $item->id }}
                    </summary>
                    {!! $item->description !!}                                    
                </details>
                </td>
                <td class="px-6 py-4">
                    <a href="#" data-modal-target="{{ $item->id }}" data-modal-toggle="{{ $item->id }}" class="font-medium text-green-600 dark:text-green-500 hover:underline">Edit</a>
                </td>
            </tr>
            @endforeach 
        </tbody>
    </table>
</div>



<!-- Add New Research profile modal -->
<div id="addScholar" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 items-center justify-center hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
       <div class="relative w-full max-w-2xl max-h-full">
           <!-- Modal content -->
           <form action="{{ url('/admin/research-profile') }}" method='POST'  accept-charset="UTF-8" enctype="multipart/form-data" method="POST" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
           {{ csrf_field() }}
               <!-- Modal header -->
               <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                   <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                       Add New Scholarship
                   </h3>
                   <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="addScholar">
                       <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                   </button>
               </div>
               <!-- Modal body -->
               <div class="p-6 space-y-6">
                   <div class="grid grid-cols-6 gap-6">
                       <div class="col-span-6 sm:col-span-6">  
                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a category</label>
                            <select id="countries" name="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500">
                            <option selected>Choose a category</option>
                            <option value="masters">Masters</option>
                            <option value="phd">Phd</option>
                            </select>
                       </div>
                       <div class="col-span-6 sm:col-span-6">  
                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a country</label>
                            <select id="countries" name="country" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500">
                            <option selected>Choose a country</option>
                            <option value="sudan">South Sudan</option>
                            <option value="uganda">Uganda</option>
                            <option value="tanzania">Tanzania</option>
                            </select>
                       </div>

                       <div class="col-span-6 sm:col-span-6">
                           <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                           <textarea class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"  rows="5" name="description" type="textarea" id="instructions" ></textarea>
                       </div>
                       
                       <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
                        <script>
                            
                        CKEDITOR.replace('article', {
                                filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
                                filebrowserUploadMethod: 'form',
                                "extraPlugins" : 'imagebrowser',
                                "imageBrowser_listUrl" : "/images_list.json"
                            })

                            CKEDITOR.replace('instructions', {
                                filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
                                filebrowserUploadMethod: 'form',
                                "extraPlugins" : 'imagebrowser',
                                "imageBrowser_listUrl" : "/images_list.json"
                            })
                        </script>


                   </div>
               </div>
               <!-- Modal footer -->
               <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                   <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Save all</button>
               </div>
           </form>
       </div>
   </div>
</div>




<!-- Edit scholarships -->
@foreach($profile as $item)
<div id="{{ $item->id }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 items-center justify-center hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
       <div class="relative w-full max-w-2xl max-h-full">
           <!-- Modal content -->
           <form action="{{ url('/admin/research-profile/' . $item->id) }}" method='POST'  accept-charset="UTF-8" enctype="multipart/form-data" method="POST" class="relative bg-white rounded-lg shadow dark:bg-gray-700">
           {{ method_field('PATCH') }}
           {{ csrf_field() }}
               <!-- Modal header -->
               <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                   <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                       Edit Scholarship
                   </h3>
                   <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="{{ $item->id }}">
                       <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                   </button>
               </div>
               <!-- Modal body -->
               <div class="p-6 space-y-6">
                   <div class="grid grid-cols-6 gap-6">
                       <div class="col-span-6 sm:col-span-6">  
                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a category</label>
                            <select id="countries" name="category" value="{{old('category')}}"  class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500">
                            <option value="masters">Masters</option>
                            <option value="phd">Phd</option>
                            </select>
                       </div>
                       <div class="col-span-6 sm:col-span-6">  
                            <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select a country</label>
                            <select id="countries" name="country" value="{{old('country')}}" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500">
                            <option value="sudan">South Sudan</option>
                            <option value="uganda">Uganda</option>
                            <option value="tanzania">Tanzania</option>
                            </select>
                       </div>

                       <div class="col-span-6 sm:col-span-6">
                           <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                           <textarea class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500"  rows="5" name="instructions" type="textarea" id="instructions" >{{ old('description', $item->description) }}</textarea>
                       </div>
                       
                       <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
                        <script>
                            
                        CKEDITOR.replace('article', {
                                filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
                                filebrowserUploadMethod: 'form',
                                "extraPlugins" : 'imagebrowser',
                                "imageBrowser_listUrl" : "/images_list.json"
                            })

                            CKEDITOR.replace('instructions', {
                                filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
                                filebrowserUploadMethod: 'form',
                                "extraPlugins" : 'imagebrowser',
                                "imageBrowser_listUrl" : "/images_list.json"
                            })
                        </script>


                   </div>
               </div>
               <!-- Modal footer -->
               <div class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                   <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Save all</button>
               </div>
           </form>
       </div>
   </div>
</div>
@endforeach


@endsection