---
title: How to change location for blob files folder?
category: troubleshooting
---

When you use the application LBRY Desktop on GNU/Linux, MacOS or Windows,  you participate in LBRY protocol which is a peer to peer, decentralized file sharing, by utilizing you hard disk space for storing, among other data, of cached blob files. The folder where these files are stored is named **blobfiles** and the space occupied by him is growing over time as you use the application.

Until now there is no way to choose the location where should be stored these files, neither before installation of the application, nor after that in application's settings. The only option available is to choose the download folder for the content that you want to download. Because the application is installed on the operating system partition by default, this can be a problem if your partition is quite small or is located on a SSD drive and you don't want to worn out the drive with too many writes on it (as we know, LBRY acts like a torrent application, especially that now it even support the torrent protocol).

So, the only solution to change the blob files location in this moment is to use a command available in the operating system to redirect a folder to another folder. This redirect is called symbolic link, also known as a symlink or soft link, which is something like a shortcut in Windows.

**Tip**: Periodically, when you want or your free space became too small on drive, you can access this new cache folder created and then delete all it's content, regaining the space occupied by downloaded blob files.

Since each Operating System has its own set of rules, use the below guide according to your situation to change the location of **blobfiles** folder: [Windows](#Windows) - [MacOS](#MacOS) - [GNU/Linux](#Linux)

### Windows {#Windows}

First, make sure the application it's completely closed. (Right-click on application's tray icon and choose the **`Exit`** option from menu.) Then follow the steps from one of the below methods.
 
#### Method 1 (creating the symbolic link only from Command Prompt)
---
**1**. Open **`Command Prompt`** (keyboard shortcut: **`Windows Key + R`**, enter the text **`cmd`** and press **`Enter`**).
  
**2**. In the **`Command Prompt`** window enter the below commands:
    
- this will remove the **`blobfiles`** folder and it's content:
        
  **`rd /S /Q %localappdata%\lbry\lbrynet\blobfiles`** [press Enter].
        
- this will recreate the blobfiles folder which now is redirected to the folder **`LBRYCache`** from drive **`D:`** (change the drive letter and folder name according to your needs):
        
  **`mklink /J %localappdata%\lbry\lbrynet\blobfiles D:\LBRYCache`** [press Enter]
        
  (If your folder path contains spaces or other special characters, you’ll need to enclose it in quotation marks, like **"D:\LBRY Cache"** when you enter the junction command and the destination folder must not already exists.)
  
**3**. Close the command prompt window and open the LBRY application. If you access the new folder declared for the cache files you will see now thousands of small files populating the folder.
  
#### Method 2 (creating the symbolic link with a graphical tool)
---
**1**. Open Windows Explorer (keyboard shortcut **`Windows Key + E`**) or your preferred file manager and create a folder where you want to move the LBRY cached files.

**2**. First you need to download a small portable application from here: <a href="http://bit.ly/symlinker_executable" target="_blank">Symlink Creator</a>. After download, you need to unpack it wherever you want, let's say on Desktop for our example.
 
**3**. In Windows Explorer enter this text in his address bar: **`%localappdata%\lbry\lbrynet`** then press Enter. In the list of files and folders displayed select the **`blobfiles`** folder and use the shortcut key **`Shift+Del`** or drag it over **`Recycle Bin`** icon from Desktop while you hold the **`Shift`** key pressed. In this way the blobfiles folder and it's entire content will be deleted directly.

**4**. After that, put the cursor again in the address bar of the Windows Explorer, select the entire path and copy it in the Clipboard with shortcut key **`Ctrl+C`** or right-click over the selected text and choose **`Copy`** option from the displayed menu.

**5**. Now run the **`"Symlink Creator`"** application that you unpacked (on Desktop in our example).
Fill the textboxes following the below instructions:

