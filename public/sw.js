const preLoad = function () {
    return caches.open("offline").then(function (cache) {
        // caching index and important routes
        return cache.addAll(filesToCache);
    });
};

self.addEventListener("install", function (event) {
    event.waitUntil(preLoad());
});

const filesToCache = [
    '/',
    '/login',
    '/dashboard-page',
    '/users-page',
    '/profile-page',
    '/file-manager-page',
    '/offline.html',
    '/manifest.json',
    'dist/js/app.js',
    'dist/css/app.css',
    'dist/css/style.css',
    'dist/css/bootstrap.css',
    'dist/css/responsive.css',
    'dist/images/spd_logo.png',
    'dist/images/files.png',
    'dist/images/mbkm.png',
    'dist/images/right-arrow.png',
    'dist/images/tracer2.png',
    'dist/js/jquery-3.4.1.min.js',
    'dist/js/bootstrap.js',
    'dist/images/serkom.svg',
    'dist/images/hero-bg.png'
];

const checkResponse = function (request) {
    return new Promise(function (fulfill, reject) {
        fetch(request).then(function (response) {
            if (response.status !== 404) {
                fulfill(response);
            } else {
                reject();
            }
        }, reject);
    });
};

const addToCache = function (request) {
    return caches.open("offline").then(function (cache) {
        return fetch(request).then(function (response) {
            return cache.put(request, response);
        });
    });
};

const returnFromCache = function (request) {
    return caches.open("offline").then(function (cache) {
        return cache.match(request).then(function (matching) {
            if (!matching || matching.status === 404) {
                return cache.match("offline.html");
            } else {
                return matching;
            }
        });
    });
};

self.addEventListener("fetch", function (event) {
    event.respondWith(checkResponse(event.request).catch(function () {
        return returnFromCache(event.request);
    }));
    if(!event.request.url.startsWith('http')){
        event.waitUntil(addToCache(event.request));
    }
});
