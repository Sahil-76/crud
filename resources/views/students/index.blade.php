<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>This is My first curd Operation </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   
   <style>
.delete-animation {
    animation: shake 0.5s;
}

@keyframes shake {
    0% { transform: translateX(0); }
    20% { transform: translateX(-10px); }
    40% { transform: translateX(10px); }
    60% { transform: translateX(-10px); }
    80% { transform: translateX(10px); }
    100% { transform: translateX(0); }
}

body {
  padding: 15px;
  background-color: white;
  color: black;
  font-size: 15px;
  font-weight: 400;

}

.dark-mode {
  background-color: black;
  color: white;
}
    </style>
        
</head>

<body>
    <div class="container mt-2">
        <center>
            <div class="row">
                <div class="col-lg-12 margin-tb">
                    <div class="pull-left">
                        <h1>Student Index  Page</h1>
                        <button onclick="myFunction()">Dark mode</button>
                        <hr>
                    </div>
                    <div class="pull-right mb-2">
                        <a class="btn btn-success" href="{{ route('students.create') }}"> Create Students <i
                                class="fa-sharp fa-solid fa-users fa-fade" style="color: #cdd419;"></i></a>
                        <a class="btn btn-success" href="{{ route('students.create') }}"> Back<i
                                class="fa-sharp fa-solid fa-backward fa-beat" style="color: #b62525;"></i> </a>

                    </div>
                </div>
            </div>
        </center>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif
        <table class="table table-bordered">
            <thead bgcolor="Powderblue">
                <tr>
                    <th >S.No</th>
                    <th> Name</th>
                    <th>Email</th>
                    {{-- <th> Password</th> --}}
                    <th> Contact</th>
                    <th> Image</th>
                    <th width="280px">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($students as $student)
                    <tr>
                        <td>{{ $student->id }}</td>
                        <td>{{ $student->name }}</td>
                        <td>{{ $student->email }}</td>
                        {{-- <td>{{ $student->password }}</td> --}}
                        <td>{{ $student->contact }}</td>


                        <td>


                            @if ($student->image)
                                <a href="{{ asset('storage/' . $student->image) }}" target="_blank">
                                    <img src="{{ asset('storage/' . $student->image) }}" alt="{{ $student->image }}"
                                        width="50">
                                </a>
                            @endif

                        </td>
                        <td>

                            <form action="{{ route('students.destroy', $student->id) }}" method="Post">
                                <a class="btn btn-primary" href="{{ route('students.edit', $student->id) }}">Edit<i
                                        class="fa-solid fa-pen-nib fa-spin fa-spin-reverse"></i> </a>
                                @csrf
                                @method('DELETE')
                               
                                    <button type="submit" class="btn btn-danger delete-animation">
                                        Delete<i class="fa-solid fa-trash-can"></i>
                                    </button>
                                   
                          </form>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
           {{-- {{$students->links()}} --}}
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('form').on('submit', function() {
            var result = confirm('Are you sure you want to delete this data?');
            if (result) {
                $(this).find('.btn-danger').addClass('delete-animation');
            } else {
                return false; 
            }
        });
    });

    function myFunction() {
       var element = document.body;
       element.classList.toggle("dark-mode");
    }

</script>




</html>
