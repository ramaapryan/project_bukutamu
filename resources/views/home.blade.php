<!DOCTYPE html>
<html>
<head>
    <title>Buku Tamu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <h1><center>Buku Tamu gae arek resepsionis terkhusus divisi UMUM</h1>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <!-- <h2>Welcome,</h2> -->
    <div class="container">
        <form action="/buku-tamu" method="POST">
            @csrf
            <div class="form-group">
                <label for="nama">Nama:</label>
                <input type="text" class="form-control" id="nama" name="nama" required>
            </div>
            <div class="form-group">
                <label for="alamat">Alamat:</label>
                <input type="text" class="form-control" id="alamat" name="alamat" required>
            </div>
            <div class="form-group">
                <label for="tgl_berkunjung">Tanggal Berkunjung:</label>
                <input type="date" class="form-control" id="tgl_berkunjung" name="tgl_berkunjung" required>
            </div>
            <div class="form-group">
                <label for="kepentingan">Kepentingan:</label>
                <input type="text" class="form-control" id="kepentingan" name="kepentingan" required>
            </div>
            <div class="form-group">
                <label for="tujuan">Tujuan:</label>
                <select class="form-control" id="tujuan" name="tujuan" required>
                    <option value="">Pilih Kepentingan</option>
                    <option value="kadin">Kadin</option>
                    <option value="sekdin">Sekdin</option>
                    <option value="kasubag">Kasubag</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

        <a href="{{route('actionlogout')}}" class="btn btn-danger mt-3"><i class="fa fa-power-off"></i> Log Out</a>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
