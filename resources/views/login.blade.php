<style>
    li {
        list-style-type: none;
        display:inline;
        padding-right: 2px;
    }
</style>
<h1> Add Contact</h1>

<form action="/contact" method = "post">

    {{ csrf_field() }}
    <label> First name </label> <br>
    <input type="text" name="first_name"> <br>
    <label> Last name </label> <br>
    <input type="text" name="last_name"> <br>
    <label> Contact Number </label> <br>
    <input type="text" name="contact_number"> <br>

    <input type="submit" value="Add">
</form>

<table>
    <tr>
        <th> First Name </th>
        <th> Last Name </th>
        <th> Contact Number </th>
        <th> Created At </th>
        <th> Updated At </th>
        <th> Delete ? </th>
        <th> Edit ? </th>
    </tr>
    @foreach($contacts as $contact)
        <tr>
            <td> {{$contact->first_name}}</td>
            <td> {{$contact->last_name}}</td>
            <td> {{$contact->contact_number}}</td>
            <td> {{$contact->created_at->format('Y-m-d')}}</td>
            <td> {{$contact->updated_at->format('Y-m-d')}}</td>
            <td>
                <form action="/contact" method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="id" value="{{$contact->id}}">
                    <input type="submit" value="Delete">
                </form>
            </td>
            <td>
                <a href="/contact/{{$contact->id}}/edit"> Edit </a>
            </td>
        </tr>
    @endforeach
</table>
{{ $contacts->links() }}
