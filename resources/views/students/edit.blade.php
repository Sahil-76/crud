
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Edit Students form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css">
</head>

<style>

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

<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <center>
                        <h1 style="color: #333;">Student Update Profile Portal class </h1>
                        <hr>
                </div>
                     </center>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('students.index') }}" enctype="multipart/form-data">Back
                    </a>
                    <button onclick="myFunction()">Dark mode</button>
 
                </div>
            </div>
        </div>

        @if (session('status'))
            <div class="alert alert-success mb-1 mt-1"
                style="background-color: #dff0d8; border-color: #d0e9c6; color: #3c763d;">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('students.update', $student->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method ('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Student Name:</strong>
                        <input type="text" name="name" value="{{ $student->name }}" class="form-control"
                            placeholder="Student Name" style="width: 100%; padding: 5px; margin-bottom: 10px;">
                        @error('name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Student Email:</strong>
                        <input type="email" name="email" class="form-control" placeholder="Company Email"
                            value="{{ $student->email }}" style="width: 100%; padding: 5px; margin-bottom: 10px;">
                        @error('email')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Contact:</strong>
                        <input type="contact" name="contact" class="form-control" placeholder="contact number"
                            value="{{ $student->contact }}" style="width: 100%; padding: 5px; margin-bottom: 10px;">
                        @error('contact')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">

                        <label for="image">Image</label>

                        <input type="file" class="form-control-file" id="image" name="image">

                        @if ($student->image)
                            <p>Current Image:</p><br><br>

                            <img src="{{ asset('storage/' . $student->image) }}" alt="{{ $student->name }}"
                                width="50"><br><br>
                        @endif

                    </div>


                    {{--      <input type="file" id="myFile" name="filename"> --}}
                </div>
                <button type="submit" class="btn btn-primary ml-3"style="background-color: #007bff; border-color: #007bff; padding: 5px 15px;">Submit</button><br><br><br>
            </div>
        </form>
    </div>
</body>
<script>
    function myFunction() {
       var element = document.body;
       element.classList.toggle("dark-mode");
    }
    </script>

</html>
