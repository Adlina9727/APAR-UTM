<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Student Programme Learning Outcome Preview') }}
        </h2>
    </x-slot>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- <div class="overflow-x-auto"> --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    {{-- <table class="border-collapse border divide-y divide-gray-200">
    <table class="border-collapse border divide-y divide-gray-200"> --}}
    <div class="row">
        <div class="card">
            <div class="overflow-scroll">
                <table class="table table-responsive">

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
                        </tr>
                    </thead>
                    <tbody>
                        @php($i = 1)
                        @foreach ($students as $student)
                            @if (isset($student->file))
                                @if ($student->file->user_id == Auth()->id())
                                    <tr>
                                        <td class="border text-center">
                                            {{ $i++ }}
                                        </td>
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
                                            @if ($student->PO1 != 0.0)
                                                {{ $student->PO1 }}
                                            @endif
                                        </td>
                                        <td class="border text-center">
                                            @if ($student->PO2 != 0.0)
                                                {{ $student->PO2 }}
                                            @endif
                                        </td>
                                        <td class="border text-center">
                                            @if ($student->PO3 != 0.0)
                                                {{ $student->PO3 }}
                                            @endif
                                        </td>
                                        <td class="border text-center">
                                            @if ($student->PO4 != 0.0)
                                                {{ $student->PO4 }}
                                            @endif
                                        </td>
                                        <td class="border text-center">
                                            @if ($student->PO5 != 0.0)
                                                {{ $student->PO5 }}
                                            @endif
                                        </td>
                                        <td class="border text-center">
                                            @if ($student->PO6 != 0.0)
                                                {{ $student->PO6 }}
                                            @endif
                                        </td>
                                        <td class="border text-center">
                                            @if ($student->PO7 != 0.0)
                                                {{ $student->PO7 }}
                                            @endif
                                        </td>
                                        <td class="border text-center">
                                            @if ($student->PO8 != 0.0)
                                                {{ $student->PO8 }}
                                            @endif
                                        </td>
                                        <td class="border text-center">
                                            @if ($student->PO9 != 0.0)
                                                {{ $student->PO9 }}
                                            @endif
                                        </td>
                                        <td class="border text-center">
                                            @if ($student->PO10 != 0.0)
                                                {{ $student->PO10 }}
                                            @endif
                                        </td>

                                    </tr>
                                @endif
                            @endif
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="card">
                {!! $students->links() !!}
            </div>
        </div>
    </div>

</x-app-layout>
