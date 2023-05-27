#!/bin/bash

# Check if the Cloudflared default configuration file exists
if [ ! -f ~/.cloudflared/config.yml ] && [ ! -f ~/.cloudflared/config.yaml ]; then
    echo "Default configuration file not found. Creating a new one..."
    mkdir -p ~/.cloudflared
    touch ~/.cloudflared/config.yml
fi

# Add necessary configuration to the file
echo "Creating configuration entries..."
echo "proxy-dns: true" >> ~/.cloudflared/config.yml
echo "proxy-dns-upstream:
  - https://1.1.1.1/dns-query
  - https://1.0.0.1/dns-query" >> ~/.cloudflared/config.yml

# Create a directory to store the certificate files
cert_dir=~/.cloudflared/certificate_pool
mkdir -p "$cert_dir"

# Generate a self-signed root certificate
root_key="$cert_dir/root.key"
root_cert="$cert_dir/root.crt"

openssl genpkey -algorithm RSA -out "$root_key"
openssl req -new -key "$root_key" -x509 -days 365 -out "$root_cert"

# Start the Cloudflared service with the root certificate pool
echo "Starting Cloudflared service..."
cloudflared --origin-ca-pool "$root_cert" service start

