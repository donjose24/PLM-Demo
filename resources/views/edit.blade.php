<h1> Edit Contact</h1>

<form action="/contact" method = "put">

    {{ csrf_field() }}
    <label> First name </label> <br>
    <input type="text" name="first_name" value="{{ $contact->first_name }}"> <br>
    <label> Last name </label> <br>
    <input type="text" name="last_name" value="{{ $contact->last_name }}"> <br>
    <label> Contact Number </label> <br>
    <input type="text" name="contact_number" value="{{ $contact->contact_number }}"> <br>
    <input type="hidden" name="id" value="{{ $contact->id }}">

    <input type="submit" value="Save">
</form>

