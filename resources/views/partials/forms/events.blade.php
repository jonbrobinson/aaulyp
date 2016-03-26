<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <label for="event-name" class="control-label sr-only">Event Name</label>
            <input type="text" class="form-control" name="event-name" id="event-name" placeholder="Event Name">
        </div>
    </div>
    <div class="col-sm-6">
        <div class="form-group">
            <div class="input-group" id="date-picker-demo">
                <input type="text" name="daterangepicker" id="daterangepicker" class="form-control" placeholder="Choose a Date Range">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            </div>
        </div>
    </div>
</div>
<div class="form-group">
    <label for="event-street" class="control-label sr-only">Street Address</label>
    <div class="col-sm-6">
        <input type="text" class="form-control" name="event-street" id="event-address" placeholder="Street Address">
    </div>
    <label for="event-city" class="control-label sr-only">City</label>
    <div class="col-sm-2">
        <input type="text" class="form-control" name="event-city" id="event-state" placeholder="City">
    </div>
    <label for="event-state" class="control-label sr-only">State</label>
    <div class="col-sm-2">
        <select name="event-state" class="form-control">
            @foreach($states as $code => $state)
                @if($code == 'TX')
                    <option value="{{ $code }}" selected="{{ $state }}">{{ $state }}</option>
                @else
                    <option value="{{ $code }}">{{ $state }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <label for="event-zip" class="control-label sr-only">Zip</label>
    <div class="col-sm-2">
        <input type="text" class="form-control" name="event-zip" id="event-zip" placeholder="Zip">
    </div>
</div>
<div class="form-group">
    <label for="event-description" class="control-label sr-only">Message</label>
    <div class="col-sm-12">
        <textarea class="form-control" id="event-description" name="event-description" rows="5" cols="30" placeholder="Descripe some of the event"></textarea>
    </div>
</div>
<div class="form-group">
    <label for="event-social-facebook" class="control-label sr-only">Message</label>
    <div class="col-sm-3">
        <input class="form-control" id="event-social-facebook" name="contact-facebook" rows="5" cols="30" placeholder="Facebook">
    </div>
    <label for="event-social-twitter" class="control-label sr-only">Message</label>
    <div class="col-sm-3">
        <input class="form-control" id="event-social-twitter" name="contact-twitter" rows="5" cols="30" placeholder="Twitter">
    </div>
    <label for="event-social-instagram" class="control-label sr-only">Message</label>
    <div class="col-sm-3">
        <input class="form-control" id="event-social-instagram" name="contact-instagram" rows="5" cols="30" placeholder="Instagram">
    </div>
    <label for="event-social-instagram" class="control-label sr-only">Message</label>
    <div class="col-sm-3">
        <input class="form-control" id="event-social-instagram" name="contact-website" rows="5" cols="30" placeholder="Website">
    </div>
</div>
<div class="form-group">
    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">Publish</button>
    </div>
</div>