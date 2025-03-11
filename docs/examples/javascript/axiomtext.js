const API_TOKEN = 'votre_token_api';
const API_URL = 'https://api.axiomtext.com/api';

// Envoyer un SMS
async function sendSMS(to, message, signature = 'MaSociete') {
  try {
    const response = await fetch(`${API_URL}/sms/message`, {
      method: 'POST',
      headers: {
        'Authorization': `Bearer ${API_TOKEN}`,
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ to, message, signature })
    });
    
    const data = await response.json();
    return data;
  } catch (error) {
    console.error('Erreur lors de l\'envoi:', error);
    throw error;
  }
}

// Envoyer un OTP
async function sendOTP(phone, signature = 'MaSociete') {
  try {
    const response = await fetch(`${API_URL}/sms/otp/send`, {
      method: 'POST',
      headers: {
        'Authorization': `Bearer ${API_TOKEN}`,
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ phone, signature })
    });
    
    const data = await response.json();
    return data;
  } catch (error) {
    console.error('Erreur lors de l\'envoi:', error);
    throw error;
  }
}

// Vérifier un OTP
async function verifyOTP(phone, code) {
  try {
    const response = await fetch(`${API_URL}/sms/otp/verify`, {
      method: 'POST',
      headers: {
        'Authorization': `Bearer ${API_TOKEN}`,
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({ phone, code })
    });
    
    const data = await response.json();
    return data;
  } catch (error) {
    console.error('Erreur lors de la vérification:', error);
    throw error;
  }
} 