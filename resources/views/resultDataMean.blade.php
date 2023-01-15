{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mean of Every PLO') }}
        </h2>
    </x-slot>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <br>
    <div class="overflow-scroll">
        <table class="table table-responsive">
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
                            <td class="border text-center">{{ $course1->students->count() }}</td>
                            <td class="border text-center">
                                @php
                                    $PO1 = 0;
                                    foreach ($course1->students as $student) {
                                        $PO1 += $student->PO1;
                                    }
                                    if (
                                        $course1->students
                                            ->where('user_id', Auth()->id())
                                            ->where('PO1', '>', 0)
                                            ->count() == 0
                                    ) {
                                        $avg1 = 0;
                                    } else {
                                        $avg1 =
                                            $PO1 /
                                            $course1->students
                                                ->where('user_id', Auth()->id())
                                                ->where('PO1', '>', 0)
                                                ->count();
                                    }
                                @endphp
                                {{ number_format($avg1, 2) }}</td>
                            <td class="border text-center">@php
                                $PO2 = 0;
                                foreach ($course1 as $student) {
                                    $PO2 += $student->PO2;
                                }
                                if (
                                    $course1->students
                                        ->where('user_id', Auth()->id())
                                        ->where('PO2', '>', 0)
                                        ->count() == 0
                                ) {
                                    $avg2 = 0;
                                } else {
                                    $avg2 =
                                        $PO2 /
                                        $course1->students
                                            ->where('user_id', Auth()->id())
                                            ->where('PO2', '>', 0)
                                            ->count();
                                }
                            @endphp
                                {{ number_format($avg2, 2) }}</td>
                            <td class="border text-center">@php
                                $PO3 = 0;
                                foreach ($course1->students as $student) {
                                    $PO3 += $student->PO3;
                                }
                                if (
                                    $course1
                                        ->where('user_id', Auth()->id())
                                        ->students->where('PO3', '>', 0)
                                        ->count() == 0
                                ) {
                                    $avg3 = 0;
                                } else {
                                    $avg3 =
                                        $PO3 /
                                        $course1
                                            ->where('user_id', Auth()->id())
                                            ->students->where('PO3', '>', 0)
                                            ->count();
                                }
                            @endphp
                                {{ number_format($avg3, 2) }}</td>
                            </td>
                            <td class="border text-center">@php
                                $PO4 = 0;
                                foreach ($course1->students as $student) {
                                    $PO4 += $student->PO4;
                                }
                                if (
                                    $course1->students
                                        ->where('user_id', Auth()->id())
                                        ->where('PO4', '>', 0)
                                        ->count() == 0
                                ) {
                                    $avg4 = 0;
                                } else {
                                    $avg4 =
                                        $PO4 /
                                        $course1->students
                                            ->where('user_id', Auth()->id())
                                            ->where('PO4', '>', 0)
                                            ->count();
                                }
                            @endphp
                                {{ number_format($avg4, 2) }}</td>
                            <td class="border text-center">@php
                                $PO5 = 0;
                                foreach ($course1->students as $student) {
                                    $PO5 += $student->PO5;
                                }
                                if (
                                    $course1->students
                                        ->where('user_id', Auth()->id())
                                        ->where('PO5', '>', 0)
                                        ->count() == 0
                                ) {
                                    $avg5 = 0;
                                } else {
                                    $avg5 =
                                        $PO5 /
                                        $course1->students
                                            ->where('user_id', Auth()->id())
                                            ->where('PO5', '>', 0)
                                            ->count();
                                }
                            @endphp
                                {{ number_format($avg5, 2) }}</td>
                            <td class="border text-center">@php
                                $PO6 = 0;
                                foreach ($course1->students as $student) {
                                    $PO6 += $student->PO6;
                                }
                                if (
                                    $course1->students
                                        ->where('user_id', Auth()->id())
                                        ->where('PO6', '>', 0)
                                        ->count() == 0
                                ) {
                                    $avg6 = 0;
                                } else {
                                    $avg6 =
                                        $PO6 /
                                        $course1->students
                                            ->where('user_id', Auth()->id())
                                            ->where('PO6', '>', 0)
                                            ->count();
                                }
                            @endphp
                                {{ number_format($avg6, 2) }}</td>
                            <td class="border text-center">@php
                                $PO7 = 0;
                                foreach ($course1->students as $student) {
                                    $PO7 += $student->PO7;
                                }

                                if (
                                    $course1->students
                                        ->where('user_id', Auth()->id())
                                        ->where('PO7', '>', 0)
                                        ->count() == 0
                                ) {
                                    $avg7 = 0;
                                } else {
                                    $avg7 =
                                        $PO7 /
                                        $course1->students
                                            ->where('user_id', Auth()->id())
                                            ->where('PO7', '>', 0)
                                            ->count();
                                }
                            @endphp
                                {{ number_format($avg7, 2) }}</td>
                            <td class="border text-center">@php
                                $PO8 = 0;
                                foreach ($course1->students as $student) {
                                    $PO8 += $student->PO8;
                                }

                                if (
                                    $course1->students
                                        ->where('user_id', Auth()->id())
                                        ->where('PO8', '>', 0)
                                        ->count() == 0
                                ) {
                                    $avg8 = 0;
                                } else {
                                    $avg8 =
                                        $PO8 /
                                        $course1->students
                                            ->where('user_id', Auth()->id())
                                            ->where('PO8', '>', 0)
                                            ->count();
                                }
                            @endphp
                                {{ number_format($avg8, 2) }}</td>
                            <td class="border text-center">@php
                                $PO9 = 0;
                                foreach ($course1->students as $student) {
                                    $PO9 += $student->PO9;
                                }

                                if (
                                    $course1->students
                                        ->where('user_id', Auth()->id())
                                        ->where('PO9', '>', 0)
                                        ->count() == 0
                                ) {
                                    $avg9 = 0;
                                } else {
                                    $avg9 =
                                        $PO9 /
                                        $course1->students
                                            ->where('user_id', Auth()->id())
                                            ->where('PO9', '>', 0)
                                            ->count();
                                }
                            @endphp
                                {{ number_format($avg9, 2) }}</td>
                            <td class="border text-center">@php
                                $PO10 = 0;
                                foreach ($course1->students as $student) {
                                    $PO10 += $student->PO10;
                                }

                                if (
                                    $course1->students
                                        ->where('user_id', Auth()->id())
                                        ->where('PO10', '>', 0)
                                        ->count() == 0
                                ) {
                                    $avg10 = 0;
                                } else {
                                    $avg10 =
                                        $PO10 /
                                        $course1->students
                                            ->where('user_id', Auth()->id())
                                            ->where('PO10', '>', 0)
                                            ->count();
                                }
                            @endphp
                                {{ number_format($avg10, 2) }}</td>
                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>


    </div>


</x-app-layout> --}}

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Mean of Every PLO') }}
        </h2>
    </x-slot>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <div class="overflow-scroll">
        <table class="table table-responsive">
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

                @foreach ($courses as $course1)
                @if ($course1->students->where('user_id', Auth()->id())->count() > 0)
                <tr>
                    <td class="border text-center">

                        {{ 1 }}</td>

                            <td class="border text-center">{{ $course1->year_offer }}</td>
                            <td class="border text-center">{{ $course1->semester_offer }}</td>
                            <td class="border text-center">{{ $course1->course_name }}</td>
                            <td class="border text-center">{{ $course1->course }}</td>
                            <td class="border text-center">{{ $course1->credit_hour }}</td>
                            <td class="border text-center">{{ $course1->students->count() }}</td>
                            <td class="border text-center">
                                @php
                                    $PO1 = 0;
                                    foreach ($course1->students as $student) {
                                        $PO1 += $student->PO1;
                                    }
                                    if (
                                        $course1->students
                                            ->where('user_id', Auth()->id())
                                            ->where('PO1', '>', 0)
                                            ->count() == 0
                                    ) {
                                        $avg1 = 0;
                                    } else {
                                        $avg1 =
                                            $PO1 /
                                            $course1->students
                                                ->where('user_id', Auth()->id())
                                                ->where('PO1', '>', 0)
                                                ->count();
                                    }
                                @endphp
                                {{ number_format($avg1, 2) }}</td>
                            <td class="border text-center">
                                @php
                                    $PO2 = 0;
                                    foreach ($course1->students as $student) {
                                        $PO2 += $student->PO2;
                                    }
                                    if (
                                        $course1->students->where('PO2', '>', 0)->count() == 0
                                    ) {
                                        $avg2 = 0;
                                    } else {
                                        $avg2 =
                                            $PO2 /
                                            $course1->students->where('PO2', '>', 0)->count();
                                    }
                                @endphp
                                {{ number_format($avg2, 2) }}</td>
                            <td class="border text-center">@php
                                $PO3 = 0;
                                foreach ($course1->students as $student) {
                                    $PO3 += $student->PO3;
                                }
                                if ($course1->students->where('PO3', '>', 0)->count() == 0) {
                                    $avg3 = 0;
                                } else {
                                    $avg3 = $PO3 / $course1->students->where('PO3', '>', 0)->count();
                                }
                            @endphp
                                {{ number_format($avg3, 2) }}</td>
                            </td>
                            <td class="border text-center">@php
                                $PO4 = 0;
                                foreach ($course1->students as $student) {
                                    $PO4 += $student->PO4;
                                }
                                if (
                                    $course1->students->where('PO4', '>', 0)->count() == 0
                                ) {
                                    $avg4 = 0;
                                } else {
                                    $avg4 =
                                        $PO4 /
                                        $course1->students->where('PO4', '>', 0)->count();
                                }
                            @endphp
                                {{ number_format($avg4, 2) }}</td>
                            <td class="border text-center">@php
                                $PO5 = 0;
                                foreach ($course1->students as $student) {
                                    $PO5 += $student->PO5;
                                }
                                if (
                                    $course1->students->where('PO5', '>', 0)->count() == 0
                                ) {
                                    $avg5 = 0;
                                } else {
                                    $avg5 =
                                        $PO5 /
                                        $course1->students->where('PO5', '>', 0)->count();
                                }
                            @endphp
                                {{ number_format($avg5, 2) }}</td>
                            <td class="border text-center">@php
                                $PO6 = 0;
                                foreach ($course1->students as $student) {
                                    $PO6 += $student->PO6;
                                }
                                if (
                                    $course1->students->where('PO6', '>', 0)->count() == 0
                                ) {
                                    $avg6 = 0;
                                } else {
                                    $avg6 =
                                        $PO6 /
                                        $course1->students->where('PO6', '>', 0)->count();
                                }
                            @endphp
                                {{ number_format($avg6, 2) }}</td>
                            <td class="border text-center">@php
                                $PO7 = 0;
                                foreach ($course1->students as $student) {
                                    $PO7 += $student->PO7;
                                }

                                if (
                                    $course1->students->where('PO7', '>', 0)->count() == 0
                                ) {
                                    $avg7 = 0;
                                } else {
                                    $avg7 =
                                        $PO7 /
                                        $course1->students->where('PO7', '>', 0)->count();
                                }
                            @endphp
                                {{ number_format($avg7, 2) }}</td>
                            <td class="border text-center">@php
                                $PO8 = 0;
                                foreach ($course1->students as $student) {
                                    $PO8 += $student->PO8;
                                }

                                if (
                                    $course1->students->where('PO8', '>', 0)->count() == 0
                                ) {
                                    $avg8 = 0;
                                } else {
                                    $avg8 =
                                        $PO8 /
                                        $course1->students->where('PO8', '>', 0)->count();
                                }
                            @endphp
                                {{ number_format($avg8, 2) }}</td>
                            <td class="border text-center">@php
                                $PO9 = 0;
                                foreach ($course1->students as $student) {
                                    $PO9 += $student->PO9;
                                }

                                if (
                                    $course1->students->where('PO9', '>', 0)->count() == 0
                                ) {
                                    $avg9 = 0;
                                } else {
                                    $avg9 =
                                        $PO9 /
                                        $course1->students->where('PO9', '>', 0)->count();
                                }
                            @endphp
                                {{ number_format($avg9, 2) }}</td>
                            <td class="border text-center">@php
                                $PO10 = 0;
                                foreach ($course1->students as $student) {
                                    $PO10 += $student->PO10;
                                }

                                if (
                                    $course1->students->where('PO10', '>', 0)->count() == 0
                                ) {
                                    $avg10 = 0;
                                } else {
                                    $avg10 =
                                        $PO10 /
                                        $course1->students->where('PO10', '>', 0)->count();
                                }
                            @endphp
                                {{ number_format($avg10, 2) }}</td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>


    </div>


</x-app-layout>
