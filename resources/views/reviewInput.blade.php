<a href="{{url('/movieInput')}}">
    <input type='submit' name='btnGoMovie' value='Lihat Movie'>
</a>
<form method='post' action='postReview'>
    @csrf 
    <br>
    Nama:<input type='text' name='txtNama'><br>
    Comment:<input type='text' name='txtReview'><br>
    <input type='submit' name='btnSubmit' value='Submit'>
</form>

<form method='post' action='updateReview'>
    @csrf 
    <br>
    Nama:<input type='text' name='txtNama'><br>
    Comment:<input type='text' name='txtReview'><br>
    <input type='submit' name='btnUpdate' value='Update'>
</form>

<form method='post' action='deleteReview'>
    @csrf 
    <br>
    
    <input type='submit' name='btnDelete' value='Delete'>
</form>