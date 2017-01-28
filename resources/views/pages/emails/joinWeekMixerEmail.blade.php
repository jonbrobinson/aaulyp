<h2><strong>RSVP Confirmed</strong></h2>

<p>A new order has been placed</p>

<p>RSVP count: {{ $ticketsInfo['total'] }}</p>

<table style="border: none">
    <tr>
        <th>Ticket Type</th>
        <th>Count</th>
    </tr>
    @foreach( $ticketsInfo['ticketTypes'] as $ticketInfo)
        <tr>
            <td>{{ $ticketInfo['name'] }} &nbsp</td>
            <td>{{ $ticketInfo['sold'] }} &nbsp</td>
        </tr>
    @endforeach
</table>
<p>--<br><em>Yours in the movement</em></p>
<p>
    <strong>Jonathan Robinson</strong><br>
    Communication Chair | Austin Area Urban League Young Professionals<br>
    <a href="http://www.facebook.com/aaulyp">Facebook</a> | <a href="http://www.twitter.com/aaulyp">Twitter</a> | <a href="http://www.instagram.com/aaulyp">Instagram</a> | <a href="http://www.aaulyp.org">Aaulyp.org</a> <br>
</p>
<img src="http://s32.postimg.org/5w9yuk785/UL_black.png" alt="" style="max-width: 200px">