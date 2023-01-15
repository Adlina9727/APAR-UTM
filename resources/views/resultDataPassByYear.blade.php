<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Percentage of students Passed KPI of Programme Learning Outcome') }}
        </h2>
    </x-slot>
    <br>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <div class="container">

        <table class="table table-responsive">
            <thead>
                <tr>
                    <th class="border">No</th>
                    <th class="border text-center">Year</th>

                </tr>
            </thead>
            <tbody>
                @php
                    $i = 1;
                @endphp
                @foreach ($years as $year)
                        <tr>
                            <td class="border text-center">{{ $i++ }}</td>
                            <td class="border text-center"><a href="{{route('kpibyyear', $year->year)}}">{{$year->year}}</a></td>
                          </tr>
                @endforeach
            </tbody>
        </table>

    </div>


</x-app-layout>
