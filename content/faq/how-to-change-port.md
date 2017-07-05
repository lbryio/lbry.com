---
title: How to change default deamon peer port?
category: setup
---

#### Why it occurs?

It usually occurs when some other service is already using the default TCP port 3333.


### How to solve the problem?


#### If LBRY is not starting and spews "couldn't bind to port 3333"

Open the file `lbrynet/conf.py`

Locate the line:

```python
'peer_port': (int, 3333),
```

And change the value to the desired unused port.

After that run the command `python setup.py install` from the repo's root directory.


#### If LBRY Daemon is running and you want to change it for the next run

You can change it via the following [api](/api) call

    curl 'http://localhost:5279/lbryapi' --data '{"method":"settings_set", "params":{"peer_port":<port-num>}}'

Or via cli command

	lbrynet-cli settings_set --peer_port 3333
