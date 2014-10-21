<img src="https://raw.githubusercontent.com/aarongrando/Respre/master/respre.png" alt="Respre">
=====

In-browser previewing for static responsive web design comps. No code required. 

Respre works by automatically reading and displaying the contents of its `preview` directory. `preview` contains a collection of static image comps, each named with their **minimum** resolution (ie. `1024.jpg`), corresponding to a responsive breakpoint. 

[See the demo here](http://respre.herokuapp.com/) – adjust your browser's viewport size to preview different static comps.

## Getting Started
1. Clone or download this repo. Move the folder to a PHP webserver, either online or local on your machine. 

2. Replace the boilerplate image files in `preview` with your own static comps. Give each file a numeric filename that corresponds to its target breakpoint. 

3. Visit /index.php in your browser to preview the comps. Adjust your browser's viewport size, or visit the page from a mobile device or tablet, to preview your comps at different resolutions.

There are no restrictions on file formats (any browser-safe formats work), and no restrictions on the number of comps/breakpoints that it will display.

## Good-to-knows
Your image files do not need to match the resoltion which they are named. For instance, to show a Retina-quality preview at 1024px (`1024.jpg`), your static file should be 2048px wide (_at least_; 1024px is the `min-width`).

The boilerplate breakpoints represent specific common devices: 
  - `1.jpg` – All mobile devices smaller than an iPhone 6+
  - `414.jpg` – iPhone 6+
  - `768.jpg` – iPad, portrait
  - `1024.jpg` – iPad, landscape / Small Desktop
  - `1200.jpg` – Average Desktop
  - `1440.jpg` – Large Destop

This tool relies on PHP's `scandir()` function. Some servers may have this function disabled. Also, Respre requires that your `preview` directory is readable. If you're having problems getting the files to appear, try CHMOD-ing your `preview` directory to 755. 

## Troubleshooting
Webserver configuration got you down? Try [MAMP](http://mamp.info/). It's is a dead-simple tool for running a compatible server locally on your machine. Install it and point the Web Server's Document Root at the downloaded `Respre` directory you downloaded. Then visit http://localhost:8888/. 

Some images not showing up? Be sure that none of your images are named for the resolution `0` (ie. `0.jpg`). And make sure the image file names contain only numbers and one extension. Avoid names like `1024.final.png` or `768alt.jpg`. Also, ensure your `preview` directory permissions are configured as world readable (`755` or `rwx r-x r-x`). 

## Contribute
Respre is licensed under the MIT License. See `LICENSE` for details. But, it basically says: go for it. I welcome collaboration, let's work together and make it work better for everyone. 

## Background
I'm Aaron Grando. I'm the Tech Lead at [RTO+P](http://rtop.com); Respre was built with RTO+P's design process firmly in mind. I've also jotted a handful of thoughts on technology on my [personal site](http://gran.do/).
