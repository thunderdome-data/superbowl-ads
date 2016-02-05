# Superbowl Ads

## How to use this
You'll need a tab-separated spreadsheet ***with fields in the following order***
```Timestamp	Year	Company	Ad description	Ad title	Categories	YouTube URL	Category: Animals	Category: Celebrity	Category: Children	Category: Humor	Category: Sex```

Save it in the data directory as `data_YEAR.txt` where YEAR is the current year.

Update `data/make_data.php` to reference the data file you created.

Go into the data directory and run make_data.php. That will probably look something like:
```
cd data
php make_data.php
```

Take the output and add it to line 16 or 17 of `lib/js/superbowl-ads.js` (in that array). You'll know you put it in the right place when you open up index.html (running on your local webserver) and the page doesn't break.

### How to edit the branding

The index.html now includes Denver Post-specific analytics and ads scripts and markup. These are identified in the head and the top of the body, as well as in the footer. This was added so when people view the mobile-friendly version of the database, ads and analytics are present.


## What is this?

A searchable list of Super Bowl ads from 2009-2015.
Live demo (scroll a little ways down): 
http://www.denverpost.com/ci_25020593/take-look-inside-super-bowl-ad-factory

![Super Bowl ads](screenshots/sbads.png)

## Credits

* [Vaughn Hagerty](https://github.com/vhagerty)
* [Joe Murphy](https://github.com/freejoe76)

## Assumptions

* jQuery
* Google visualization API
* handlebars.js


# License

This code is available under the MIT license. For more information, please see the LICENSE file in this repo.
The MIT License (MIT)

Copyright (c) 2014-2016 Digital First Media, The Denver Post

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
SOFTWARE.
