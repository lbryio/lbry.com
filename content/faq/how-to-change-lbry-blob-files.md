---
title: How do I change the location of blob files / hosted data?
category: troubleshooting
---

When you use the application LBRY Desktop on GNU/Linux, MacOS or Windows, you participate in the LBRY protocol which is a peer to peer, decentralized file sharing network similar to BitTorrent. As you upload and download content, the app will utilize your hard disk space for storing 2MB chunks of data used to share with others. The folder where these files are stored is named **blobfiles**, which is inside the [lbrynet folder](/faq/lbry-directories) and may grow over time. Currently there is no cleanup mechanism in place, so your drive may fill up with extended usage.

Currently there is no way to choose the location where these files are stored. The download folder setting is for the content files themselves, not the 2MB chunks. Because the application is installed on the operating system partition by default, this can be a problem if your partition is limited.

At this time, the easiest workaround to change the blob files location is to use the command line (or [GUI for Windows](#GUI)) to redirect one folder to another. This redirect is called symbolic link, also known as a symlink or soft link, which is something like a shortcut in Windows.

**Tip**: Periodically, when you want or your free space became too small on drive, you can access this new cache folder created and then delete all it's content, regaining the space occupied by downloaded blob files.

Since each Operating System has its own set of rules, use the below guide according to your situation to change the location of **blobfiles** folder: [Windows](#Windows) - [MacOS](#MacOS) - [GNU/Linux](#Linux)

## Windows {#Windows}

First, make sure the application is completely closed - right-click on application's tray icon and choose the **`Exit`** option from menu or press **`Ctlr-Q`**.
 
### Method 1 (creating the symbolic link only from Command Prompt)
---
1. Open **`Command Prompt`** (keyboard shortcut: **`Windows Key + R`**, enter the text **`cmd`** and press **`Enter`**).
  
2. In the **`Command Prompt`** window enter the below commands:
    
   >**Notes**: 
   >
   >- in our example below change the drive letter **`D`** and **`LBRY_cache`** destination folder name according to your needs;
   >
   >- if your folder path contains spaces or other special characters, you’ll need to enclose it in quotation marks, like **"D:\LBRY Cache"** when you enter the commands.

- if you don't have already created the folder where you want to move the blob files folder, then create it now. In our example this will be placed on drive **`D:`** and named **`LBRYCache`**.

- if you want to preserve the existing downloaded blob files then enter the next command, if not, go the the next one:

  **`xcopy %localappdata%\lbry\lbrynet\blobfiles D:\LBRYCache`** [press Enter]

- this will remove the **`blobfiles`** folder and it's content:
        
  **`rd /S /Q %localappdata%\lbry\lbrynet\blobfiles`** [press Enter].
        
- this will create symblolic link with our desired folder:
        
  **`mklink /J %localappdata%\lbry\lbrynet\blobfiles D:\LBRYCache`** [press Enter]

3. Close the Command Prompt window and open the LBRY application. If you access the new folder created for the blob files, you will see it's contents populated.
  
### Method 2 (creating the symbolic link with a graphical tool) {#GUI}
---
1. Open Windows Explorer (keyboard shortcut **`Windows Key + E`**) or your preferred file manager and create a folder where you want to move the LBRY cached files, if you don't have it already created.

2. First you need to download a small portable application from here: <a href="http://bit.ly/symlinker_executable" target="_blank">Symlink Creator</a>. After download, you need to unpack it.
 
4. In Windows Explorer enter this text in his address bar: 

    **`%localappdata%\lbry\lbrynet`** [press Enter].

5. If you want to preserve the existing downloaded blob files then copy the content of the **`blobfiles`** folder in the destination folder created on step 1, if not, go the the next step.

6. In the list of files and folders displayed select the **`blobfiles`** folder and use the shortcut key **`Shift+Del`** or drag it over **`Recycle Bin`** icon from Desktop while you hold the **`Shift`** key pressed. In this way the blob files folder and it's entire content will be deleted directly.

5. After that, put the cursor again in the address bar of the Windows Explorer, select the entire path and copy it in the Clipboard with shortcut key **`Ctrl+C`** or right-click over the selected text and choose **`Copy`** option from the displayed menu.

6. Now run the **`"Symlink Creator`"** application that you unpacked.
Fill the textboxes following the below instructions:

![Symbolic_Creator.jpg](https://imgsaver.com/images/2020/05/14/Symbolic_Creator.jpg)

- select the type of symbolic link as: **`Folder symbolic link`**
- put the cursor in the textbox named **`Please select the place where you want your link:`** and use the shortcut key **`Ctrl+V`** or right-click and choose **`Paste`** option from menu to bring back the path that you copied from Windows Explorer. In your case, **`User_Name`** will be your Windows user name.
- in the textbox **`Now give a name to the link:`** **YOU MUST** put **`blobfiles`**. This name is mandatory, otherwise the LBRY won't start.
- next choose your destination folder, that you created at step 1, where the cache files will be created after starting the LBRY application.
- and finally for the **`Select the type of link:`** setting, choose the **`Directory Junction`** option and then click on the **`Create Link`** button.

If you respected all the above instructions you'll see a success message, otherwise it will give you an error. You can close the Symlink Creator and start the LBRY application. If you access the new folder created for the blob files, you will see it's contents populated.

---
>**Note:** if you want to revert back to the original LBRY folder settings, you can delete the created symbolic link like you would with any other type of file from Command Prompt or with any file manager. After that, remember to recreate the original **`blobfiles`** folder in the original path of lbry **`%localappdata%\lbry\lbrynet\`**, otherwise the LBRY app won't start.

## MacOS {#MacOS}
1. Make sure the application it's completely closed - right-click on application's icon from Dock and choose **`Quit`** option from menu or press Ctlr-Q.

2. Open the **Terminal** application (Press **`Command+Space`**, type **`Terminal`** and then press **`Enter`** to open **`Terminal`** from Spotlight search or navigate to **`Finder > Applications > Utilities > Terminal`** to launch the **`Terminal`** shortcut or click on the **`Terminal`** app icon from the **`Dock`** menu if it's available.)

3. In the Terminal window enter the below commands:
 
   >**Notes**:
   >- replace **`Volume_Name`** with your mounted volume name and **`LBRY_Cache`** with the your desired folder name in our example below.
   > 
   >- if your destination folder contains spaces or other special characters, you’ll need to enclose it in quotation marks, like **`/volumes/Volume_Name/"LBRY Cache"`** when enter the commands.
 
- if you don't have already created the folder where you want to move the blob files folder, then create it now:
    
    **`mkdir /volumes/Volume_Name/LBRY_Cache`** [press Enter]
        
- if you want to preserve the existing downloaded blob files then enter the next command, if not, go the the next one:

    **`cp ~/Library/"Application Support"/LBRY/blobfiles/*.* /volumes/Volume_Name/LBRY_Cache`** [press Enter]

- this will remove the default **`blobfiles`** folder and it's content:
    
    **`rm -r ~/Library/"Application Support"/LBRY/blobfiles`** [press Enter]

- this will create the symbolic link with our desired folder:
    
    **`ln -s /volumes/Volume_Name/LBRY_Cache ~/Library/"Application Support"/LBRY/blobfiles`** [press Enter]
    
4. Close the **`Terminal`** window and start the LBRY application. If you access the new folder created for the blob files, you will see it's contents populated.

>**Note:** if you want to revert back to the original situation, you can delete the created symbolic link like you would with any other type of file from **`Terminal`** app or any other file manager. After that, remember to recreate the original **`blobfiles`** folder, otherwise the LBRY app won't start.

## Ubuntu / Linux *(Exact steps may differ slightly)* {#Linux}

1. Make sure the application it's completely closed - right-click on application's tray icon and choose the **`Quit`** option from menu or press Ctlr-Q.

2. Open the **`Terminal`** application 

3. In the **`Terminal`** window enter the below commands:
 
   >**Notes**:
   >
   >- in our example below replace **`User_Name`** with your user name, **`Volume_Name`** with your mounted volume name and **`LBRY_Cache`** with your desired folder name;
   >
   >- if your folder path contains spaces or other special characters, you’ll need to enclose it in quotation marks, like **`"/media/User_Name/Volume_Name/LBRY Cache"`** when you enter the commands;
   
   - if you don't have already created the folder where you want to move the blob files folder, then create it now:
    
       **`mkdir /media/User_Name/Volume_Name/LBRY_Cache`** [press Enter]
   
   - if you want to preserve the existing downloaded blob files then enter the next command, if not, go the the next one:

        **`cp .local/share/lbry/lbrynet/blobfiles/*.* /media/User_Name/Volume_Name/LBRY_Cache`** [press Enter]
   
   - this will remove the default **`blobfiles`** folder and it's content:
    
       **`rm -r .local/share/lbry/lbrynet/blobfiles`** [press Enter]
    
   - this will create the symbolic link with the new folder:
    
       **`ln -s /media/User_Name/Volume_Name/LBRY_Cache .local/share/lbry/lbrynet/blobfiles`** [press Enter]
    
4. Close the **`Terminal`** window and start the LBRY application. If you access the new folder created for the blob files, you will see it's contents populated.

>**Note:** if you want to revert back to the original situation, you can delete the created symbolic link like you would with any other type of file from **`Terminal`** app or any other file manager. After that, remember to recreate the original **`blobfiles`** folder, otherwise the LBRY app won't start.
