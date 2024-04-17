# events-site

## Instructions

1. Clone this repo and I suggest to use ddev to create local environment. You could use docksal also or whatever you are using.
2. If you use ddev simply run ddev start and you have everything set up.
3. Simply use drush si --existing-config to have all configs or I added the db dump that I have - note: I created an install profile for this.
4. I used devel_generate to populate with some content for the Event ct. Maybe some fields are not populated!
5. If you use my db dump then you dont need to do anything just clone the repo and start local go in the container in web folder and run: drush sqlc -> source ./dump.sql
6. If you want to config-import then you need to use devel_generate or create manually some content
7. Added another module that I have from some of my previous challenge that include a programmatically created rest endpoint (with and without params)
I thought to include it in this website, to outcase better how I work
8. I didn't used dep injection for time consideration - I wanted to get it done faster. but you can observe that I used it on the fuel_calculator module
Also didn't run phpcs so maybe not all cs is respected.
### Note: the custom rest resources needs you to be authenticated or have the session cookie if you use postman.
Simply retrieve session cookie id+value from browser and paste in Postman or use drush uli to login in site.

## What have been done:
1. custom content type events with necessary fields
2. 2 custom field formatter/widgets and 1 custom field type for the artists
3. one view exposing all fields and exported rest endpoint as asked
4. I understood initally to expose artist json in a rest endpoint so I did it first and left it in the repo.

### Note: I haven't touched anything related to theme or styling for this challenge as it was not asked for something specific.

### note: to enable fuel_calculator module run drush en -y fuel_calculator and read readme.
- I thought to include this module also as it can showcase better how I work/my knowledge.

### Contact: for issues regarding installation/other questions please contact me via email.
