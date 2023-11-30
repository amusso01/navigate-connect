# Navigate theme installation and dev block logic

### Prerequisites

You will need Node.js version 11.15.0 installed and active on your machine. You can use n or nvm to switch between node version in case you have a newer or older installation (this is n https://github.com/tj/n)

### Prerequisites

From your project root run:

```
npm install
```

### Config (src/build/config-default.json)

Currently, only the revisioning and local dev server url are configured here.
Change the URL to your local development URL 

### Build the root.css

```
npm run build
```
run this command to build the root css file into the dist folder.
Now you are ready to develop local

### Building

```
npm run start
```
This command will spin up a local server and compile all the assets from the src/assets folder into the dist folder. Keep it running while you developing on local


```
npm run build
```
Again when you are ready to deploy run the build command.

Will minify all the files and remove sourcemaps and copy to the "dist" directory. Images in assets will be optimized. Main.js and Main.css will be asset-hashed for cachebusting if set. Note: Depending on how many images you have it may take a while on first run.

By default revisioning/cachebusting is set to false. If you want it go to `src/build/config-default.json' and set to true.`


## ACF

The theme uses acf-json as true source for custom field remember to to access ACF and sync the field when you start the project first time if this is required.

Also the theme uses a block mechanism to build pages using the custom field BUILDER have a look at this to understand how this works.


