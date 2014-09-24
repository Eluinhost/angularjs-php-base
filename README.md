PHP AngularJS Base
==================

Uses:

- Grunt for building/serving
- SASS/SCSS with Compass for CSS
- AngularJS (Javascript) as clientside
- Silex (PHP) as serverside
- Bower for client dependencies
- Composer for server dependencies

Grunt
-----

`grunt serve` 

Serves a version of the site using NodeJS as the server, will open up the site when completed and will auto reload the
website on CSS/JS/HTML changes to the frontend

Has an option 'env' that sets the backend environment for the API to use (`--env=prod` OR `--env=dev`)

`grunt build`

Builds the website into the web folder. This performs all the optimizations needed for the built copy. (minification, 
concatanation, file revisions, manifest.appcache e.t.c.). The built copy can be found in the web folder.

`grunt test`

Runs all of the JS tests

Clientside
----------

### Dependencies

To install a new dependency we use Bower, the bower.json can be found in the root folder. By default it include the 
following libraries:

- angular - Needed for the AngularJS app
- json3 - Shim for IE
- es5-shim - Shim for IE
- font-awesome - Web icons
- angular-ui-router - Used for state based views in AngularJS

After adding a Bower dependency you can run `grunt wiredep` to add its `main` files to index.html and main.sass

### Folder Structure

The clientside is an AngularJS app and can be found in the `app` folder.

    app/
        api/
            .htaccess
            index.php
        components/
            home/
                home.html
                home.js
                _home.sass
        app.js
        index.html
        main.sass
        robots.txt
       
#### API folder

This folder contains the entry point for the Backend, check out the relevant section for more details

#### Components folder

Each component of the app should have its own folder, the example contains a `home` folder for the homepage which 
contains a view and a controller. Views/images will be copied to the same folder structure when building, all JS/SASS will
not, they will be combined into their own singular files

#### app.js

Main entry point of the AngularJS app

#### index.html

Main view for the AngularJS app, contains wiredep and usemin sections used to compile the SASS/JS into files.

#### main.sass

Main SASS file. Include the fragments of the components.

#### robots.txt

Is copied over directly when being built

Backend
-------

The backend is a very simple Silex app.

The entry point for the application is `app/api/index.php`. The .htaccess in the same folder redirects all requests
to `/api/*` through the index.php.

The index.php contains all of the routes/extensions needed to run the backend.

By default the application only has the config extension which loads config files from the folder `/config/`. It 
determines what environment to use by the environment variable `APP_ENV`. By default it uses `prod` and therefore loads
the file `config/config_prod.yml` file. The command `grunt serve` by default runs as `APP_ENV=dev` but can run as prod
by doing `grunt serve --env=prod`.

The folder `src` is autoloaded by composer for the application namespace. The namespace can be set in composer.json (replace 
Temp\\TempApp with your namespace). Any controllers/services e.t.c. should be set up in this folder.
