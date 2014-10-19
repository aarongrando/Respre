# Respre

In-browser previewing for static responsive web design comps. No code required. 

Respre works by interpreting the contents of the `preview` directory. `preview` contains a collection of static image comps, each named with their **minimum** resolution (ie. `1024.jpg`), cooresponding to a responsive breakpoint. 

### Getting Started
1. Clone or download this repo. Move the files on to an PHP webserver online or locally. 

2. Replace the boilerplate image files in `preview` with your own static comps. Give each file a numeric filename that corresponds to its target breakpoint. 

3. Visit /index.php in your browser to preview the comps. Adjust your browser's viewport size, or visit the page from a mobile device or tablet, to preview your comps at different resolutions.

There are no restrictions on file formats (any browser-safe formats work), and no restrictions on the number of comps/breakpoints that it will display.

### Good-to-knows
- Your image files do not need to match the resoltion which they are named. For instance, to show a Retina-quality preview at 1024px (`1024.jpg`), your static file should be (_at least_; 1024px is the `min-width`) 2048px wide.
- The boilerplate breakpoints represent specific common devices: 
  - `1.jpg` – All mobile devices smaller than an iPhone 6+
  - `414.jpg` – iPhone 6+
  - `768.jpg` – iPad, portrait
  - `1024.jpg` – iPad, landscape / Small Desktop
  - `1200.jpg` – Average Desktop
  - `1440.jpg` – Large Destop
- This tool relies on PHP's `scandir()` function. Some webservers may disable this. And it requires that your `preview` directory is readable. If you're having problems on a webserver you're not in full control of (ie. shared webhosting), try to CHMOD your `preview` directory to 755. 

#### Troubleshooting
- Web server trouble? Try [MAMP](http://mamp.info/). It's is a dead-simple tool for running a compatible server locally on your machine. Point the Web Server's Document Root at the downloaded `Respre` directory and visit http://localhost:8888/. 
- Some images not showing up? Be sure that none of your images are named for the resolution `0` (ie. `0.jpg`). And make sure the image file names contain only numbers and one extension. Avoid names like `1024.final.png` or `768alt.jpg`. 
