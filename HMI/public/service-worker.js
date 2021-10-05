var urlsToCache = [
  '/',
  'testIndexedDb.js',
  'index.html',
  'JsonContent.json'
];

self.addEventListener('install', (event) => {
  event.waitUntil(
    caches.open('my-cache')
      .then((cache) => {
        return cache.addAll(urlsToCache);
      })
  );
});

self.addEventListener('install', function() {
    console.log('Install!');
  });
  self.addEventListener("activate", event => {
    console.log('Activate!');
  });
  
  self.addEventListener('fetch', function(event) {
    event.respondWith(async function() {
      const cache = await caches.open('my-cache');
      const cachedResponse = await cache.match(event.request);
      const networkResponsePromise = fetch(event.request);
  
      event.waitUntil(async function() {
        const networkResponse = await networkResponsePromise;
        await cache.put(event.request, networkResponse.clone());
      }());
  
      // Returned the cached response if we have one, otherwise return the network response.
      return cachedResponse || networkResponsePromise;
    }());
    //console.log('Fetch! ', event.request);
  });