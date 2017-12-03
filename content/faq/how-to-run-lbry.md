---
title: How do I run LBRY from the command line?
category: setup
---
This guide will allow you to run the LBRY daemon which connects to the LBRY network. You can run the daemon separately in this fashion without having to start the LBRY app. If the LBRY app is started, it will utilize the running daemon. 

## Windows
1. Open a **Command Prompt** application window
1. Type `cd "c:\Program Files (x86)\LBRY\resources\app\dist"` and click Enter
1. Type `lbrynet-daemon` and click Enter. 

## MacOS
1. Open a **Terminal** window
1. Type `cd /Applications/LBRY.app/Contents/Resources/app/dist`
1. Type `./lbrynet-daemon` and click Enter. 

## Ubuntu / Linux 
1. Open a **Terminal** window
1. Type `cd /opt/LBRY/resources/app/dist` or build location if running from source 
1. Type `./lbrynet-daemon` and click Enter. 
