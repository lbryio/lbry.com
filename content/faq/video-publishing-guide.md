---
title: What are the recommended video settings for publishing?
category: publisher
order: 2
---

Even though LBRY does not enforce any file size, resolution, or quality of video content, we still encourage publishers to adhere to web optimized bitrates/sizes to ensure a good overall experience for lbry.tv and app users. LBRY does not automatically transcode on upload or when viewing, but an option is available on the LBRY Desktop app to do so during the publish process. If you are publishing on Android or lbry.tv, please follow the manual instructions for Handbrake/ffmpeg below.

See our [Publishing FAQ](/faq/how-to-publish) for more information about the publishing process.

## Recommended settings and bitrate

We recommend uploading videos at 720P in an MP4 container, H264 video encoding, and AAC audio with a maximum bitrate of 5 Mbps (check file properties to see current rate). It's also helps if the moov atom is at the front of the file - this is sometimes referred to as Fast Start (ffmpeg) or Web Optimized (Handbrake). If the content is not compatible or over 5 Mbps, you'll be given a warning on the publish page.

If you prefer 1080P, please try to keep the bitrate at or below 8 Mbps. You'll be given a warning on the publish page, but you can still proceed.

## Automated transcoding in LBRY Desktop {#automatic}

The LBRY Desktop application supports local transcoding of videos during the publish process. This will require ffmpeg (automated process coming later) to be installed and will create a transcoded copy alongside your original file (**_fixed** appended to the filename).
![publish](https://spee.ch/0/publish-page.jpeg)

ffmpeg will automatically be found from your system path or [lbrynet folder](/faq/lbry-directories), or you can also use a custom path.

### Install and configure

The easiest way to configure ffmpeg on Windows/Mac is to [download the executables](https://www.ffmpeg.org/download.html) and copy the bin folder into a new folder called ffmpeg inside your [lbrynet folder](/faq/lbry-directories). The final path to the files would be something like `...lbry/lbrynet/ffmpeg/bin/ffmpeg.exe`. **This path must be exactly followed if you want it to be picked up automatically**, otherwise you will have to choose the path where the ffmpeg.exe is located on the Settings > Advanced Settings page. 

For Linux, the install process typically adds it to your system path. This will allow the application to automatically detect it, but you can also choose your own custom path on the Settings page (will require restart in some cases).

**Known issues:*

- For Windows users, do not use system protected paths like program files/system32 as this may not have appropriate permissions.
- For Mac users, you may need to run the ffmpeg / ffplay from the command line a single time before the app has permission to do so.

![settings](https://spee.ch/4/ffmpeg-settings.jpg)

## Instructions for Handbrake

If using Handbrake, we recommended the following settings:

- Preset of Fast 720P30.
- Enable Web optimized.
- Disable Align A/V Start.
- Save as .mp4 extension.

![handbrake](https://spee.ch/7/hb-settings.png)

## Instructions for ffmpeg

If using FFMPEG, we recommend the following parameters, and replace input/output with the appropriate file path:

```
ffmpeg -i input.avi -c:v libx264 -crf 21 -preset faster -pix_fmt yuv420p -maxrate 5000K -bufsize 5000K -vf 'scale=if(gte(iw\,ih)\,min(1920\,iw)\,-2):if(lt(iw\,ih)\,min(1920\,ih)\,-2)' -movflags +faststart -c:a aac -b:a 160k output.mp4
```
