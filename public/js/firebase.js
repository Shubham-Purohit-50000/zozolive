// Your web app's Firebase configuration
const firebaseConfig = {
    apiKey: "AIzaSyCtX1gtpNBi5zm168Qz_KNK41dyaoHfv2s",
    authDomain: "zozo-30c5e.firebaseapp.com",
    databaseURL: "https://zozo-30c5e-default-rtdb.firebaseio.com",
    projectId: "zozo-30c5e",
    storageBucket: "zozo-30c5e.appspot.com",
    messagingSenderId: "234264622400",
    appId: "1:234264622400:web:cf81849d24201a9f2276a5"
};


// Initialize Firebase
firebase.initializeApp(firebaseConfig);

// const messaging = firebase.messaging();

// function initFirebaseMessagingRegistration() {
//     messaging
//         .requestPermission()
//         .then(function () {
//             return messaging.getToken();
//         })
//         .then(function (token) {
//             const csrfToken = document.head.querySelector(
//                 "[name=csrf-token][content]"
//             ).content;
//
//             fetch("/update-fcm-token", {
//                 method: "post",
//                 body: JSON.stringify({
//                     token,
//                     _method: "PATCH",
//                 }),
//                 headers: {
//                     "Content-Type": "application/json",
//                     "X-CSRF-Token": csrfToken,
//                 },
//             })
//                 .then((response) => {
//                     return response.text();
//                 })
//                 .then((text) => {
//                     // return console.log(text);
//                 })
//                 .catch((error) => console.error(error));
//             // axios
//             //     .post("/update-fcm-token", {
//             //         _method: "PATCH",
//             //         token,
//             //     })
//             //     .then((res) => {
//             //         //  console.log(data);
//             //     })
//             //     .catch(({ response: { data } }) => {
//             //         console.error(data);
//             //     });
//         })
//         .catch(function (err) {
//             console.log(`Token Error :: ${err}`);
//         });
// }
//
// initFirebaseMessagingRegistration();
// console.log('firebase js file');
// messaging.onMessage(data => {
//     console.log('data from js file', data);
//     var body = JSON.parse(data.body)
//     const notification = new Notification(data.title, {
//         body: body.message,
//     });
//     notification.onclick = () => {
//         window.open(data.click_action);
//     };
// });
