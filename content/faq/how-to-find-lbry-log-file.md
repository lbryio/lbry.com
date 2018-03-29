---
title: How do I locate my log files?
category: troubleshooting
---

In certain cases, we may ask you to send us your log file(s).  The current log file is titled `lbrynet.log` (or just `lbrynet` if you have file extensions hidden) and is archived each time the files reaches 2MB. Older log files are copied to `lbrynet.log.<#>`. Typically only the lbrynet.log file is required, but we may ask for the others depending on the situation.  Since each Operating System has its own set of working directories, use the below guide in order to locate the log file(s).

 **lbrynet.log files may contain your IP address. While sharing this is not inherently dangerous, if you desire maximum privacy, please mask it before posting to public websites.**

## Windows
1. Open File Explorer (Keyboard shortcut: Window Key + E)
1. Type `%localappdata%\lbry\lbrynet` (or `%appdata%\lbrynet` if you originally installed v0.14 or earlier) into the address bar and click Enter.
2. Here you will see the `lbrynet.log` file and any archives. 

## MacOS
1. Open Finder.
1. Click Go in the top menu and choose "Go To Folder".
1. Type "~/Library/Application Support/LBRY" and then click go.
2. Here you will see the `lbrynet.log` file and any archives. 

## Ubuntu / Linux *(Exact steps may differ slightly)* 
1. Navigate to your home directory. Ensure hidden files and folders are shown if using a graphical file explorer.
2. Navigate to the `.local/share/lbry/lbrynet` folder (or `~/.lbrynet` if you originally installed v0.14 or earlier).
3. Here you will see the `lbrynet.log` file and any archives. 
