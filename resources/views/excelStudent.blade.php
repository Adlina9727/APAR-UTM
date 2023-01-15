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
        <th>Menu Year</th>
        <th>Menu Sem</th>
        <th></th>
        <th>Cohort</th>
        <th>Intake</th>
        <th>Status</th>
    </tr>
    <tbody>
        @forelse ($students as $student)
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
            <td>
                @if ($student->PO1 != 0.00)
                    {{ $student->PO1 }}
                @endif
            </td>
            <td>
                @if ($student->PO2 != 0.00)
                    {{ $student->PO2 }}
                @endif
            </td>
            <td>
                @if ($student->PO3 != 0.00)
                    {{ $student->PO3 }}
                @endif
            </td>
            <td>
                @if ($student->PO4 != 0.00)
                    {{ $student->PO4 }}
                @endif
            </td>
            <td>
                @if ($student->PO5 != 0.00)
                    {{ $student->PO5 }}
                @endif
            </td>
            <td>
                @if ($student->PO6 != 0.00)
                    {{ $student->PO6 }}
                @endif
            </td>
            <td>
                @if ($student->PO7 != 0.00)
                    {{ $student->PO7 }}
                @endif
            </td>
            <td>
                @if ($student->PO8 != 0.00)
                    {{ $student->PO8 }}
                @endif
            </td>
            <td>
                @if ($student->PO9 != 0.00)
                    {{ $student->PO9 }}
                @endif
            </td>
            <td>
                @if ($student->PO10 != 0.00)
                    {{ $student->PO10 }}
                @endif
            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        @empty
        <tr>
            <td colspan="3">No student.</td>
        </tr>
        @endforelse
    </tbody>
</table>