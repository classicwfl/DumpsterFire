
# The Dumpster Fire Project

The Dumpster Fire Project is a somewhat cutesy (and occasionally filled with vulgar gallows humor) method of rendering the air quality on the web. It's actually part of a larger project I'm considering, where I will be creating a visualization for an extended time period of how the air quality has changed.

Anyway, if you want to duplicate this for yourself, here's what you need to know.

## Using this on your own project

Be sure to run ```composer install``` first to load up the necessary stuff for composer. It's just for something to read .env vars, and an interface for the WAQI API.

You'll need to create a DB for this project, and you can populate it with the following SQL:

```
CREATE TABLE Aqi (
    ID INT PRIMARY KEY AUTO_INCREMENT,
    AQI INT,
    CurrentDateTime DATETIME DEFAULT CURRENT_TIMESTAMP
);
```

Make sure to clone ```.env.example``` into ```.env``` and populate the necessary vars. I'm using http://waqi.info/ for the AQI value; if you want to use another service you'll need to build a new method for getting the AQI.

I've got it set to not hit the API unless it's been more than an hour since the last time it was hit. Please be kind and don't hammer the free API.

For the front-end, just run ```npm install``` and then ```npm run watch``` while doing dev. No hot reloads, FYI, so be sure to hit refresh yourself. I like to keep things simple. If you just want to build the JS & CSS prod files, run ```npm run build:prod```.

Finally, please don't use my Adobe Typekit kit in your version. Get your own fonts :D 

## License, Rules, and Whatever

I'm not attaching any sort of license here; feel free to do whatever you like with it. There's nothing exciting here code-wise, just some clean, simple fun.