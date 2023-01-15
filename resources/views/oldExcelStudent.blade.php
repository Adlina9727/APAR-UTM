<table>
    <tr>    
        <th>No</th>
        <th>Name</th>
        <th>Course</th>
        <th>Program</th>
        <th>Year</th>
        <th>Lecturer</th>
        <th>Session</th>
        <th>Sem</th>
        <th>Section</th>
        <th>IC</th>
        <th>Matric</th>
        <th>PO1</th>
        <th>PO2</th>
        <th>PO3</th>
        <th>PO4</th>
        <th>PO5</th>
        <th>PO6</th>
        <th>PO7</th>
        <th>PO8</th>
        <th>PO9</th>
        <th>P10</th>
        <th></th>
        <th>Type</th>
        <th>Year</th>
        <th></th>
        <th>Cohort</th>
        {{--
        <th>Year of Study (from OBE)</th>
        --}}
        <th>Curriculum Credit</th>
        <th></th>
        <th>Index in students</th>
        <th>Year of Study</th>
        <th>Program</th>
        <th>Year Program</th>
        <th>Semester</th>
    </tr>
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
            <td>{{ $student->no }}</td>
            <td>{{ $student->name }}</td>
            <td>{{ $student->course }}</td>
            <td>{{ $student->program }}</td>
            <td>{{ $student->year }}</td>
            <td>{{ $student->lecturer }}</td>
            <td>{{ $student->session }}</td>
            <td>{{ $student->sem }}</td>
            <td>{{ $student->section }}</td>
            <td>{{ $student->IC }}</td>
            <td>{{ $student->matric }}</td>
            <td>{{ $student->PO1 }}</td>
            <td>{{ $student->PO2 }}</td>
            <td>{{ $student->PO3 }}</td>
            <td>{{ $student->PO4 }}</td>
            <td>{{ $student->PO5 }}</td>
            <td>{{ $student->PO6 }}</td>
            <td>{{ $student->PO7 }}</td>
            <td>{{ $student->PO8 }}</td>
            <td>{{ $student->PO9 }}</td>
            <td>{{ $student->PO10 }}</td>
            <td></td>
            <td>{{ substr($student->matric, 0, 1) }}</td>
            <td>{{ 2000 + (int)substr($student->matric, 1, 2) }}</td>
            <td></td>
            <td>
                @if (substr($student->matric, 0, 1) == 'B')
                    {{ 2000 + (int)substr($student->matric, 1, 2) - 1 }}
                @elseif (substr($student->matric, 0, 1) == 'A')
                    {{ 2000 + (int)substr($student->matric, 1, 2) }}
                @else
                @endif
            </td>
            {{--
            <td></td>
            --}}
            <td>
            {{--
                @if ((int)substr($student->matric, 1, 2) == 16)
                    {{  }}
                @elseif ((int)substr($student->matric, 1, 2) == 17)
                    {{  }}
                @elseif ((int)substr($student->matric, 1, 2) == 18)
                    {{  }}
                @elseif ((int)substr($student->matric, 1, 2) == 19)
                    {{  }}
                @elseif ((int)substr($student->matric, 1, 2) == 20)
                    {{  }}
                @else
                    {{  }}
                @endif
            --}}
            128
            </td>
            <td></td>
            <td>{{ $index }}</td>
            <td>
                @if (substr($student->matric, 0, 1) == 'B')
                    {{ (int)date("Y") - 2000 - (int)substr($student->matric, 1, 2) + 1 }}
                @elseif (substr($student->matric, 0, 1) == 'A')
                    {{ (int)date("Y") - 2000 - (int)substr($student->matric, 1, 2) }}
                @else
                @endif
            </td>
            <td>{{ $student->program }}</td>
            <td>
                @if (substr($student->matric, 0, 1) == 'B')
                    {{ (int)date("Y") - 2000 - (int)substr($student->matric, 1, 2) + 1 }}
                @elseif (substr($student->matric, 0, 1) == 'A')
                    {{ (int)date("Y") - 2000 - (int)substr($student->matric, 1, 2) }}
                @else
                @endif
                 {{ $student->program }}
            </td>
            <td></td>
        </tr>
        @empty
        <tr>
            <td colspan="3">No student.</td>
        </tr>
        @endforelse
    </tbody>
</table>