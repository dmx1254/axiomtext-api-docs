#!/bin/bash

# Envoyer un SMS
curl -X POST https://api.axiomtext.com/api/sms/message \
  -H "Authorization: Bearer votre_token_api" \
  -H "Content-Type: application/json" \
  -d '{
    "to": "+221xxxxxxxxx",
    "message": "Votre message",
    "signature": "MaSociete"
  }' 