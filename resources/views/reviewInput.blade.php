<a href="{{url('/movieInput')}}">
    <input type='submit' name='btnGoMovie' value='Lihat Movie'>
</a>
<form method='post' action='postReview'>
    @csrf 
    <br>
    Nama User:<input type='text' name='txtNama'><br>
    Isi Comment:<input type='text' name='txtReview'><br>
    <input type='submit' name='btnInsert' value='Simpan Review'>
    <input type='submit' name='btnUpdate' value='Update Review'>
    <input type='submit' name='btnDelete' value='Delete Review'>
</form>

<table border='1'>
    <th>ID REVIEW</th>
    <th>NAMA USER</th>
    <th>ISI COMMENT</th>
    @foreach($datareview as $rowreview)
        <tr>
            <td>{{ $rowreview->idReview }}</td>
            <td>{{ $rowreview->namaReview }}</td>
            <td>{{ $rowreview->comment }}</td>
        </tr>
    @endforeach
</table>