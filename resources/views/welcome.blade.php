<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
</head>

<body>
    <form method="post">
        <input type="number" name="nip" required placeholder="NIP/NIK">
        <button type="submit" class="btn-submit">Cek Reset</button>
        <br><br>
        <input type="text" name="nama" id="nama" disabled>
        <br><br>
        <input type="text" name="opd" id="opd" disabled>
        <br><br>
        <p>File Pendukung</p>
        <input type="file" name="" id="">
        <br><br>
        <p>Alasan Reset</p>
        <textarea name="" id="" cols="30" rows="10"></textarea>
        <br><br>
        <button>Kirim</button>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous">
    </script>
</body>
<script type="text/javascript">
    $(".btn-submit").click(function(e){  
        e.preventDefault();
   
        var nip = $("input[name=nip]").val();
   
        $.ajax({
           type:'POST',
           url:"{{ url('ceknip') }}",
           data:{nip:nip},
           success:function(data){
            //   alert(data.success);
            if (typeof data.message == 'undefined') {
                console.log(data);
                $("#nama").val(data.nama);$("#opd").val(data.opd);
                            } else {
            alert(data.message);
            }
           }
        });
  
    });
</script>

</html>