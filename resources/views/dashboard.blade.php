<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<br>
<br>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        Information for APAR cohort
                    </div>

                <div class="card-body">
                    <form action="{{ route('dashboard.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="graduation_session">Graduation Session:</label>
                            <select class="form-control" name="graduation_session"
                                aria-label="Select Graduation Session" required>
                                <option value="2021/2022">2021/2022</option>
                                <option value="2022/2023">2022/2023</option>
                                <option value="2023/2024">2023/2024</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="graduation_semester">Graduation Semester:</label>
                            <select class="form-control" name="graduation_semester"
                                aria-label="Select Graduation Semester" required>
                                <option value="1">I</option>
                                <option value="2">II</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="total_student">Total number of students for this cohort:</label>
                            <input type="number" name="total_student" class="form-control" required>
                        </div>
                        {{-- <form action="{{ route('dashboard.store') }}" method="POST" enctype="multipart/form-data"> --}}
                            {{-- @csrf --}}
                        <div class="form-group">
                            <label for="formFile" class="form-label">Upload student file</label>
                            <input class="form-control" type="file" name="formFile">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>

        </div>


    </div>

</x-app-layout>
