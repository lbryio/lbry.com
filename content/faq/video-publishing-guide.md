---
title: What are the recommended video settings for publishing?
category: publisher
order: 2
---

Even though LBRY does not enforce any file size, resolution, or quality of video content, we still encourage publishers to adhere to web optimized bitrates/sizes to ensure a good overall experience for lbry.tv and app users. LBRY does not currently transcode on upload or when viewing, but we will be offering this option on the publish page in the near future. At the moment, we'd recommend creators compress their raw videos with one of the below methods to ensure a good streaming experience.

See our (Publishing FAQ)[/faq/how-to-publish] for more information about the publishing process.

## Recommended settings and bitrate

We recommend uploading videos at 720P in an MP4 container, with H264 video encoding, and AAC audio with a maximum bitrate of 5Mbps (check file properties to see current rate). It's also helps if the moov atom is at the front of the file - this is sometimes referred to as Fast Start (ffmpeg) or Web Optimized (Handbrake).

If you prefer 1080P, please try to keep the bitrate at or below 8Mbps.

## Instructions for Handbrake

If using Handbrake, we recommended the following settings:

- Preset of Fast 720P30.
- Enable Web optimized.
- Disable Align AV/Start.
- Save as .mp4 extension.

![handbrake](https://spee.ch/7/hb-settings.png)

## Instructions for ffmpeg

If using FFMPEG, we recommend the following parameters, and replace input/output with the appropriate file path:

```
ffmpeg -i input.avi -c:v libx264 -crf 21 -preset faster -pix_fmt yuv420p -maxrate 5000K -bufsize 5000K -vf 'scale=if(gte(iw\,ih)\,min(2560\,iw)\,-2):if(lt(iw\,ih)\,min(2560\,ih)\,-2)' -movflags +faststart -c:a aac -b:a 160k output.mp4
```
