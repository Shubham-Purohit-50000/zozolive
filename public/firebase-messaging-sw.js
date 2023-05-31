// importScripts("https://www.gstatic.com/firebasejs/9.15.0/firebase-app.js");
// importScripts("https://www.gstatic.com/firebasejs/9.15.0/firebase-messaging.js");

firebase.initializeApp({
    apiKey: "AIzaSyCtX1gtpNBi5zm168Qz_KNK41dyaoHfv2s",
    authDomain: "zozo-30c5e.firebaseapp.com",
    projectId: "zozo-30c5e",
    storageBucket: "zozo-30c5e.appspot.com",
    messagingSenderId: "234264622400",
    appId: "1:234264622400:web:cf81849d24201a9f2276a5"
});

console.log('service worker file')
const messaging = firebase.messaging();
messaging.setBackgroundMessageHandler(data =>{
    console.log('data', data);
    var body = JSON.parse(data)
    const notificationOptions = {
        body: body.message,
        // data: {
        //     click_action: click_action,
        // },
    };
    return self.registration.showNotification(body.title, notificationOptions);
});
self.addEventListener("notificationclick", function (event) {
    var action_click = event.notification.data.click_action;
    event.notification.close();
    if(action_click){
        event.waitUntil(clients.openWindow(action_click));
    }
});
