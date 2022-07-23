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
   </div>
    <div class="container">
      <form action="{{route('division.meeting.room.create')}}" method="post">
         @csrf
         <label for="name">ชื่อห้อง</label>
         <input type="text" name="name" id="name">
         <label for="name">ชื่อย่อ</label>
         <input type="text" name="short_name" id="short_name">
         <label for="name">สถานที่</label>
         <input type="text" name="location" id="location">
         <br>
         <label for="name">images</label>
         <input type="text" name="images" id="images">
         <label for="name">สาขาวิชา</label>
         <select name="division_id" id="division_id">
            <option value="">---- เลือกสาขา ----</option></option>
            @foreach($divisions as $key => $division)
            <option value="{{$division->id}}">{{$division->name_th}}</option>
            @endforeach
         </select>
         <button type="submit" class="btn btn-primary">เพิ่มห้องประชุม</button>
      </form>
      <table class="table">
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
