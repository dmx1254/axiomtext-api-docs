#!/bin/bash

# Vérifier un OTP
curl -X POST https://api.axiomtext.com/api/sms/otp/verify \
  -H "Authorization: Bearer votre_token_api" \
  -H "Content-Type: application/json" \
  -d '{
    "phone": "+221xxxxxxxxx",
    "code": "123456"
  }' 