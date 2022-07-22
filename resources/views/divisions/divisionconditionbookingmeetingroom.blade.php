<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ห้องประขุมภาคสาขา</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <a href="{{route('division.meeting.rooms')}}" > => รายละเอียดห้องประชุมสาขา</a><br>
    @if (session('message'))
        <p class="text-danger">{{session('message')}}</p>
    @endif
    <form action="{{route('division.condition.booking.meeting.rooms')}}" method="get">
        <label for="datetime" style="padding-bottom: 10px">วันที่จอง</label>
        <div class="flex" style="padding-bottom: 10px">
            <input type="datetime-local" name="start" id="start" value="{{old('start')}}" required>
            <input type="datetime-local" name="end" id="end" value="{{old('end')}}" required>
        </div>
       <p class="mr-2"><input type="submit" value="ตรวจสอบเงื่อนไข" class="btn btn-primary"></p>
    </form>
</div>
<div class="container">
    @if($result ?? null)
        <form action="{{route('division.booking.meeting.room.selectRoom')}}" method="POST">
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
         <th>ผู้ประสานงาน</th>
         <th>ผู้จอง</th>
         <th>สถานะ</th>
         <th>เปลี่ยนแปลงสถานะ</th>
         <th>เหตุผล</th>
         <th>ผู้อนุมัติ</th>
      </thead>
      @foreach ($divisionbooking as $division)
      <tbody>
         <td> {{$division->title}} </td>
         <td> {{$division->comment}} </td>
         <td> {{$division->start}} </td>
         <td> {{$division->end}} </td>
         <td> {{$division->meeting_room_id}} </td>
         <td> {{$division->name_coordinate}} </td>
         <td> {{$division->requester_id}} </td>
         <td> {{$division->status}} </td>
         <td>
            <form action="{{route('division.booking.meeting.room.update', $division->id)}}" method="post">
               @csrf
               <div class="d-flex flex-column">
                  <button name="status" type="submit" class="btn btn-primary mt-2" value="2">อนุมัติ</button>
                  <button name="status" type="submit" class="btn btn-warning mt-2" value="3">ไม่อนุมัติ</button>
                  <button name="status" type="submit" class="btn btn-danger mt-2" value="4">ยกเลิก</button>
               </div>
            </form>
         </td>
         <td> {{$division->reason}} </td>
         <td> {{$division->approver_id}} </td>
      </tbody>
      @endforeach
   </table>
</div>
</body>
</html>
