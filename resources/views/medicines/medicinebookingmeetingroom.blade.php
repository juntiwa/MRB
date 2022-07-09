<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title>กรอกข้อมูลเพื่อจองห้องประชุม</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{route('medicine.booking.meeting.room.store')}}" method="POST">
    @csrf
    <div class="container d-flex flex-column">
       <p>{{$data}}</p>
        <label for="title">หัวเรื่อง</label>
        <input type="text" name="title" id="title" value="foo" required>

        <label for="name_coordinate">ชื่อผู้ประสานงาน</label>
        <input type="text" name="name_coordinate" id="name_coordinate" value="bar">

        <label for="comment">รายละเอียดเพิ่มเติม</label>
        <textarea name="comment" id="comment"  value="{{old('comment')}}">comment</textarea>

        <label for="checkbox">อุปกรณ์ที่ต้องการ</label>
        <div>
            <p><input type="checkbox" name="equipment[computer]" @checked(old('equipment.computer')) id="computer"> Computer</p>
            <p><input type="checkbox" name="equipment[lcdprojecter]" @checked(old('equipment.lcdprojecter')) id="lcdprojecter"> LCD Projecter</p>
            <p><input type="checkbox" name="equipment[visualizer]" @checked(old('equipment.visualizer')) id="visualizer"> Visualizer</p>
            <p><input type="checkbox" name="equipment[sound]" @checked(old('equipment.sound')) id="sound"> ระบบเสียง</p>
            <p><input type="text" name="equipment[other]" value="{{old('equipment.other')}}" id="input_other" placeholder="โปรดระบุ"></p>
            <p><input type="submit" class="btn btn-info" value="บันทึกการจอง"></p>
        </div>

    </div>
</form>
</body>
</html>
