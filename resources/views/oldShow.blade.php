<x-app-layout>
  <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
          {{ __('Excel Preview') }}
      </h2>
  </x-slot>

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
            <th class="border">Type</th>
            <th class="border">Year</th>
            <th class="border"></th>
            <th class="border">Cohort</th>
            <th class="border">Curriculum Credit</th>
            <th class="border"></th>
            <th class="border">Index in students</th>
            <th class="border">Year of Study</th>
            <th class="border">Program</th>
            <th class="border">Year Program</th>
            <th class="border">Semester</th>
        </tr>
      </thead>
      @php
          $index = 0;
          $stud = [
              'matric' => 'asd',
              'index' => 0,
          ];
          $studArray = [];
          array_push($studArray, $stud);
      @endphp
      <tbody>
          @forelse ($students as $student)
          @php
              $ite = 0;
              $index = count($studArray);
              while($ite < count($studArray))
              {
                  if($student->matric == $studArray[$ite]['matric'])
                  {
                      $index = $studArray[$ite]['index'];
                      break;
                  }
                  $ite++;
              }
              if($index == count($studArray))
              {
                  $tempStud = [
                      'matric' => $student->matric,
                      'index' => $index,
                  ];
                  array_push($studArray, $tempStud);
              }
          @endphp
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
              <td class="border text-center">{{ $student->PO1 }}</td>
              <td class="border text-center">{{ $student->PO2 }}</td>
              <td class="border text-center">{{ $student->PO3 }}</td>
              <td class="border text-center">{{ $student->PO4 }}</td>
              <td class="border text-center">{{ $student->PO5 }}</td>
              <td class="border text-center">{{ $student->PO6 }}</td>
              <td class="border text-center">{{ $student->PO7 }}</td>
              <td class="border text-center">{{ $student->PO8 }}</td>
              <td class="border text-center">{{ $student->PO9 }}</td>
              <td class="border text-center">{{ $student->PO10 }}</td>
              <td class="border"></td>
              <td class="border text-center">{{ substr($student->matric, 0, 1) }}</td>
              <td class="border text-center">{{ 2000 + (int)substr($student->matric, 1, 2) }}</td>
              <td class="border"></td>
              <td class="border text-center">
                  @if (substr($student->matric, 0, 1) == 'B')
                      {{ 2000 + (int)substr($student->matric, 1, 2) - 1 }}
                  @elseif (substr($student->matric, 0, 1) == 'A')
                      {{ 2000 + (int)substr($student->matric, 1, 2) }}
                  @endif
              </td>
              <td class="border text-center">128</td>
              <td class="border"></td>
              <td class="border text-center">{{ $index }}</td>
              <td class="border text-center">
                  @if (substr($student->matric, 0, 1) == 'B')
                      {{ (int)date("Y") - 2000 - (int)substr($student->matric, 1, 2) + 1 }}
                  @elseif (substr($student->matric, 0, 1) == 'A')
                      {{ (int)date("Y") - 2000 - (int)substr($student->matric, 1, 2) }}
                  @endif
              </td>
              <td class="border text-center">{{ $student->program }}</td>
              <td class="border text-center">
                  @if (substr($student->matric, 0, 1) == 'B')
                      {{ (int)date("Y") - 2000 - (int)substr($student->matric, 1, 2) + 1 }}
                  @elseif (substr($student->matric, 0, 1) == 'A')
                      {{ (int)date("Y") - 2000 - (int)substr($student->matric, 1, 2) }}
                  @endif
                   {{ $student->program }}
              </td>
              <td class="border text-center"></td>
          </tr>
          @empty
          <tr>
              <td colspan="3">No student.</td>
          </tr>
          @endforelse
      </tbody>
  </table>
</x-app-layout>
