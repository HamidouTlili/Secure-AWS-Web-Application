import json

with open('var/log/cowrie/cowrie.json', 'r') as f:
    data = [json.loads(line) for line in f if 'cowrie.login' in line]
with open('login_attempts.json', 'w') as f:
    json.dump(data, f, indent=2)
