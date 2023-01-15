<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Excel Preview') }}
      </h2>
  </x-slot>
  <div class="overflow-x-auto">

  <table class="border-collapse border divide-y divide-gray-200">
      <thead>
        <tr>
            <th class="border">No</th>
            <th class="border">Name</th>
            <th class="border">Course</th>
            <th class="border">Program</th>
            <th class="border">Year</th>
            <th class="border">Lecturer</th>
            <th class="border">Session</th>
            <th class="border">Sem</th>
            <th class="border">Section</th>
            <th class="border">IC</th>
            <th class="border">Matric</th>
            <th class="border">PO1</th>
            <th class="border">PO2</th>
            <th class="border">PO3</th>
            <th class="border">PO4</th>
            <th class="border">PO5</th>
            <th class="border">PO6</th>
            <th class="border">PO7</th>
            <th class="border">PO8</th>
            <th class="border">PO9</th>
            <th class="border">P10</th>
            <th class="border"></th>
            <th class="border">Menu Year</th>
            <th class="border">Menu Sem</th>
            <th class="border"></th>
            <th class="border">Cohort</th>
            <th class="border">Intake</th>
            <th class="border">Status</th>
        </tr>
      </thead>
      <tbody>
          @forelse ($students as $student)
          <tr>
              <td class="border text-center">{{ $student->no }}</td>
              <td class="border">{{ $student->name }}</td>
              <td class="border text-center">{{ $student->course }}</td>
              <td class="border text-center">{{ $student->program }}</td>
              <td class="border text-center">{{ $student->year }}</td>
              <td class="border">{{ $student->lecturer }}</td>
              <td class="border text-center">{{ $student->session }}</td>
              <td class="border text-center">{{ $student->sem }}</td>
              <td class="border text-center">{{ $student->section }}</td>
              <td class="border text-center">{{ $student->IC }}</td>
              <td class="border text-center">{{ $student->matric }}</td>
              <td class="border text-center">
                @if ($student->PO1 != 0.00)
                  {{ $student->PO1 }}
                @endif
              </td>
              <td class="border text-center">
                @if ($student->PO2 != 0.00)
                  {{ $student->PO2 }}
                @endif
              </td>
              <td class="border text-center">
                @if ($student->PO3 != 0.00)
                  {{ $student->PO3 }}
                @endif
              </td>
              <td class="border text-center">
                @if ($student->PO4 != 0.00)
                  {{ $student->PO4 }}
                @endif
              </td>
              <td class="border text-center">
                @if ($student->PO5 != 0.00)
                  {{ $student->PO5 }}
                @endif
              </td>
              <td class="border text-center">
                @if ($student->PO6 != 0.00)
                  {{ $student->PO6 }}
                @endif
              </td>
              <td class="border text-center">
                @if ($student->PO7 != 0.00)
                  {{ $student->PO7 }}
                @endif
              </td>
              <td class="border text-center">
                @if ($student->PO8 != 0.00)
                  {{ $student->PO8 }}
                @endif
              </td>
              <td class="border text-center">
                @if ($student->PO9 != 0.00)
                  {{ $student->PO9 }}
                @endif
              </td>
              <td class="border text-center">
                @if ($student->PO10 != 0.00)
                  {{ $student->PO10 }}
                @endif
              </td>
              <td class="border"></td>
              <td class="border"></td>
              <td class="border"></td>
              <td class="border"></td>
              <td class="border"></td>
              <td class="border"></td>
              <td class="border"></td>
          </tr>
          @empty
          <tr>
              <td colspan="3">No student.</td>
          </tr>
          @endforelse
      </tbody>
  </table>
  </div>
</x-app-layout>