![Symbolic_Creator.jpg](https://imgsaver.com/images/2020/05/14/Symbolic_Creator.jpg)

- select the type of symbolic link as: **`Folder symbolic link`**
- put the cursor in the textbox named **`Please select the place where you want your link:`** and use the shortcut key **`Ctrl+V`** or right-click and choose **`Paste`** option from menu to bring back the path that you copied from Windows Explorer. In your case, **`User_Name`** will be your Windows user name.
- in the textbox **`Now give a name to the link`** **YOU MUST** put **`blobfiles`**. This name is mandatory, otherwise the LBRY won't start.
- next choose your destination folder, that you created at step 1, where the cache files will be created after starting the LBRY application.
- and finally for the **`Select the type of link`** setting, choose the **`Directory Junction`** option and then click on the **`Create Link`** button.

If you respected all the above instructions, will be displayed a  message that will confirm the newly created junction, otherwise it will give an error. Now you can close the Symlink Creator and start the LBRY application. If you access the new folder declared for the cache files you will see now thousands of small files populating the folder.

---
**Note**. If you want to revert back to the original LBRY folder settings, you can delete the created symbolic link like you would with any other type of file from Command Prompt or with any file manager. After that, remember to recreate the original **`blobfiles`** folder in the original path of lbry **`%localappdata%\lbry\lbrynet\`**, otherwise the LBRY app won't start.

### MacOS {#MacOS}
**1**. Make sure the application it's completely closed. (Right-click on application's icon from Dock and choose **`Quit`**)

**2**. Open the **Terminal** application (Press **`Command+Space`**, type **`Terminal`** and then press **`Enter`** to open **`Terminal`** from Spotlight search or navigate to **`Finder > Applications > Utilities > Terminal`** to launch the **`Terminal`** shortcut or click on the **`Terminal`** app icon from the **`Dock`** menu if it's available.)

**3**. In the Terminal window enter the below commands:
 
- this will remove the default **`blobfiles`** folder and it's content:
    
    **`rm -r ~/Library/"Application Support"/LBRY/blobfiles`**
- this will create the new folder on another volume for the blob files:
    
    **`mkdir /volumes/Volume_Name/LBRY_Cache`**
        
    (replace **`Volume_Name`** with your mounted volume name and **`LBRY_Cache`** with your desired folder name or leave it as it is)
    
- this will create the symbolic link with the new folder:
    
    **`ln -s /volumes/Volume_Name/LBRY_Cache ~/Library/"Application Support"/LBRY/blobfiles`**
    
- again, replace **`Volume_Name`** with your mounted volume name and **`LBRY_Cache`** with the same folder name created above;
    
- if your folder path contains spaces or other special characters, you’ll need to enclose it in quotation marks, like **`"/volumes/Volume_Name/LBRY Cache"`** when you enter the junction command.

**4**. Close the Terminal window and start the LBRY application. If you access the new folder declared for the cache files you will see now thousands of small files populating the folder.

**5**. If you want to revert back to the original situation, you can delete the created symbolic link like you would with any other type of file from Terminal app or any other file manager. After that, remember to recreate the original **`blobfiles`** folder, otherwise the LBRY app won't start.

### Ubuntu / Linux *(Exact steps may differ slightly)* {#Linux}

**1**. Make sure the application it's completely closed.

**2**. Open the **Terminal** application 

**3**. In the terminal window enter the below commands:
 
   - this will remove the default **`blobfiles`** folder and it's content:
    
       **`rm -r .local/share/lbry/lbrynet/blobfiles`**
    
   - this will create the new folder on another volume for the blob files:
    
       **`mkdir /media/User_Name/Volume_Name/LBRY_Cache`**
    
       (replace **`User_Name`** with your user name, **`Volume_Name`** with your mounted volume name and **`LBRY_Cache`** with your desired folder name or leave it as it is)
    
   - this will create the symbolic link with the new folder:
    
       **`ln -s /media/User_Name/Volume_Name/LBRY_Cache .local/share/lbry/lbrynet/blobfiles`**
    
        - again, replace **`User_Name`** with your user name, **`Volume_Name`** with your mounted volume name and **`LBRY_Cache`** with the same folder name created above;
    
        - if your folder path contains spaces or other special characters, you’ll need to enclose it in quotation marks, like **`"/media/User_Name/Volume_Name/LBRY Cache"`** when you enter the junction command;
    
**4**. Close the terminal window and start the LBRY application. If you access the new folder declared for the cache files you will see now thousands of small files populating the folder.

**5**. If you want to revert back to the original situation, you can delete the created symbolic link like you would with any other type of file from **`Terminal`** app or any other file manager. After that, remember to recreate the original **`blobfiles`** folder, otherwise the LBRY app won't start.

 ** Last update: 13 May 2020
