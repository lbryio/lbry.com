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

For installing the daemon head over to our [github page](https://github.com/lbryio/lbry) and follow the instructions there to set it up.

Next, run the daemon(if you followed the steps then it should be running inside a virtual environment). By default the deamon runs on port 3333, if for some reason you need to change it, the appropriate guide could be found [here](https://lbry.io/faq/how-to-change-port).

Just remember to run your script in the same virtual environment as the daemon.

All the API calls in the script are made using the structure `<api_client_object>.<api_command>(parameters)`

Now you're all set.

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

These are one of the few things that can be done using python. We encourage you to try out your variations.
