<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php
    $koneksi = mysqli_connect("localhost", "root", "", "data_mhs");
    ?>

    <form class="insert-data" action="" method="POST">
        <h4>Input Data Mahasiswa</h4>

        <div class="isi-data">
            <label for="">Nama</label>
            <input type="text" name="nama">
        </div class="isi-data">
        <div class="isi-data">
            <label for="">NIM</label>
            <input type="text" name="nim">
        </div class="isi-data">
        <div class="isi-data">
            <label for="">Alamat</label>
            <input type="text" name="alamat">
        </div class="isi-data">
        <div class="isi-data">
            <label for="">Program Studi</label>
            <input type="text" name="prodi">
        </div class="isi-data">
        <div class="simpan-data">
            <input class="simpan" type="submit" value="simpan" name="proses">
            <?php
            if (isset($_POST['proses'])) {
                mysqli_query($koneksi, "INSERT INTO Mahasiswa set 
        nama =  '$_POST[nama]',
        nim =  '$_POST[nim]',
        alamat =  '$_POST[alamat]',
        jurusan =  '$_POST[prodi]'
        ");
                echo '
                    <p class="verivikasi">Data berhasil di simpan</p>
                ';
            }
            ?>
        </div>
    </form>

    <form action="" class="select-data" method="POST">

        <table>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>Program Studi</th>
            </tr>
            <?php
            $no = 1;
            $ambilData = mysqli_query($koneksi, "SELECT * FROM Mahasiswa");
            while ($tampil = mysqli_fetch_array($ambilData)) {
                echo "
                    <tr>
                        <td>$no</td>
                        <td>$tampil[NIM]</td>
                        <td>$tampil[Nama]</td>
                        <td>$tampil[Alamat]</td>
                        <td>$tampil[Jurusan]</td>
                    </tr>
                    ";
                $no++;
            }
            ?>
        </table>
    </form>


</body>

</html>