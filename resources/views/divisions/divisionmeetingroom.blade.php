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
      <a href="{{route('division.condition.booking.meeting.rooms')}}"> =>จองห้องประชุม</a>
       {{-- <div class="card bg-light mt-3">
           <div class="card-body">
               <form action="{{ route('medicine.room.import') }}" method="POST" enctype="multipart/form-data">
                   @csrf
                   <input type="file" name="file" class="form-control">
                   <br>
                   <button class="btn btn-success">Import Medicine Meeting Room Data</button>
               </form>

           </div>
       </div> --}}
   </div>
    <div class="container">
      <table class="table">
         <thead>
            <th>ชื่อห้อง</th>
            <th>ชื่อย่อ</th>
            <th>สถานที่</th>
            <th>สาขาวิชา</th>
            <th>images</th>
         </thead>
         @foreach ($divisions as $division)
         <tbody>
            <td> {{$division->name}} </td>
            <td> {{$division->short_name}} </td>
            <td> {{$division->location}} </td>
            <td> {{$division->division_id}} </td>
            {{-- <td> {{$division->images}} </td> --}}
         </tbody>
         @endforeach
      </table>
   </div>
   </body>
   </html>
</body>
</html>
