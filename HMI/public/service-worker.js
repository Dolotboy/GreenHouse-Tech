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
    console.log('Fetch! ', event.request);
  });

