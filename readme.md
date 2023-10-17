
# The Dumpster Fire Project

The Dumpster Fire Project is a somewhat cutesy (and occasionally filled with vulgar gallows humor) method of rendering the air quality on the web. It's actually part of a larger project I'm considering, where I will be creating a visualization for an extended time period of how the air quality has changed. You can view it at https://classicwfl.com/projects/dumpsterfire/ and read more about the how/why here: https://painpropaganda.com/blog/posts/what-a-dumpster-fire/ 

And because I'm sure someone won't read the link and will complain about it: Yes, the CPU usage is supposed to ramp up high on bad air quality. That's why I didn't use a more efficient particle method. Took a while to dial in the right amount of CPU usage for an average users' PC, but I feel like I hit a good sweet spot there.

Anyway, if you want to duplicate this for yourself, here's what you need to know.

## Using this on your own project

Be sure to run ```composer install``` first to load up the necessary stuff for composer. It's just for something to read .env vars, and an interface for the WAQI API.

You'll need to create a DB for this project, and you can populate it with the following SQL:

```
CREATE TABLE Aqi (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    AQI INT,
    CurrentDateTime DATETIME
);
```

Make sure to clone ```.env.example``` into ```.env``` and populate the necessary vars. I'm using http://waqi.info/ for the AQI value; if you want to use another service you'll need to build a new method for getting the AQI.

I've got it set to not hit the API unless it's been more than an hour since the last time it was hit. Please be kind and don't hammer the free API.

For the front-end, just run ```npm install``` and then ```npm run watch``` while doing dev. No hot reloads, FYI, so be sure to hit refresh yourself. I like to keep things simple. If you just want to build the JS & CSS prod files, run ```npm run build:prod```.

For deployment, be sure to not upload the ```/dev``` or ```/node_modules``` folders, and if you're not able to use .htaccess then either hard-code the vars in your deployment or make sure .env is inaccessible from outside.

Also, strip out the Typekit stuff if you're not using it for fonts (you'll need to have your own project set up to use it FYI).

## License, Rules, and Whatever

After some folks bugged me about it, I finally added a real license: BSD Zero Clause. It's in the license.md file. Basically, do whatever you like, but I'm not liable for damages, failure to pay attention to road signs, food poisoning, etc.