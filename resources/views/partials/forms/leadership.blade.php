<div class="row">
    <div class="row">

        <div class="col-md-4 col-md-offset-4">
            <div class="form-group">
                <input type="hidden" name="profile_pic" role="uploadcare-uploader" class="form-control" data-crop="1:1"/>
            </div>
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="first_name" class="control-label sr-only">First Name</label>
            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="First Name" value="{{ old('name_first') }}">
        </div>
    </div>
    <div class="col-sm-4">
        <div class="form-group">
            <label for="last_name" class="control-label sr-only">Last Name</label>
            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Last Name" value="{{ old('name_last') }}">
        </div>
    </div>
    <div class="col-sm-4">
        <label for="poition" class="control-label sr-only">Last Name</label>
        <select name="position" class="form-control">
            <option disabled selected value>Choose a Board Position</option>
            <option value="President">President</option>
            <option value="Vice President">Vice President</option>
            <option value="Treasurer">Treasurer</option>
            <option value="Secretary">Secretary</option>
            <option value="Communication Chair">Communication Chair</option>
            <option value="Community Outreach Chair">Community Outreach Chair</option>
            <option value="Fundraising Chair">Fundraising Chair</option>
            <option value="Membership & Social Chair">Membership & Social Chair</option>
            <option value="Professional Development Chair">Professional Development Chair</option>
            <option value="Political Chair">Political Chair</option>
        </select>
    </div>
</div>
<div class="form-group">
    <label for="description" class="control-label sr-only">Message</label>
    <div class="col-sm-12">
        <textarea class="form-control" id="description" name="description" rows="5" cols="30" placeholder="Short Description"></textarea>
    </div>
</div>
<div class="form-group">
    <label for="email" class="control-label sr-only">Message</label>
    <div class="col-sm-3">
        <input class="form-control" id="email" name="email" rows="5" cols="30" placeholder="Email" >
    </div>
    <label for="event-social-facebook" class="control-label sr-only">Message</label>
    <div class="col-sm-3">
        <input class="form-control" id="event-social-facebook" name="contact-facebook" rows="5" cols="30" placeholder="Facebook" value="{{ old('event-social-facebook') }}">
    </div>
    <label for="event-social-twitter" class="control-label sr-only">Message</label>
    <div class="col-sm-3">
        <input class="form-control" id="event-social-twitter" name="contact-twitter" rows="5" cols="30" placeholder="Twitter" value="{{ old('event-social-twitter') }}">
    </div>
    <label for="event-social-instagram" class="control-label sr-only">Message</label>
    <div class="col-sm-3">
        <input class="form-control" id="event-social-instagram" name="contact-instagram" rows="5" cols="30" placeholder="Instagram" value="{{ old('event-social-instagram') }}">
    </div>
</div>
<div class="form-group">
    <div class="col-sm-12">
        <button type="submit" class="btn btn-primary">Publish</button>
    </div>
</div>