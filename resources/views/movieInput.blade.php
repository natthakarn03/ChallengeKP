<a href="{{url('/reviewInput')}}">
    <input type='submit' name='btnGoReview' value='Lihat Review'>
</a>

<form method='post' action='postMovie'>
    @csrf 
    <br>
    ID Film: <input type='text' name='txtID'><br>
    Nama Film:<input type='text' name='txtNama'><br>
    Tahun Rilis:<input type='text' name='txtRilis'><br>
    <input type='submit' name='btnInsert' value='Simpan Film'>
    <input type='submit' name='btnUpdate' value='Update Film'>
    <input type='submit' name='btnDelete' value='Delete Film'>
</form>

<table border='1'>
    <th>ID MOVIE</th>
    <th>NAMA FILM</th>
    <th>TAHUN RILIS</th>
    @foreach($datamovie as $rowmovie)
        <tr>
            <td>{{ $rowmovie->idMovie }}</td>
            <td>{{ $rowmovie->namaMovie }}</td>
            <td>{{ $rowmovie->tahunRilis }}</td>
        </tr>
    @endforeach
</table>

