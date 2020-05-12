---
title: How to change location for blob files folder?
category: troubleshooting
---

When you use the application LBRY Desktop on GNU/Linux, MacOS or Windows,  you participate in LBRY protocol which is a peer to peer, decentralized file sharing, by utilizing you hard disk space for storing, among other data, of cached blob files. The folder where these files are stored is named **blobfiles** and the space ocupied by him is growing over time as you use the application.

Until now there is no way to choose the location where should be stored these files, neither before instalation of the application, nor after that in application's settings. The only option available is to choose the download folder for the content that you want to download. Because the application is installed on the operating system partition by default, this can be a problem if your partition is quite small or is located on a SSD drive and you don't want to worn out the drive with too many writes on it (as we know, LBRY acts like a torrent application, especially that now it even support the torrent protocol).

So, the only solution to change the blob files location in this moment is to use a command available in the operating system to redirect a folder to another folder. This redirect is called symbolic link, also known as a symlink or soft link, which is somethink like a shortcut in Windows.

Since each Operating System has its own set of rules, use the below guide according to your situation to change the location of **blobfiles** folder:

### Windows

1.  Make sure the application it's completely closed. (Right-click on application's tray icon and choose **`Exit`**)
    
2. Open command prompt (Keyboard shortcut: Windows Key + R, enter the text **cmd** and hit **Enter**).
  
3. In the command prompt window enter the bellow commands:
    
    - this will remove the **`blobfiles`** folder and it's content:
        
      **`rd /S /Q %localappdata%\lbry\lbrynet\blobfiles`** [hit Enter].
        
    - this will recreate the blobfiles folder which now is redirected to the folder **`LBRYCache`** from drive **`D:`** (change the drive and folder name according to your needs):
        
      **`mklink /J %localappdata%\lbry\lbrynet\blobfiless D:\LBRYCache`** [hit Enter]
        
      (If your folder path contains spaces or other special characters, you’ll need to enclose it in quotation marks, like **"D:\LBRY Cache"** when you enter the junction command and the destination folder must not already exists.)
  
  4. Close the command prompt window and open the LBRY application. If you access the new folder declared for the cache files you will see now thousands of small files populating the folder.
  
  5. If you want to revert back to the original situation, you can delete the created symbolic link like you would any other type of file from command prompt or any file manager. After that, remember to recreate the original **`blobfiles`** folder, otherwise the LBRY app won't start.

### MacOS
1. Make sure the application it's completely closed. (Right-click on application's icon from Dock and choose **`Quit`**)

2. Open the **Terminal** application (Press Command+Space, type “Terminal” and then press “Enter” to open Terminal from Spotlight search or navigate to Finder > Applications > Utilities > Terminal to launch the Terminal shortcut or click on the Terminal icon from the Dock menu if it's available.)

 3. In the terminal window enter the bellow commands:
 
    - this will remove the default **`blobfiles`** folder and it's content:
    
        **`rm -r ~/Library/"Application Support"/LBRY/blobfiles`**
    - this will create the new folder on another volume for the blob files:
    
        **`mkdir /volumes/Volume_Name/LBRY_Cache`**
        
        (replace **`Volume_Name`** with your mounted volume name and **`LBRY_Cache`** with your desired folder name or leave it as it is)
    
    - this will create the symbolic link with the new folder:
    
        **`ln -s /volumes/Volume_Name/LBRY_Cache ~/Library/"Application Support"/LBRY/blobfiles`**
    
        - again, replace **`Volume_Name`** with your mounted volume name and **`LBRY_Cache`** with the same folder name created above;
    
        - if your folder path contains spaces or other special characters, you’ll need to enclose it in quotation marks, like **`"/volumes/Volume_Name/LBRY Cache"`** when you enter the junction command.

4. Close the terminal window and start the LBRY application. If you access the new folder declared for the cache files you will see now thousands of small files populating the folder.

5. If you want to revert back to the original situation, you can delete the created symbolic link like you would any other type of file from terminal or any file manager. After that, remember to recreate the original **`blobfiles`** folder, otherwise the LBRY app won't start.

### Ubuntu / Linux *(Exact steps may differ slightly)*

1. Make sure the application it's completely closed.

2. Open the **Terminal** application 

3. In the terminal window enter the bellow commands:
 
    - this will remove the default **`blobfiles`** folder and it's content:
    
        **`rm -r .local/share/lbry/lbrynet/blobfiles`**
    
    - this will create the new folder on another volume for the blob files:
    
        **`mkdir /media/User_Name/Volume_Name/LBRY_Cache`**
    
        (replace **`User_Name`** with your user name, **`Volume_Name`** with your mounted volume name and **`LBRY_Cache`** with your desired folder name or leave it as it is)
    
    - this will create the symbolic link with the new folder:
    
        **`ln -s /media/User_Name/Volume_Name/LBRY_Cache .local/share/lbry/lbrynet/blobfiles`**
    
        - again, replace **`User_Name`** with your user name, **`Volume_Name`** with your mounted volume name and **`LBRY_Cache`** with the same folder name created above;
    
        - if your folder path contains spaces or other special characters, you’ll need to enclose it in quotation marks, like **`"/media/User_Name/Volume_Name/LBRY Cache"`** when you enter the junction command;
    
4. Close the terminal window and start the LBRY application. If you access the new folder declared for the cache files you will see now thousands of small files populating the folder.

5. If you want to revert back to the original situation, you can delete the created symbolic link like you would any other type of file from terminal or any file manager. After that, remember to recreate the original **`blobfiles`** folder, otherwise the LBRY app won't start.

 ** Last update: 13 May 2020