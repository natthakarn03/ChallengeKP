<a href="{{url('/')}}">
    <input type='submit' name='btnGoReview' value='Lihat Review'>
</a>

<form method='post' action='postMovie'>
    @csrf 
    <br>
    Nama Film:<input type='text' name='txtNama'><br>
    Tahun Rilis:<input type='text' name='txtRilis'><br>
    <input type='submit' name='btnSubmit' value='Submit'>
</form>

<table border='1'>
    @foreach($datamovie as $rowmovie)
        <tr>
            <td>{{ $rowmovie->idMovie }}</td>
            <td>{{ $rowmovie->namaMovie }}</td>
            <td>{{ $rowmovie->comment }}</td>
        </tr>
    @endforeach
    </table>

<form method='post' action='updateMovie'>
    @csrf 
    <br>
    Nama Film:<input type='text' name='txtNama'><br>
    Tahun Rilis:<input type='text' name='txtRilis'><br>
    <input type='submit' name='btnUpdate' value='Update'>
</form>

<form method='post' action='deleteMovie'>
    @csrf 
    <br>
    ID Film:<input type='text' name='txtidMovie'><br>
    Nama Film:<input type='text' name='txtNama'><br>
    <input type='submit' name='btnDelete' value='Delete'>
</form>

