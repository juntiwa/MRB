<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>ระบบจองห้องประชุม</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   <div class="container m-2">
      <div class="d-flex m-2">
         <a class="btn btn-primary m-2" target="_blank" href="{{route('medicine.meeting.rooms')}}" role="button">ห้องประชุมภาควิชา</a>
         <a class="btn btn-primary m-2" target="_blank" href="{{route('medicine.condition.booking.meeting.rooms')}}" role="button">จองห้องประชุมภาควิชา</a>
      </div>
      <div class="d-flex m-2">
         <a class="btn btn-success m-2" target="_blank" href="{{route('division.meeting.rooms')}}" role="button">ห้องประชุมสาขาวิชา</a>
         <a class="btn btn-success m-2" target="_blank" href="{{route('division.condition.booking.meeting.rooms')}}" role="button">จองห้องประชุมสาขาวิชา</a>
      </div>
   </div>
</body>
</html>