---
title: How do I use Python to interact with the LBRY daemon?
category: developer
---

## The LBRY API

You need to know about LBRY API and which calls are available, the best way for doing this is to go through our [API Documentation](https://lbry.io/api).

## How to "pythonize" LBRY API?

Well, we can't tell you that, it's a secret.

**Just Kidding!**

The basics steps to be followed are pretty straightforward:
1. Import the API Client
2. Create an object
3. Call the API you wish to use along with the parameters

Remember to have your lbrynet-daemon running, and execute this script inside the same virtual environment as the daemon's

### Some examples to get you started

If you want to resolve the uri "one" then you can do this using the following method
```python
from lbrynet.daemon import get_client  # this imports the API client
api_client = get_client()  # This creates and initializes the API client object

print api_client.resolve(uri="one")  # `resolve` is the API call with `uri="one"` as parameter
```

Now onto something a bit more complicated. You could use something along the lines of the following script to change the settings of the daemon
```python
from lbrynet.daemon import get_client
api_client = get_client()

amt = int(raw_input("Enter the max key fee amount: "))
currency = raw_input("Enter currency symbol(LBC, USD, BTC): ")
dto = int(raw_input("Download Timeout: "))

print api_client.settings_set(max_key_fee={"amount":amt,"currency":currency}, download_timeout=dto))
```

These are one of the few things that can be done using python. We encourage you to try out your variations. All the API calls can be made using the structure `api_client.<api_command>(parameters)`
