<p>Nouvelle demande de contact via KiaRécup</p>

<ul>
    <li>Nom : <b>{{ $email->lastname }}</b></li>
    <li>Prénom : <b>{{ $email->firstname }}</b></li>
    <li>Email : <b>{{ $email->email }}</b></li>
    <li>Numéro de téléphone : <b>@if ( !empty($email->phone) ) {{ $email->phone }} @endif</b></li>
    <li>Numéro de châssis : <b>@if ( !empty($email->chassis_number) ) {{ $email->chassis_number }} @endif</b></li>
    <li>Référence pièce : <b>@if ( !empty($email->piece_reference) ) {{ $email->piece_reference }} @endif</b></li>
    <li>
        Message :<br>
        <b>@if ( !empty($email->message) ) {{ $email->message }} @endif</b>
    </li>
    <li>@if ( !empty($email->files_id) ) {{ count($email->files_id) }} pièce(s) jointe(s) @else Aucune pièce jointe @endif</li>
</ul>