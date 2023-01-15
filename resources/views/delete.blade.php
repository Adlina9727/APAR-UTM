<x-app-layout>
    <x-slot name="header">
        <h2 class="font-bold text-xl text-red-600 leading-tight">
            {{ __('Delete Files') }}
        </h2>
    </x-slot>

<div class="container mx-auto overflow-auto">
  <div class="table-auto m-6">
    <form method="post" action="{{ route('postDelete') }}">
        @csrf
    <div>
      <table class="w-full">
        <tr>
          <td class="border-b border-tableSeparator py-2 px-4 text-sm" ><input id="selectAll" type="checkbox"></td>
          <td class="border-b border-tableSeparator py-2 px-4 text-sm">Title</td>
          <td class="border-b border-tableSeparator py-2 px-2 text-sm">Time Uploaded</td>
        </tr>

        @forelse ($files as $file)
        <tr>
          <td class="border-b border-tableSeparator py-2 px-4"><input type="checkbox" class="cbs" name="files[]" value="{{$file->id}}"></td>
          <td class="border-b border-tableSeparator py-2 px-4 text-sm">{{ $file->name }}</td>
          <td class="border-b border-tableSeparator py-2 px-2 text-sm">{{ $file->updated_at }}</td>
        @empty
        <tr>
          <td colspan="4">Nothing uploaded.</td>
        </tr>
        @endforelse
      </table>
    </div>
      <div id="selected-function" class="hidden py-6 flex justify-center w-1/3 px-10 items-center mx-auto">
        <label class="px-2 py-2 border rounded border-red-600 cursor-pointer">
          <button type="submit" class="text-bold text-red-600">Delete Selected</button>
        </label>
      </div>
    </form>
  </div>
</div>
</x-app-layout>
