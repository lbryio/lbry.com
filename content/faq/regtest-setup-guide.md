---
title: How do I setup an isolated regtest network to test LBRY?
category: developer
---

## Prerequisites

To begin setting up the network, there are a few things you need.

Note that you need a Linux distribution to run all this. A virtual machine is
fine.

### virtual environment

First up it's a good idea to create a Python virtual environment. This requires
you to have a functional python2.7 setup, with the Python package manager `pip`
installed. To create a new virtual environment in a folder `lbry-env`, run this:
`virtualenv -p /usr/bin/python2.7 lbry-env` To enter the environment, run
`source lbry-env/bin/activate`.

### lbrycrd

You need to download a build of `lbrycrd` from [here](https://github.com/lbryio/lbrycrd/releases/), no installation required.
To configure `lbrycrd` you to create a file at `~/.lbrycrd/lbrycrd.conf`,
containing the following.
```ini
rpcuser=test
rpcpassword=test
rpcport=18332
rpcallowip=0.0.0.0/0
regtest=1
dnsseed=0
upnp=0
server=1
txindex=0
daemon=0
```

### lbry

Download source from [here](https://github.com/lbryio/lbry/releases), and run the following inside the environment.
```bash
cd lbry
pip2 install -r requirements.txt
pip2 install .
```

### lbryum

To install lbryum, first download the source from [here](https://github.com/lbryio/lbryum/releases). To install it, run
the following inside the virtual environment.
```bash
cd lbryum
pip2 install -r requirements.txt
pip2 install .
```


### lbryum-server

To install lbryum-server you first need to install the package `leveldb`. After
that, download the source from [here](https://github.com/lbryio/lbryum-server/releases), and run the following inside the
environment.
```bash
cd lbryum-server
pip2 install -r requirements.txt
```

If you're not running debian/*buntu, or a derivative of those, you need to
edit the `configure` file a bit. On line 11, remove the `apt-get` line and
manually install the requried packages. On line 48, change `adduser` to
`useradd` and on the same line, change `--disabled-password` to `-p !`.

```bash
sudo ./configure
sudo python2 setup.py install
```

When installed, append the following to the `/etc/lbryum.conf` file.
```ini
[lbrycrdd]
lbrycrdd_host = localhost
lbrycrdd_port = 18332
lbrycrdd_user = test
lbrycrdd_password = test

[network]
type = lbrycrd_regtest
```

## Setup

### Wallet backup

To start off with, if you've already used LBRY on your machine, you need to
backup the wallet by copying the folders `~/.lbrynet` and `~/.lbryum`, then
delete them to start from fresh. Run
`mkdir ~/.lbryum; touch ~/.lbryum/blockchain_headers` to create a new empty
file there. If you don't do this, it'll try downloading the current blockchain
headers from a server.

### lbrycrd

To run the `lbrycrd` daemon, run the following in the `lbrycrd` folder.
`./lbrycrdd`

To generate blocks, run `./lbrycrd-cli generate <num_of_blocks>`
You'll need to generate some blocks to get the network going.
Start off by generating 100.


### lbryum

To run the server, run `lbryum-server`.

You also need to run the `lbryum` daemon, `lbryum daemon start -v`

After that, you need to setup lbryum. Run the following two commands to make
it use the local server in regtest mode.
```bash
lbryum setconfig default_servers '{ "localhost": { "t": "50001" }}'
lbryum setconfig chain 'lbrycrd_regtest'
```

At this point it's a good idea to restart everything. Generate some more
blocks, get a wallet address by `lbrynet-cli wallet_new_address`, and then
send some credits to your wallet by doing
`./lbrycrd-cli sendtoaddress <address> <num_of_credits>`

### lbry

You can now run `lbrynet-daemon`, and it should connect to the `lbryum server`.
If you want to publish a claim inside the regtest network, you need to edit
`reflect_uploads` on line 177 in `lbry/lbrynet/conf.py` from `True` to `False`.

## Shutdown

To stop the network, run `lbrynet-cli daemon_stop`, `lbryum daemon stop`, and
kill the `lbryum-server` and `lbrycrdd` processes. If you want to use your
wallet and the official servers again, backup the new regtest wallet, and
replace it with your own.

## Note
If something goes wrong and you get a "Block not found" error, remember to
delete `/var/lbryum-server` before trying again.

## Cheatsheet

#### Required processes in the correct order
```bash
lbrycrdd -regtest -server -printtoconsole

lbryum-server

lbryum daemon start -v

lbrynet-daemon
```

#### Generate blocks
```bash
lbrycrd-cli generate 5
```

#### Get a wallet address
```bash
lbrynet-cli wallet_new_address
```

#### Send credits from lbrycrd to your wallet
```bash
lbryrd-cli sendtoaddress <address> <num_of_credits>
```
