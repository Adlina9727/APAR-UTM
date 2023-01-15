<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Number of Student Data') }}
        </h2>
    </x-slot>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <br>

    <div class="container">
        <div class="overflow-scroll">
            <table class="table table-responsive-center">
                <thead>
                    <tr>
                        <th class="border">No</th>
                        <th class="border text-center">Year</th>
                        <th class="border text-center">Semester</th>
                        <th class="border text-center">Course</th>
                        <th class="border text-center">Course Code</th>
                        <th class="border text-center">Credit Hour</th>
                        <th class="border text-center">Total Student</th>
                        <th class="border text-center">PLO 1</th>
                        <th class="border text-center">PLO 2</th>
                        <th class="border text-center">PLO 3</th>
                        <th class="border text-center">PLO 4</th>
                        <th class="border text-center">PLO 5</th>
                        <th class="border text-center">PLO 6</th>
                        <th class="border text-center">PLO 7</th>
                        <th class="border text-center">PLO 8</th>
                        <th class="border text-center">PLO 9</th>
                        <th class="border text-center">PLO 10</th>

                    </tr>
                </thead>
                <tbody>

                    @php($i = 1)
                    @foreach ($courses as $course1)
                        @if ($course1->students->where('user_id', Auth()->id())->count() > 0)
                            <tr>
                                <td class="border text-center">{{ $i++ }}</td>
                                <td class="border text-center">{{ $course1->year_offer }}</td>
                                <td class="border text-center">{{ $course1->semester_offer }}</td>
                                <td class="border text-center">{{ $course1->course_name }}</td>
                                <td class="border text-center">{{ $course1->course }}</td>
                                <td class="border text-center">{{ $course1->credit_hour }}</td>
                                <td class="border text-center">
                                    {{ $course1->students->where('user_id', Auth()->id())->count() }}</td>
                                <td class="border text-center">
                                    {{ $course1->students->where('user_id', Auth()->id())->where('PO1', '>', 0)->count() }}
                                </td>
                                <td class="border text-center">
                                    {{ $course1->students->where('user_id', Auth()->id())->where('PO2', '>', 0)->count() }}
                                </td>
                                <td class="border text-center">
                                    {{ $course1->students->where('user_id', Auth()->id())->where('PO3', '>', 0)->count() }}
                                </td>
                                <td class="border text-center">
                                    {{ $course1->students->where('user_id', Auth()->id())->where('PO4', '>', 0)->count() }}
                                </td>
                                <td class="border text-center">
                                    {{ $course1->students->where('user_id', Auth()->id())->where('PO5', '>', 0)->count() }}
                                </td>
                                <td class="border text-center">
                                    {{ $course1->students->where('user_id', Auth()->id())->where('PO6', '>', 0)->count() }}
                                </td>
                                <td class="border text-center">
                                    {{ $course1->students->where('user_id', Auth()->id())->where('PO7', '>', 0)->count() }}
                                </td>
                                <td class="border text-center">
                                    {{ $course1->students->where('user_id', Auth()->id())->where('PO8', '>', 0)->count() }}
                                </td>
                                <td class="border text-center">
                                    {{ $course1->students->where('user_id', Auth()->id())->where('PO9', '>', 0)->count() }}
                                </td>
                                <td class="border text-center">
                                    {{ $course1->students->where('user_id', Auth()->id())->where('PO10', '>', 0)->count() }}
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>



</x-app-layout>
