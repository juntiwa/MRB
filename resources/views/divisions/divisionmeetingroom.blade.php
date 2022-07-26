<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>ห้องประขุมสาขาวิชา</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   <div class="container">
      <a href="{{route('division.condition.booking.meeting.rooms')}}"> => จองห้องประชุม</a>
      <div class="card bg-light mt-3">
         <div class="card-body">
            <form action="{{ route('division.room.import') }}" method="POST" enctype="multipart/form-data">
               @csrf
               <input type="file" name="division_file" class="form-control">
               <br>
               <button class="btn btn-success">Import Division Meeting Room Data</button>
            </form>
         </div>
      </div>
   </div>
   <div class="container mt-3">
      <form action="{{route('division.meeting.room.store')}}" method="post">
         @csrf
         <div class="d-flex">
            <div class="d-flex flex-column me-3">
               <label for="name">ชื่อห้อง</label>
               <input class="form-control" type="text" name="name" id="name">
            </div>
            <div class="d-flex flex-column me-3">
               <label for="name">ชื่อย่อ</label>
               <input class="form-control" type="text" name="short_name" id="short_name">
            </div>
            <div class="d-flex flex-column me-3">
               <label for="name">สถานที่</label>
               <input class="form-control" type="text" name="location" id="location">
            </div>
            <div class="d-flex flex-column me-3">
               <label for="name">images</label>
               <input class="form-control" type="text" name="images" id="images">
            </div>
            <div class="d-flex flex-column me-3">
               <label for="name">สาขาวิชา</label>
               <select class="form-select" name="division_id" id="division_id">
                  <option value="">---- เลือกสาขา ----</option>
                  </option>
                  @foreach($divisions as $key => $division)
                  <option value="{{$division->id}}">{{$division->name_th}}</option>
                  @endforeach
               </select>
            </div>
            <div class="d-flex flex-column justify-content-end">
               <button type="submit" class="btn btn-primary">เพิ่ม</button>
            </div>
         </div>
      </form>
      <table class="table mt-3">
         <thead>
            <th>ชื่อห้อง</th>
            <th>ชื่อย่อ</th>
            <th>สถานที่</th>
            <th>สาขาวิชา</th>
            <th>images</th>
         </thead>
         @foreach ($divisionsRoom as $divisionRoom)
         <tbody>
            <td> {{$divisionRoom->name}} </td>
            <td> {{$divisionRoom->short_name}} </td>
            <td> {{$divisionRoom->location}} </td>
            <td> {{$divisionRoom->division_id}} </td>
            {{-- <td> {{$divisionRoom->images}} </td> --}}
         </tbody>
         @endforeach
      </table>
   </div>
</body>
</html>
</body>
</html>
