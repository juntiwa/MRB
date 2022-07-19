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
    <a href="{{route('medicine.meeting.rooms')}}" > =>รายละเอียดห้องประชุมภาควิชา</a><br>
    @if (session('message'))
        <p class="text-danger">{{session('message')}}</p>
    @endif
    <form action="{{route('medicine.condition.booking.meeting.rooms')}}" method="get">
        <label for="datetime" style="padding-bottom: 10px">วันที่จอง</label>
        <div class="flex" style="padding-bottom: 10px">
            <input type="datetime-local" name="start" id="start" value="{{old('start')}}" required>
            <input type="datetime-local" name="end" id="end" value="{{old('end')}}" required>
        </div>
        <label for="attendees" style="padding-bottom: 10px">จำนวน</label>
        <input type="text" name="attendees" id="attendees" style="margin-bottom: 10px" value="{{old('attendees')}}" required>
        <p class="mr-2"><input type="submit" value="ตรวจสอบเงื่อนไข" class="btn btn-primary"></p>
    </form>
</div>
<div class="container">
    @if($result ?? null)
        <form action="{{route('medicine.booking.meeting.room.selectRoom')}}" method="POST">
            @csrf
            <div class="flex flex-col">
                @foreach ($result as $result)
                    <input
                        type="radio"
                        name="room_id"
                        id="room_id"
                        value="{{$result['room']->id}}"
                        @disabled(!$result['available'])>{{ $result['status'] }} <br>
                @endforeach
            </div>
            <button type="submit" class="btn btn-success">จองห้อง</button>
        </form>
    @endif

</div>
<div class="container">
   <table class="table">
      <thead>
         <th>หัวเรื่องที่ต้องการจอง</th>
         <th>รายละเอียดเพิ่มเติม</th>
         <th>เวลาเริ่ม</th>
         <th>เวลาสิ้นสุด</th>
         <th>หมายเลขห้อง</th>
         <th>ผู้เข้าร่วม</th>
         <th>ผู้ประสานงาน</th>
         <th>สถานะ</th>
      </thead>
      @foreach ($medicinebooking as $medicine)
      <tbody>
         <td> {{$medicine->title}} </td>
         <td> {{$medicine->comment}} </td>
         <td> {{$medicine->start}} </td>
         <td> {{$medicine->end}} </td>
         <td> {{$medicine->meeting_room_id}} </td>
         <td> {{$medicine->attendees}} </td>
         <td> {{$medicine->name_coordinate}} </td>
         <td> {{$medicine->status}} </td>
         {{-- <td> {{$medicine->equipment}} </td> --}}
      </tbody>
      @endforeach
   </table>
</div>
</body>
</html>
