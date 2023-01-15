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
        @php
            $overall_ts = 0;
            $overall_studentTaken = 0;


            $PO1_calculation = 0;
            $PO2_calculation = 0;
            $PO3_calculation = 0;
            $PO4_calculation = 0;
            $PO5_calculation = 0;
            $PO6_calculation = 0;
            $PO7_calculation = 0;
            $PO8_calculation = 0;
            $PO9_calculation = 0;
            $PO10_calculation = 0;

        @endphp

        <table class="table table-responsive">
            <thead>
                <tr>
                    <th class="border">No</th>
                    {{-- <th class="border text-center">Year</th>
                    <th class="border text-center">Semester</th> --}}
                    <th class="border text-center">Course</th>
                    <th class="border text-center">Course Code</th>
                    {{-- <th class="border text-center">Credit Hour</th> --}}
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
                @php
                    $i = 1;
                @endphp
                @foreach ($courses as $course1)
                @php
                $overall_ts = $overall_ts + $course1->students->where('user_id', Auth()->id())->where('year',$year)->count();
                // $overall_studentTaken += $overall_ts;
                @endphp
                    @if ($course1->students->where('user_id', Auth()->id())->count() > 0)
                        <tr>
                            <td class="border text-center">{{ $i++ }}</td>
                            {{-- <td class="border text-center">{{ $course1->year_offer }}</td>
                            <td class="border text-center">{{ $course1->semester_offer }}</td> --}}
                            {{-- <td class="border text-center"><a href="url"></a></td>  cth --}}
                            <td class="border text-center">{{ $course1->course_name }}</td>
                            <td class="border text-center">{{ $course1->course }}</td>
                            {{-- <td class="border text-center">{{ $course1->credit_hour }}</td> --}}
                            <td class="border text-center">

                                {{ $course1->students->where('user_id', Auth()->id())->where('year',$year)->count() }}</td>
                            <td class="border text-center">
                                @php

                                $PO1 = 0;
                                $T_studentPassedPO1 = $course1->students->where('user_id', Auth()->id())->where('PO1', '>', 0)->count();
                                foreach ($course1->students->where('user_id', Auth()->id())->where('year',$year) as $student) {
                                    if ($student->PO1 >= 65.0) {
                                        $PO1++;
                                    }
                                }

                                if(  $T_studentPassedPO1 != 0){
                                    $resultPO1 = ($PO1/$T_studentPassedPO1)* 100 ;
                                }else{
                                    $resultPO1 = $PO1;
                                }
                                $PO1_calculation += $resultPO1;
                            @endphp
                                {{ number_format($resultPO1,2) }}%</td>
                            <td class="border text-center">
                                @php
                                //   $overall_ts = $overall_ts + $course1->students->where('user_id', Auth()->id())->where('year',$year)->count();
                                $PO2 = 0;
                                $T_studentPassedPO2 = $course1->students->where('user_id', Auth()->id())->where('PO2', '>', 0)->count();
                                foreach ($course1->students->where('user_id', Auth()->id())->where('year',$year) as $student) {
                                    if ($student->PO2 >= 65.0) {
                                        $PO2++;
                                    }
                                }
                                if(  $T_studentPassedPO2 != 0){
                                    $resultPO2 = ($PO2/$T_studentPassedPO2)* 100;
                                }else{
                                    $resultPO2 = $PO2;
                                }
                                $PO2_calculation += $resultPO2;
                            @endphp
                                {{ number_format($resultPO2,2) }}%</td>

                            <td class="border text-center">
                                 @php
                                //    $overall_ts = $overall_ts + $course1->students->where('user_id', Auth()->id())->where('year',$year)->count();
                                $PO3 = 0;
                                $T_studentPassedPO3 = $course1->students->where('user_id', Auth()->id())->where('PO3', '>', 0)->count();
                                foreach ($course1->students as $student) {
                                    if ($student->PO3 >= 65.0) {
                                        $PO3++;
                                    }
                                }
                                if(  $T_studentPassedPO3 != 0){
                                    $resultPO3 = ($PO3/$T_studentPassedPO3)* 100;
                                }else{
                                    $resultPO3 = $PO3;
                                }
                                $PO3_calculation += $resultPO3;
                            @endphp
                                {{ number_format($resultPO3,2) }}%</td>
                            </td>
                            <td class="border text-center">@php
                                //   $overall_ts = $overall_ts + $course1->students->where('user_id', Auth()->id())->where('year',$year)->count();
                                $PO4 = 0;
                                $T_studentPassedPO4 = $course1->students->where('user_id', Auth()->id())->where('PO4', '>', 0)->count();
                                foreach ($course1->students as $student) {
                                    if ($student->PO4 >= 65.0) {
                                        $PO4++;
                                    }
                                }
                                if(  $T_studentPassedPO4 != 0){
                                    $resultPO4 = ($PO4/$T_studentPassedPO4) *100;
                                }else{
                                    $resultPO4 = $PO4;
                                }
                                $PO4_calculation += $resultPO4;
                            @endphp
                                {{ number_format($resultPO4,2) }}%</td>
                            <td class="border text-center">
                                @php
                                //   $overall_ts = $overall_ts + $course1->students->where('user_id', Auth()->id())->where('year',$year)->count();
                                $PO5 = 0;
                                $T_studentPassedPO5 = $course1->students->where('user_id', Auth()->id())->where('PO5', '>', 0)->count();
                                foreach ($course1->students as $student) {
                                    if ($student->PO5 >= 65.0) {
                                        $PO5++;
                                    }
                                }
                                if(  $T_studentPassedPO5 != 0){
                                    $resultPO5 = ($PO5/$T_studentPassedPO5) *100;
                                }else{
                                    $resultPO5 = $PO5;
                                }
                                $PO5_calculation += $resultPO5;
                            @endphp
                                {{ number_format($resultPO5,2) }}%</td>
                            <td class="border text-center">
                                @php
                                //   $overall_ts = $overall_ts + $course1->students->where('user_id', Auth()->id())->where('year',$year)->count();
                                $PO6 = 0;
                                $T_studentPassedPO6 = $course1->students->where('user_id', Auth()->id())->where('PO6', '>', 0)->count();
                                foreach ($course1->students as $student) {
                                    if ($student->PO6 >= 65.0) {
                                        $PO6++;
                                    }
                                }
                                if(  $T_studentPassedPO6 != 0){
                                    $resultPO6 = ($PO6/$T_studentPassedPO6) *100;
                                }else{
                                    $resultPO6 = $PO6;
                                }
                                $PO6_calculation += $resultPO6;
                            @endphp
                                {{ number_format($resultPO6,2) }}%</td>
                            <td class="border text-center">
                                @php
                                //   $overall_ts = $overall_ts + $course1->students->where('user_id', Auth()->id())->where('year',$year)->count();
                                $PO7 = 0;
                                $T_studentPassedPO7 = $course1->students->where('user_id', Auth()->id())->where('PO7', '>', 0)->count();
                                foreach ($course1->students as $student) {
                                    if ($student->PO7 >= 65.0) {
                                        $PO7++;
                                    }
                                }
                                if(  $T_studentPassedPO7 != 0){
                                    $resultPO7 = ($PO7/$T_studentPassedPO7) *100;
                                }else{
                                    $resultPO7 = $PO7;
                                }
                                $PO7_calculation += $resultPO7;
                            @endphp
                                {{ number_format($resultPO7,2) }}%</td>
                            <td class="border text-center">
                                @php
                                //   $overall_ts = $overall_ts + $course1->students->where('user_id', Auth()->id())->where('year',$year)->count();
                                $PO8 = 0;
                                $T_studentPassedPO8 = $course1->students->where('user_id', Auth()->id())->where('PO8', '>', 0)->count();
                                foreach ($course1->students as $student) {
                                    if ($student->PO8 >= 65.0) {
                                        $PO8++;
                                    }
                                }
                                if(  $T_studentPassedPO8 != 0){
                                    $resultPO8 = ($PO8/$T_studentPassedPO8) *100;
                                }else{
                                    $resultPO8 = $PO8;
                                }
                                $PO8_calculation += $resultPO8;
                            @endphp
                                {{  number_format($resultPO8,2) }}%</td>
                            <td class="border text-center">
                                @php
                                //   $overall_ts = $overall_ts + $course1->students->where('user_id', Auth()->id())->where('year',$year)->count();
                                $PO9 = 0;
                                $T_studentPassedPO9 = $course1->students->where('user_id', Auth()->id())->where('PO9', '>', 0)->count();
                                foreach ($course1->students as $student) {
                                    if ($student->PO9 >= 65.0) {
                                        $PO9++;
                                    }
                                }
                                if(  $T_studentPassedPO9 != 0){
                                    $resultPO9 = ($PO9/$T_studentPassedPO9) * 100;
                                }else{
                                    $resultPO9 = $PO9;
                                }
                                $PO9_calculation += $resultPO9;
                            @endphp
                                {{  number_format($resultPO9,2) }}%</td>
                            <td class="border text-center">
                                @php
                                //   $overall_ts = $overall_ts + $course1->students->where('user_id', Auth()->id())->where('year',$year)->count();
                                $PO10 = 0;
                                $T_studentPassedPO10 = $course1->students->where('user_id', Auth()->id())->where('PO10', '>', 0)->count();
                                foreach ($course1->students as $student) {
                                    if ($student->PO10 >= 65.0) {
                                        $PO10++;
                                    }
                                }
                                if(  $T_studentPassedPO10 != 0){
                                    $resultPO10 = ($PO10/$T_studentPassedPO10)*100;
                                }else{
                                    $resultPO10 = $PO10;
                                }
                                $PO10_calculation += $resultPO10;
                            @endphp
                                {{  number_format($resultPO10,2) }}%</td>
                        </tr>
                        @endif
                        @endforeach
                        <tr>
                            <td colspan="4">Total Score </td>
                            <td>
                                @php
                                  $latestKPIPO1 = ($PO1_calculation / $overall_ts)*100;
                    @endphp
                    {{number_format($latestKPIPO1,2)}}%
                            </td>
                            <td>
                                @php
                                  $latestKPIPO2 = ($PO2_calculation / $overall_ts)*100;
                    @endphp
                    {{number_format($latestKPIPO2,2)}}%

                            </td>
                            <td>
                                @php
                                  $latestKPIPO3 = ($PO3_calculation / $overall_ts)*100;
                    @endphp
                    {{number_format($latestKPIPO3,2)}}%

                            </td>
                            <td>
                                @php
                                  $latestKPIPO4 = ($PO4_calculation / $overall_ts)*100;
                    @endphp
                    {{number_format($latestKPIPO4,2)}}%

                            </td>
                            <td>
                                @php
                                  $latestKPIPO5 = ($PO5_calculation / $overall_ts)*100;
                    @endphp
                    {{number_format($latestKPIPO5,2)}}%

                            </td>
                            <td>
                                @php
                                  $latestKPIPO6 = ($PO6_calculation / $overall_ts)*100;
                    @endphp
                    {{number_format($latestKPIPO6,2)}}%

                            </td>
                            <td>
                                @php
                                  $latestKPIPO7 = ($PO7_calculation / $overall_ts)*100;
                    @endphp
                    {{number_format($latestKPIPO7,2)}}%

                            </td>
                            <td>
                                @php
                                  $latestKPIPO8 = ($PO8_calculation / $overall_ts)*100;
                    @endphp
                    {{number_format($latestKPIPO8,2)}}%

                            </td>
                            <td>
                                @php
                                  $latestKPIPO9 = ($PO9_calculation / $overall_ts)*100;
                    @endphp
                    {{number_format($latestKPIPO9,2)}}%

                            </td>
                            <td>
                                @php
                                  $latestKPIPO10 = ($PO10_calculation / $overall_ts)*100;
                    @endphp
                    {{number_format($latestKPIPO10,2)}}%

                            </td>

                          </tr>
                          <tr>
                            <td colspan="4"> KPI*</td>
                            <td colspan="14" text-align="center">
                                65%
                            </td>
                          </tr>
                          <tr>
                            <td colspan="4">Achievement (YES or No)</td>
                            <td>
                                @php
                                $PO1_KPI = number_format($latestKPIPO1,2);

                                if ($PO1_KPI > 65)
                                {
                                    $PO1_KPI_achievement = "YES";
                                }else {
                                    $PO1_KPI_achievement = "NO";
                                }
                    @endphp
                    {{$PO1_KPI_achievement}}

                            </td>
                            <td>
                                @php
                                $PO2_KPI = number_format($latestKPIPO2,2);

                                if ($PO2_KPI > 65)
                                {
                                    $PO2_KPI_achievement = "YES";
                                }else {
                                    $PO2_KPI_achievement = "NO";
                                }
                    @endphp
                    {{$PO2_KPI_achievement}}

                            </td>
                            <td>
                                @php
                                $PO3_KPI = number_format($latestKPIPO3,2);

                                if ($PO3_KPI > 65)
                                {
                                    $PO3_KPI_achievement = "YES";
                                }else {
                                    $PO3_KPI_achievement = "NO";
                                }
                    @endphp
                    {{$PO3_KPI_achievement}}

                            </td>
                            <td>
                                @php
                                $PO4_KPI = number_format($latestKPIPO4,2);

                                if ($PO4_KPI > 65)
                                {
                                    $PO4_KPI_achievement = "YES";
                                }else {
                                    $PO4_KPI_achievement = "NO";
                                }
                    @endphp
                    {{$PO4_KPI_achievement}}

                            </td>
                            <td>
                                @php
                                $PO5_KPI = number_format($latestKPIPO5,2);

                                if ($PO5_KPI > 65)
                                {
                                    $PO5_KPI_achievement = "YES";
                                }else {
                                    $PO5_KPI_achievement = "NO";
                                }
                    @endphp
                    {{$PO5_KPI_achievement}}

                            </td>
                            <td>
                                @php
                                $PO6_KPI = number_format($latestKPIPO6,2);

                                if ($PO6_KPI > 65)
                                {
                                    $PO6_KPI_achievement = "YES";
                                }else {
                                    $PO6_KPI_achievement = "NO";
                                }
                    @endphp
                    {{$PO6_KPI_achievement}}

                            </td>
                            <td>
                                @php
                                $PO7_KPI = number_format($latestKPIPO7,2);

                                if ($PO7_KPI > 65)
                                {
                                    $PO7_KPI_achievement = "YES";
                                }else {
                                    $PO7_KPI_achievement = "NO";
                                }
                    @endphp
                    {{$PO7_KPI_achievement}}

                            </td>
                            <td>
                                @php
                                $PO8_KPI = number_format($latestKPIPO8,2);

                                if ($PO8_KPI > 65)
                                {
                                    $PO8_KPI_achievement = "YES";
                                }else {
                                    $PO8_KPI_achievement = "NO";
                                }
                    @endphp
                    {{$PO8_KPI_achievement}}

                            </td>
                            <td>
                                @php
                                $PO9_KPI = number_format($latestKPIPO9,2);

                                if ($PO9_KPI > 65)
                                {
                                    $PO9_KPI_achievement = "YES";
                                }else {
                                    $PO9_KPI_achievement = "NO";
                                }
                    @endphp
                    {{$PO9_KPI_achievement}}

                            </td>
                            <td>
                                @php
                                $PO10_KPI = number_format($latestKPIPO10,2);

                                if ($PO10_KPI > 65)
                                {
                                    $PO10_KPI_achievement = "YES";
                                }else {
                                    $PO10_KPI_achievement = "NO";
                                }
                    @endphp
                    {{$PO10_KPI_achievement}}

                            </td>



                          </tr>




            </tbody>
        </table>

    </div>


</x-app-layout>
