<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>เหตุผล</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
   <div class="container">
      เหตุผลไม่อนุมัติ หรือ ยกเลิกการจองห้องประชุมสาขา
      <form action="{{route('division.reason.store')}}" method="post">
         @csrf
         กรอกเหตุผล
         <input type="text" name="reason" id="reason">
         <button type="submit" class="btn btn-info">save</button>
      </form>
   </div>
</body>
</html>
