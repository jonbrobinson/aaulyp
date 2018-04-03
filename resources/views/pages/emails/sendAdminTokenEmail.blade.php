<h2><strong>Token Request</strong></h2>

<p>You Have Requested a temporary access token.  This token is Set To Expire {{ date("D M j, Y ", $token->expires_at) }} at {{ date("g:iA", $token->expires_at) }}</p>

<table style="border: none">
    <tr>
        <th>Token</th>
        <th>{{ $token->token }}</th>
    </tr>
</table>

<table style="border: none">
    <tr>
        <th>Page</th>
        <th>Link</th>
    </tr>
    <tr>
        <td>Admin Dashboad &nbsp</td>
        <td>{{ url('admin') . "?token=" . $token->token }} &nbsp</td>
    </tr>
    <tr>
        <td>Officers Edit &nbsp</td>
        <td>{{ url('admin/edit') . "?token=" . $token->token }} &nbsp</td>
    </tr>

</table>
<p>--<br><em>Yours in the movement</em></p>
<p>
    <strong>Jonathan Robinson</strong><br>
    Communication Chair | Austin Area Urban League Young Professionals<br>
    <a href="http://www.facebook.com/aaulyp">Facebook</a> | <a href="http://www.twitter.com/aaulyp">Twitter</a> | <a href="http://www.instagram.com/aaulyp">Instagram</a> | <a href="http://www.aaulyp.org">Aaulyp.org</a> <br>
</p>
<img src="http://s32.postimg.org/5w9yuk785/UL_black.png" alt="" style="max-width: 200px">