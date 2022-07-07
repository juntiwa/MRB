<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>ห้องประขุมภาควิชา</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   <div class="container">
      <a href="{{route('medicine.condition.booking.meeting.rooms')}}">=>จองห้องประชุม</a>
       <div class="card bg-light mt-3">
           <div class="card-body">
               <form action="{{ route('medicine.room.import') }}" method="POST" enctype="multipart/form-data">
                   @csrf
                   <input type="file" name="file" class="form-control">
                   <br>
                   <button class="btn btn-success">Import Medicine Meeting Room Data</button>
               </form>

           </div>
       </div>
   </div>
    <div class="container">
      <table class="table">
         <thead>
            <th>ชื่อห้อง</th>
            <th>ชื่อย่อ</th>
            <th>จำนวนผู้เข้าร่วม น้อยสุด</th>
            <th>จำนวนผู้เข้าร่วม มากสุด</th>
            <th>จำนวนวันที่สามารถจองได้</th>
            <th>สถานที่</th>
            <th>images</th>
         </thead>
         @foreach ($medicines as $medicine)
         <tbody>
            <td> {{$medicine->name}} </td>
            <td> {{$medicine->short_name}} </td>
            <td> {{$medicine->minimum_attendees}} </td>
            <td> {{$medicine->maximum_attendees}} </td>
            <td> {{$medicine->advance_booking_under_days}} </td>
            <td> {{$medicine->location}} </td>
            {{-- <td> {{$medicine->images}} </td> --}}
         </tbody>
         @endforeach
      </table>
   </div>
   </body>
   </html>
</body>
</html>
