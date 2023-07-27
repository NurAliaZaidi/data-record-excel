<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Data</title>
    <link rel="shortcut icon" type="image/png" href="{!! asset('assets/images/logos/favicon.png') !!}" />
    <link rel="stylesheet" href="{!! asset('assets/css/styles.min.css') !!}" />
</head>

<body>
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-10 col-xxl-10">
                        <div class="card mb-0">
                            <div class="card-body">
                                {{-- Alert success --}}
                                @if (session()->has('success'))
                                    <div class="alert alert-success" role="alert">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                {{-- Alert failed --}}
                                @if (session()->has('failed'))
                                    <div class="alert alert-danger" role="alert">
                                        {{ session('failed') }}
                                    </div>
                                @endif

                                @if (isset($errors) && $errors->any())
                                    <div class="alert alert-danger" role="alert">
                                        @foreach ($errors->all() as $error)
                                            {{ $error }}
                                        @endforeach
                                    </div>
                                @endif
                                <p class="text-primary fs-4"><strong>Upload from file</strong></p>
                                <div class="mb-3">
                                    <a href="{{ route('student.download-template') }}" class="text-decoration-underline">Download Excel Template</a>
                                </div>
                                <form action="{{ route('student.import') }}" method="POST"
                                    enctype="multipart/form-data">
                                    <div class="mb-3">
                                        <div class="input-group mb-3">
                                            @csrf
                                            <input type="text" name="" id="fileSelected" class="form-control disable"
                                                placeholder="Choose file" disabled>
                                            <input type="file" class="form-control" name="studentFile"
                                                id="filesStudent"
                                                accept=".csv, application/vnd.ms-excel, application/vnd.openxmlformats-officedocument.spreadsheetml.sheet">
                                            <label for="filesStudent" class="btn btn-secondary">
                                                <i class='fas fa-upload'></i>&nbsp; Browse </label>
                                        </div>
                                    </div>
                                    <div class="mb-3 row">
                                        <div class="col-md-6 ">
                                            <button class="btn btn-outline-primary w-100" type="submit"
                                                id="button-addon2">UPLOAD</button>
                                        </div>
                                        <div class="col-md-6">
                                            <a class="btn btn-outline-danger w-100 mb-4 rounded-2" id="resetFile">CANCEL</a>
                                        </div>
                                    </div>
                                </form>

                                @if (session()->has('failures'))
                                <p class="text-warning"><strong>Errors uploading certain row: </strong></p>
                                    <table class="table table-xs table-danger">
                                        <tr>
                                            <td class="py-2"><strong>Line No.</strong></td>
                                            <td class="py-2"><strong>Column</strong></td>
                                            <td class="py-2"><strong>Error Description</strong></td>
                                            <td class="py-2"><strong>Value</strong></td>
                                        </tr>
                                        @foreach (session()->get('failures') as $validation)
                                            <tr>
                                                <td>{{ $validation->row() }}</td>
                                                <td>{{ $validation->attribute() }}</td>
                                                <td>
                                                      @foreach ($validation->errors() as $error)
                                                         {{ $error }}
                                                      @endforeach
                                                </td>
                                                <td>{{ $validation->values()[$validation->attribute()] }}</td>
                                             </tr>
                                       @endforeach
                                    </table>
                                @endif
                                
                                {{-- All Student Data display --}}
                                <p class="text-primary mt-3"><strong>All Student Data</strong></p>
                                <div class="mb-3 table-responsive">
                                    <table class="table table-md">
                                        <thead>
                                            <tr>
                                                <th><b>Name</b></th>
                                                <th><b>Level</b></th>
                                                <th><b>Class</b></th>
                                                <th><b>Parent Contact</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($students as $list)
                                                <tr>
                                                    <td>{{ $list->name }}</td>
                                                    <td>{{ $list->level }}</td>
                                                    <td>{{ $list->class }}</td>
                                                    <td>{{ $list->parent_contact }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="{!! asset('assets/libs/jquery/dist/jquery.min.js') !!}"></script>
    <script src="{!! asset('assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') !!}"></script>

    {{-- custom javascript --}}
    <script src="{!! asset('assets/js/student-import.js') !!}"></script>
</body>

</html>
