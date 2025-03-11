#!/bin/bash

# Envoyer un OTP
curl -X POST https://api.axiomtext.com/api/sms/otp/send \
  -H "Authorization: Bearer votre_token_api" \
  -H "Content-Type: application/json" \
  -d '{
    "phone": "+221xxxxxxxxx",
    "signature": "MaSociete"
  }' 