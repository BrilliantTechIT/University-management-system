<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>المراسلات</title>
    <style>
        @import url('https://fonts.googleapis.com/css?family=Lato');

        * {
            box-sizing: border-box;
        }

        body {
            background: url('https://cdn.pixabay.com/photo/2018/01/14/23/12/nature-3082832_1280.jpg');
            background-size: cover;
            background-position: center center;

            display: flex;
            align-items: center;
            justify-content: center;
            flex-direction: column;

            min-height: 100vh;
            font-family: 'Lato', sans-serif;
            margin: 0 0 50px;
        }

        h2 {
            text-shadow: 1px 1px 2px rgba(0, 0, 0, 1);
            color: #fff;
            letter-spacing: 1px;
            text-transform: uppercase;
            text-align: center;
        }

        .chat-container {
            background-color: rgba(0, 0, 0, 0.4);
            border-radius: 25px;
            box-shadow: 0px 0px 10px 5px rgba(0, 0, 0, 0.7);
            overflow: hidden;
            padding: 15px;
            position: relative;
            width: 320px;
            max-width: 100%;
        }

        .chat {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: flex-start;
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .message {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 50px;
            box-shadow: 0px 15px 5px 0px rgba(0, 0, 0, 0.5);
            position: relative;
            margin-bottom: 30px;
        }

        .message.left {
            padding: 15px 20px 15px 70px;
        }

        .message.right {
            align-self: flex-end;
            padding: 15px 70px 15px 20px;
        }

        .logo {
            border-radius: 50%;
            box-shadow: 0px 10px 10px 0px rgba(0, 0, 0, 0.7);
            object-fit: cover;
            position: absolute;
            left: 10px;
            top: -10px;
            width: 50px;
            height: 50px;
        }

        .message.right .logo {
            left: auto;
            right: 10px;
        }

        .message p {
            margin: 0;
        }

        .text_input {
            font-size: 16px;
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 10px 15px;
            width: 100%;
        }

        footer {
            background-color: #222;
            color: #fff;
            font-size: 14px;
            bottom: 0;
            position: fixed;
            left: 0;
            right: 0;
            text-align: center;
            z-index: 999;
        }

        footer p {
            margin: 10px 0;
        }

        footer i {
            color: red;
        }

        footer a {
            color: #3c97bf;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <h2>دردشه للاتفاقات</h2>
    <div class="chat-container">
        <ul class="chat" id="chatList">
            @foreach ($m as $item)
                {{-- {{dd($item->id_send)}} --}}
                @if ($item->id_send == Auth::id())
                    <li class="message left" style="width: 250px;">
                        <img class="logo" src="users_image/{{ $item->send->image }}" alt="">
                        {{-- <h4 style="color: red;">{{$item->users->name}}</h4> --}}
                        <p style="white-space: pre-line">{{ $item->message }}</p>
                    </li>
                @else
                    <li class="message right" style="width: 250px;">
                        <img class="logo" src="users_image/{{ $item->send->image }}" alt="">
                        <h4 style="color: red;">{{ $item->send->name }}</h4>
                        <p style="white-space: pre-line">{{ $item->message }}</p>
                    </li>
                @endif
            @endforeach


        </ul>
        <input type="text" id="priceInput" class="text_input" placeholder="Message..." />
    </div>
    <br>
    <br>
    <br>
    
    <button onclick="goBack()" >انهاء الجلسة</button>
    <script src="assets/js/lobsocket.io.js"></script>

    <script>
        // var SocketIO = io("node.civilization-unversity.com");
        var SocketIO = io("127.0.0.1:4001");
    </script>
    <script>
        var id = {{ Auth::id() }};
        SocketIO.emit("connected", {
            "id": id,
        });
        document.addEventListener("DOMContentLoaded", function() {
            // Function to be run when the price is entered
            function onPriceEntered(event) {
                // Check if the Enter key is pressed (key code 13)
                if (event.key === "Enter") {
                    // Prevent the default behavior (form submission)
                    event.preventDefault();

                    // Get the value entered in the price input field
                    var enteredmessage = document.getElementById("priceInput").value;

                    // Display the result
                    SocketIO.emit('sendm', {
                        'id':'{{ Auth::id() }}',
                        "name": '{{ Auth::user()->name }}',
                        "im": '{{ Auth::user()->image }}',
                        "m": enteredmessage,
                        't':1,
                        'ordid':{{$orid}}
                    });
                    document.getElementById("priceInput").value = "";

                    // You can perform additional actions here, such as sending the entered price to the server.
                }
            }

            // Add event listener to the price input field
            document.getElementById("priceInput").addEventListener("keydown", onPriceEntered);
        });

        SocketIO.on('getm', function(d) {
            // alert(d.ordid);
            if(d.ordid=={{$orid}})
            {
                var ul = document.getElementById("chatList");
            var li = document.createElement("li");
            if(d.id=={{Auth::id()}})
            {

                li.className = "message left";
                li.style="width: 250px;"
            }
            else
            {
                li.className = "message right";
                li.style="width: 250px;"
                var small = document.createElement("h4");
            small.style.color = "red";
            small.appendChild(document.createTextNode(d.name));
            li.appendChild(small);

            }

            // Create small element with inline style
            

            // Create image element
            var img = document.createElement("img");
            img.className = "logo";
            img.src = "users_image/" + d.im; // Assuming the path to the image is correct
            img.alt = "";
            li.appendChild(img);

            // Create paragraph element
            var p = document.createElement("p");
            p.style="white-space: pre-line";
            p.appendChild(document.createTextNode(d.m));
            
            li.appendChild(p);


            ul.appendChild(li);


            }
           
        });

        function goBack() {
        // Laravel route to handle the back functionality
        history.back();
    }
    </script>


</body>

</html>
