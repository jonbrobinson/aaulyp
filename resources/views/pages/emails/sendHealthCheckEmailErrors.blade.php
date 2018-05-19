<h2><strong>Health Check Errors: Aaulyp.org</strong></h2>

<p>The following Pages are Down</p>

<table style="border: none">
    <tr>
        <th>Link</th>
        <th>Code</th>
        <th>Message</th>
    </tr>
    @foreach($errors as $error)
    <tr>
        <td>{{ $error->getUrl() }}</td>
        <td>{{ $error->getCode() }}</td>
        <td>{{ $error->getMessage() }}</td>
    </tr>
    @endforeach()

</table>
<p>--<br><em>Yours in the movement</em></p>
<p>
    <strong>Jonathan Robinson</strong><br>
    Communication Chair | Austin Area Urban League Young Professionals<br>
    <a href="http://www.facebook.com/aaulyp">Facebook</a> | <a href="http://www.twitter.com/aaulyp">Twitter</a> | <a href="http://www.instagram.com/aaulyp">Instagram</a> | <a href="http://www.aaulyp.org">Aaulyp.org</a> <br>
</p>
<img src="http://s32.postimg.org/5w9yuk785/UL_black.png" alt="" style="max-width: 200px">