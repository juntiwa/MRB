<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>หน้าหลัก</title>
   <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
   <div>
      <a href="{{route('medicine.rooms.booking')}}" target="_blank" class="bg-slate-400">จองห้องประชุมภาควิชา</a>
      <a href="{{route('medicine.rooms')}} " target="_blank" class="bg-slate-400">รายละเอียดห้องประชุมภาควิชา</a>
   </div>
   <div>
      <a href="{{route('division.rooms.booking')}}}" target="_blank" class="bg-rose-400">จองห้องประชุมสาขาวิชา</a>
      <a href="{{route('division.rooms')}} " target="_blank" class="bg-rose-400">รายละเอียดห้องประชุมสาขาวิชา</a>

   </div>
</body>
</html>