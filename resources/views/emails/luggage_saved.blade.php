<!DOCTYPE html>
<html>
<head>
    <title>Equipaje Guardado</title>
</head>
<body>
    <h1>¡Hola, {{ $user->name }}!</h1>
    <p>Tu equipaje ha sido guardado exitosamente.</p>
    <p><strong>Detalles del equipaje:</strong></p>
    <ul>
        <li>Tipo de maleta: {{ $luggageDetails['maletatype'] }}</li>
        <li>Color: {{ $luggageDetails['colormaleta'] }}</li>
        <li>Peso: {{ $luggageDetails['pesomaleta'] }} Kg</li>
        <li>Lugar de registro: {{ $luggageDetails['lugarmaleta'] }}</li>
    </ul>
</body>
</html>
