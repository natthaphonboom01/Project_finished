<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACG Information</title>
    <!-- Argon Dashboard CSS -->
    <link href="{{ asset('assets/css/argon-dashboard.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nucleo-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/nucleo-svg.css') }}" rel="stylesheet">
</head>

<body class="g-sidenav-show bg-gray-100">

    @include('layout.nav')
    @include('layout.sidebar-staff')

    <main class="main-content position-relative h-100 border-radius-lg">
        <div class="container-fluid py-4">

            <!-- Search Card -->
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <form action="{{ route('acg.index') }}" method="GET" class="d-flex p-3">
                                <input type="text" name="search" class="form-control" placeholder="ค้นหาชื่อผู้สูงอายุ" value="{{ request()->get('search') }}">
                                <button type="submit" class="btn btn-primary ml-2">ค้นหา</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- ACG Information Card -->
            <div class="row">
                <div class="col-12">
                    <div class="card mb-4">
                        <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                            <h6>ACG Information</h6>
                            <a href="{{ route('activities.create') }}" class="btn btn-primary">
                                <i class="fas fa-plus"></i> Add Activity
                            </a>
                        </div>
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-center">Date ACG</th>
                                            <th class="text-center">Elderly Name</th>
                                            <th class="text-center">Caregiver Name</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($activities as $activity)
                                            <tr>
                                                <td class="text-center">{{ $activity->Date_ACG }}</td>
                                                <td class="text-center">{{ $activity->caregiver->Name_Elderly }}</td>
                                                <td class="text-center">{{ $activity->caregiver->Name_CG }}</td>
                                                <td class="text-center">
                                                    <a href="{{ route('acg.edit', ['id' => $activity->ID_ACG]) }}" class="btn btn-warning btn-sm">Edit</a>
                                                    <form action="{{ route('acg.destroy', ['id' => $activity->ID_ACG]) }}" method="POST" style="display:inline-block;" onsubmit="return confirm('Are you sure you want to delete this activity?');">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{ $activities->links() }} <!-- For pagination links -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Argon Dashboard JS -->
    <script src="{{ asset('assets/js/argon-dashboard.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap-notify.js') }}"></script>
    <script src="{{ asset('assets/js/chartjs.min.js') }}"></script>
    <script src="{{ asset('assets/js/Chart.extension.js') }}"></script>
    <script src="{{ asset('assets/js/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/smooth-scrollbar.min.js') }}"></script>
</body>

</html>