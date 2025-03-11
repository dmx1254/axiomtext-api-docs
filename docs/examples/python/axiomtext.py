import requests

API_TOKEN = 'votre_token_api'
API_URL = 'https://api.axiomtext.com/api'

def send_sms(to, message, signature='MaSociete'):
    """
    Envoie un SMS via l'API.
    
    Args:
        to (str): Numéro de téléphone du destinataire
        message (str): Contenu du message
        signature (str, optional): Signature de l'expéditeur
    
    Returns:
        dict: Réponse de l'API
    """
    try:
        response = requests.post(
            f"{API_URL}/sms/message",
            headers={
                'Authorization': f'Bearer {API_TOKEN}',
                'Content-Type': 'application/json'
            },
            json={
                'to': to,
                'message': message,
                'signature': signature
            }
        )
        response.raise_for_status()
        return response.json()
    except requests.exceptions.RequestException as e:
        print(f"Erreur lors de l'envoi: {e}")
        raise

def send_otp(phone, signature='MaSociete'):
    """
    Envoie un code OTP via l'API.
    
    Args:
        phone (str): Numéro de téléphone du destinataire
        signature (str, optional): Signature de l'expéditeur
    
    Returns:
        dict: Réponse de l'API
    """
    try:
        response = requests.post(
            f"{API_URL}/sms/otp/send",
            headers={
                'Authorization': f'Bearer {API_TOKEN}',
                'Content-Type': 'application/json'
            },
            json={
                'phone': phone,
                'signature': signature
            }
        )
        response.raise_for_status()
        return response.json()
    except requests.exceptions.RequestException as e:
        print(f"Erreur lors de l'envoi: {e}")
        raise

def verify_otp(phone, code):
    """
    Vérifie un code OTP via l'API.
    
    Args:
        phone (str): Numéro de téléphone
        code (str): Code OTP à vérifier
    
    Returns:
        dict: Réponse de l'API
    """
    try:
        response = requests.post(
            f"{API_URL}/sms/otp/verify",
            headers={
                'Authorization': f'Bearer {API_TOKEN}',
                'Content-Type': 'application/json'
            },
            json={
                'phone': phone,
                'code': code
            }
        )
        response.raise_for_status()
        return response.json()
    except requests.exceptions.RequestException as e:
        print(f"Erreur lors de la vérification: {e}")
        raise 