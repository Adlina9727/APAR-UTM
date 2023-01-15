<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Images') }}
        </h2>
    </x-slot>

    <div class="container mx-auto overflow-auto">
      <div class="table-auto m-6">
        <form method="post" action="{{ route('postImageDelete') }}">
            @csrf
        <div>
          <table class="w-full">
            <tr>
              <td class="border-b border-tableSeparator py-2 px-4 text-sm" ><input id="selectAll" type="checkbox"></td>
              <td class="border-b border-tableSeparator py-2 px-4 text-sm">Title</td>
              <td class="border-b border-tableSeparator py-2 px-4 text-sm">Image</td>
              <td class="border-b border-tableSeparator py-2 px-2 text-sm">Time Uploaded</td>
            </tr>

            @forelse ($images as $image)
            <tr>
              <td class="border-b border-tableSeparator py-2 px-4"><input type="checkbox" class="cbs" name="images[]" value="{{$image->id}}"></td>
              <td class="border-b border-tableSeparator py-2 px-4 text-sm">{{ $image->name }}</td>
              <td class="border-b border-tableSeparator py-2 px-4 text-sm">
                <img src="{{ asset($image->image_path) }}" width="200" height="200">
              </td>
              <td class="border-b border-tableSeparator py-2 px-2 text-sm">{{ $image->updated_at }}</td>
            </tr>
            @empty
            <tr>
              <td colspan="4">Nothing uploaded.</td>
            </tr>
            @endforelse
            <tr>
              <td class="py-2 px-4">
                {{-- <a href="#" id="uploadFileButton" class="cursor-pointer"> --}}
                <a href="#" id="uploadImageButton" class="cursor-pointer">
                    <i class="fas fa-plus"></i>
                </a>
            </td>
            </tr>
          </table>
        </div>
          <div id="selected-function" class="hidden flex justify-center w-1/3 px-10 items-center mx-auto">
            <label class="px-2 py-2 border rounded border-red-600 cursor-pointer">
              <button type="submit" class="text-bold text-red-600">Deleted Selected File</button>
            </label>
          </div>
        </form>
      </div>
    </div>
    <div class="fixed w-full h-full top-0 left-0 right-0 bottom-0 bg-gray-500 bg-opacity-75 hidden" id="upload-image">
      <form action="{{ route('imageUpload') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="absolute flex flex-col justify-center  top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-4/5 h-2/5 bg-gray-300 shadow-lg rounded-3xl px-5">
          <span class="font-bold text-4xl text-left text-gray-700">Upload Image</span>
          <div class="flex justify-center w-1/3 px-10 items-center mx-auto">
            <label class="px-2 py-2 border rounded border-black cursor-pointer">
              <input name="files[]" id="input-upload-file" class="hidden" type="file" multiple />
              <i class="fas fa-file-upload"></i>
              Select Image(s)
            </label>
          </div>
          <div class="justify-center w-1/3 px-10 items-center mx-auto">
            Image(s) selected : <span class="" id="file-selected"></span>
          </div>
          <div class="flex w-full mt-16">
            <input type="submit" class="bg-gray-700 w-1/2 rounded px-4 py-1 text-white mr-1" value="Upload">
            <button type="button" id="cancelImageUpload" class="bg-gray-700 w-1/2 rounded px-4 py-1 text-white ml-1">Cancel</button>
          </div>
        </div>
      </form>
    </div>
</x-app-layout>
