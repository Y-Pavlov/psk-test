<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Converter</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
</head>
<body>
   <div class="container d-flex justify-content-center">
       <form class="w-50 mt-5" enctype="multipart/form-data">
           <div class="mb-3">
               <label for="formFile" class="form-label">Загрузите json файл с html</label>
               <input class="form-control" type="file" id="formFile">
           </div>
           <button class="btn btn-primary" id="file-btn">Конвертировать</button>
       </form>
   </div>
   <div class="append"></div>
   <script src="assets/js/script.js"></script>
</body>
</html>
