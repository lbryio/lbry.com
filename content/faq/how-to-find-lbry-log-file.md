---
title: How do I locate my log files?
category: troubleshooting
---

In certain cases, we may ask you to send us your log file(s). The current log file is titled `lbrynet.log` (or just `lbrynet` if you have file extensions hidden) and is archived each time the files reaches 2MB. Older log files are copied to `lbrynet.log.<#>`. Typically only the lbrynet.log file is required, but we may ask for the others depending on the situation. Since each Operating System has its own set of working directories, use the below guide in order to locate the log file(s).

[Find my logs without opening the app](#manual)

**lbrynet.log files may contain your IP address. While sharing this is not inherently dangerous, if you desire maximum privacy, please mask it before posting to public websites.**

## Find Logs via the LBRY Desktop
You are able to open the log folder from the Help tab in the LBRY app.
From the LBRY App, click on the `Gear` icon on the upper right. Next, select `Help` and then click on "Open Log Folder"
![log](https://spee.ch/@clem:0/openlog.png)
The folder will be highlighted, so just double click to open and here you will see "lbrynet.log" or just "lbrynet".

## Sending log files from Android
Navigate to the **About** page and use the **Send Logs** button at the bottom. You can email them to [help@lbry.com](mailto:help@lbry.com)

## Find logs manually {#manual}
### Windows
1. Open File Explorer (Keyboard shortcut: Windows Key + E).
2. Type `%localappdata%\lbry\lbrynet` (or `%appdata%\lbrynet` if you originally installed v0.14 or earlier) into the address bar and click Enter.
3. Here you will see the `lbrynet.log` file and any archives.

### MacOS
1. Open Finder.
2. Click Go in the top menu and choose "Go To Folder".
3. Type "~/Library/Application Support/LBRY" and then click go.
4. Here you will see the `lbrynet.log` file and any archives.

### Ubuntu / Linux *(Exact steps may differ slightly)*
1. Navigate to your home directory. Ensure hidden files and folders are shown if using a graphical file explorer.
2. Navigate to the `.local/share/lbry/lbrynet` folder (or `~/.lbrynet` if you originally installed v0.14 or earlier).
3. Here you will see the `lbrynet.log` file and any archives.

### Android *(Exact steps may differ slightly)*
1. Launch your favorite file explorer.
2. Navigate to `Internal storage\android\data\io.lbry.browser->files\lbrynet`.
3. Here you will see the `lbrynet.log` file and any archives.
