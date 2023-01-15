<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Files') }}
        </h2>
    </x-slot>

<div class="container mx-auto overflow-auto">
  <div class="table-auto m-6">
    <form method="post" action="{{ route('exportMerge') }}">
        @csrf
    <div>
      <table class="w-full">
        <tr>
          <td class="border-b border-tableSeparator py-2 px-4 text-sm" ><input id="selectAll" type="checkbox"></td>
          <td class="border-b border-tableSeparator py-2 px-4 text-sm">Title</td>
          <td class="border-b border-tableSeparator py-2 px-2 text-sm">Time Uploaded</td>
          <td class="border-b border-tableSeparator py-2 px-2 text-xs">
          </td>
          <td class="border-b border-tableSeparator py-2 px-2 text-xs">
          </td>
        </tr>

        @forelse ($files as $file)
        <tr>
          <td class="border-b border-tableSeparator py-2 px-4"><input type="checkbox" class="cbs" name="files[]" value="{{$file->id}}"></td>
          <td class="border-b border-tableSeparator py-2 px-4 text-sm">{{ $file->name }}</td>
          <td class="border-b border-tableSeparator py-2 px-2 text-sm">{{ $file->updated_at }}</td>
          <td class="border-b border-tableSeparator py-2 px-2">
            <a href="{{ route('show', $file) }}">
                <i class="fas fa-search"></i>
            </a>
          </td>
          <td class="border-b border-tableSeparator py-2 px-2">
            <a href="{{ route('export', $file) }}">
                <i class="fas fa-file-download"></i>
            </a>
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="4">Nothing uploaded.</td>
        </tr>
        @endforelse
        <tr>
          <td class="py-2 px-4">
            {{--
            <a href="{{ route('createForm') }}">
                <i class="fas fa-plus"></i>
            </a>
            --}}
            <a href="#" id="uploadFileButton" class="cursor-pointer">
                <i class="fas fa-plus"></i>
            </a>
        </td>
        </tr>
      </table>
    </div>
      <div id="selected-function" class="hidden flex justify-center w-1/3 px-10 items-center mx-auto">
        <label class="px-2 py-2 border rounded border-black cursor-pointer">
          <button type="submit" class="">Merge Download Selected File</button>
        </label>
      </div>
    </form>
  </div>
</div>
<div class="fixed w-full h-full top-0 left-0 right-0 bottom-0 bg-gray-500 bg-opacity-75 hidden" id="upload-file">
  <form action="{{ route('fileUpload') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="absolute flex flex-col justify-center  top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-4/5 h-2/5 bg-gray-300 shadow-lg rounded-3xl px-5">
      <span class="font-bold text-4xl text-left text-gray-700">Upload File</span>
      <div class="flex justify-center w-1/3 px-10 items-center mx-auto">
        <label class="px-2 py-2 border rounded border-black cursor-pointer">
          <input name="files[]" id="input-upload-file" class="hidden" type="file" multiple />
          <i class="fas fa-file-upload"></i>
          Select File(s)
        </label>
      </div>
      <div class="justify-center w-1/3 px-10 items-center mx-auto">
        File(s) selected : <span class="" id="file-selected"></span>
      </div>
      <div class="flex w-full mt-16">
        <input type="submit" class="bg-gray-700 w-1/2 rounded px-4 py-1 text-white mr-1" value="Upload">
        <button type="button" id="cancelUpload" class="bg-gray-700 w-1/2 rounded px-4 py-1 text-white ml-1">Cancel</button>
      </div>
      
    </div>
  </form>
</div>
</x-app-layout>
