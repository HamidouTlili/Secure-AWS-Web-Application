import json
import matplotlib.pyplot as plt

with open('login_attempts.json', 'r') as f:
    data = json.load(f)
timestamps = [entry['timestamp'] for entry in data]
plt.plot(timestamps, range(len(timestamps)), 'bo-')
plt.title('Cowrie Login Attempts Over Time')
plt.xlabel('Timestamp')
plt.ylabel('Attempt Count')
plt.savefig('login_attempts.png')
plt.close()
