@extends('beautymail::templates.widgets')
@section('content')
    @include('beautymail::templates.widgets.articleStart')
    <h2>PropertyZone Registration Notification</h2>
    <p>Dear {{ $name }},</p>
    <div>
        <p>{{ $r_message }}</p>
        <table>
            <tr>
                <td>Designation</td>
                <td>{{ $designation }}</td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>{{ $gender }}</td>
            </tr>
            <tr>
                <td>First Name</td>
                <td>{{ $firstname }}</td>
            </tr>
            <tr>
                <td>Last Name</td>
                <td>{{ $lastname }}</td>
            </tr>
            <tr>
                <td>Occupation</td>
                <td>{{ $occupation }}</td>
            </tr>
            <tr>
                <td>Email</td>
                <td>{{ $email }}</td>
            </tr>
            <tr>
                <td>Mobile</td>
                <td>{{ $phone }}</td>
            </tr>
            <tr>
                <td>Refferal Code</td>
                <td>{{ $referral_code }}</td>
            </tr>
        </table>
        <p>Other details are in the attached file. Should you require any corrections to be made, please do not hesitate to contact us.</p>
        <p>Thanks you,</p>
        <p></p>
        <p>Regards,</p>
        <p>PropertyZone.</p>
    </div>
    @include('beautymail::templates.widgets.articleEnd')
@stop