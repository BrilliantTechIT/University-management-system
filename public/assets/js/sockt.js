var id = {{ Auth::id() }};
        //  alert(id);
        var SocketIO = io("http://localhost:3000");

        SocketIO.emit("connected", id);
        //    alert('s');
        function sendevent(form) {
            event.preventDefault();
            var message = prompt("enter massge");
            SocketIO.emit("sendEvent", {
                "myid": "1",
                "userId": form.id.value,
                "message": message,
            });






            // alert('ss');
        }

        function sendevent2() {
            event.preventDefault();
            var m = prompt("enter the message");
            SocketIO.emit('touser', {
                "id": 2,
                "m": m
            });
        }

        SocketIO.on("alls", function(data) {
            alert(data);
        });

        SocketIO.on("postoneuser", function(data) {
            alert(data);
        });




//Task
SocketIO.on("get_task", function(data) {


    const notificationSound = new Audio('/n.mp3'); // Replace with your sound file
    notificationSound.play();

    const ul = document.getElementById("not_list");

    // Create a new <li> element
    const li = document.createElement("li");
    li.className = "mb-2";
    li.innerHTML = `
<a class="dropdown-item border-radius-md" href="javascript:;">
<div class="d-flex py-1">
    <div class="my-auto">
        <img src="../users_image/${data.image}" class="avatar avatar-sm ms-3">
    </div>
    <div class="d-flex flex-column justify-content-center">
        <h6 class="text-sm font-weight-normal mb-1">
            <span class="font-weight-bold">مهمة جديدة</span> ${data.name}
        </h6>
        <p class="text-xs text-secondary mb-0">
            <i class="fa fa-clock me-1"></i>
            ${data.date}
        </p>
    </div>
</div>
</a>
`;

    // Append the <li> to the <ul>
    ul.appendChild(li);

    if ('Notification' in window) {
        // Check if the Notification API is supported by the browser

        Notification.requestPermission().then((permission) => {
            if (permission === 'granted') {
                // Permission to show notifications is granted

                const notification = new Notification(`مهمة جديدة من ${data.send} `, {
                    body: data.name,
                    icon: `/users_image/${data.image}`, // You can specify an icon here
                });

                // Handle notification click event
                notification.onclick = () => {
                    // Code to execute when the user clicks the notification
                    window.open('https://localhost:8000/home.com');
                }
            }
        });
    } else {
        console.log('Notifications not supported in this browser.');
    }
   

});

//end Task
