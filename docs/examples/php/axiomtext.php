<?php
$apiToken = 'votre_token_api';
$apiUrl = 'https://api.axiomtext.com/api';

// Envoyer un SMS
function sendSMS($to, $message, $signature = 'MaSociete') {
    global $apiToken, $apiUrl;
    
    $data = [
        'to' => $to,
        'message' => $message,
        'signature' => $signature
    ];
    
    $ch = curl_init("$apiUrl/sms/message");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer $apiToken",
        'Content-Type: application/json'
    ]);
    
    $response = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);
    
    if ($error) {
        throw new Exception("Erreur lors de l'envoi: $error");
    }
    
    return json_decode($response, true);
}

// Envoyer un OTP
function sendOTP($phone, $signature = 'MaSociete') {
    global $apiToken, $apiUrl;
    
    $data = [
        'phone' => $phone,
        'signature' => $signature
    ];
    
    $ch = curl_init("$apiUrl/sms/otp/send");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer $apiToken",
        'Content-Type: application/json'
    ]);
    
    $response = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);
    
    if ($error) {
        throw new Exception("Erreur lors de l'envoi: $error");
    }
    
    return json_decode($response, true);
}

// Vérifier un OTP
function verifyOTP($phone, $code) {
    global $apiToken, $apiUrl;
    
    $data = [
        'phone' => $phone,
        'code' => $code
    ];
    
    $ch = curl_init("$apiUrl/sms/otp/verify");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer $apiToken",
        'Content-Type: application/json'
    ]);
    
    $response = curl_exec($ch);
    $error = curl_error($ch);
    curl_close($ch);
    
    if ($error) {
        throw new Exception("Erreur lors de la vérification: $error");
    }
    
    return json_decode($response, true);
} 