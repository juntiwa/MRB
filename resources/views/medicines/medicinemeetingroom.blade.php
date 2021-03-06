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
      <a href="{{route('medicine.condition.booking.meeting.rooms')}}"> =>จองห้องประชุม</a>
       <div class="card bg-light mt-3">
           <div class="card-body">
               <form action="{{ route('medicine.room.import') }}" method="POST" enctype="multipart/form-data">
                   @csrf
                   <input type="file" name="medicine_file" class="form-control">
                   <br>
                   <button class="btn btn-success">Import Medicine Meeting Room Data</button>
               </form>

           </div>
       </div>
   </div>
    <div class="container mt-3">
      <form action="{{route('medicine.meeting.room.store')}}" method="post">
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
               <label for="name">จำนวนผู้เข้าร่วม น้อยสุด</label>
               <input class="form-control" type="text" name="minimum_attendees" id="minimum_attendees">
            </div>
            <div class="d-flex flex-column me-3">
               <label for="name">จำนวนผู้เข้าร่วม มากสุด</label>
               <input class="form-control" type="text" name="maximum_attendees" id="maximum_attendees">
            </div>
            <div class="d-flex flex-column me-3">
               <label for="name">จำนวนวันที่จองได้</label>
               <input class="form-control" type="text" name="advance_booking_under_days" id="advance_booking_under_days">
            </div>
            <div class="d-flex flex-column me-3">
               <label for="name">สถานที่</label>
               <input class="form-control" type="text" name="location" id="location">
            </div>
            <div class="d-flex flex-column me-3">
               <label for="name">images</label>
               <input class="form-control" type="text" name="images" id="images">
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
