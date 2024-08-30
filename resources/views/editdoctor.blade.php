
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .main
        {
            margin-top: 70px;

        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
        <div class="container">
            <a class="navbar-brand" href="#">Hospital</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                  
                    <li class="nav-user">
                    <form action="{{ route('logout') }}" method="POST" class="nav-link">
                            @csrf
                            <button type="submit" class="btn btn-link">
                                <i class="fa fa-sign-out"></i> Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div> </div> </div> </div>
    </nav>
    </div>

    <div class="container-fluid main">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-user">
                            <a class="nav-link active" href="dashboard">
                                <i class="fa fa-user-md"></i>
                                <span>Doctors</span>
                            </a>
                        </li>
                        <li class="nav-user">
                            <a class="nav-link" href="../patient">
                                <i class="fa fa-wheelchair"></i>
                                <span>Patients</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <h2>Doctors</h2>
                <button class="btn btn-success mb-3" data-toggle="modal" data-target="#addDoctorModal">
                    <i class="fa fa-plus"></i> Add Doctor
                </button>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Specialty</th>
                            <th>Degree</th>
                            <th>Department</th>
                            <th>Image</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <tr>
                            <form action="{{ route('updatedoc', $user->Doctor_id) }}" method='post' enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <td><input type="hidden" value="{{$user->Doctor_id}}" name='Doctor_id'></td>
                            <td><input type="text" value="{{$user->doctor_name}}"name='dname'></td>
                            <td><input type="text" value="{{$user->field}}" name='dfield'></td>
                            <td><input type="text" value="{{$user->degree}}" name='ddegree'></td>
                            <td><input type="text" value="{{$user->Department_ID}}" name='ddepartmentid'></td>
                            <td><input type="file" name="image"></td>
                            <td>
                            <button type="submit">Update</button>
                            </td>
                            </form>
                            
                        </tr>
        
<!-- More rows to be added dynamically -->
</tbody>
</table>
</main>
</div>
</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>

