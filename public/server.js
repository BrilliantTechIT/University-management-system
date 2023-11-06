// var express=require("express");
import express from 'express';
import http from 'http';
import { Server as SocketIO } from 'socket.io';
import mysql from 'mysql';
import { async } from 'regenerator-runtime';


var app = express();
const httpServer = http.createServer(app);


const socketIo = new SocketIO(httpServer, {
  cors: {
    origin: "*"
  }
});



var users = [];
socketIo.on("connection", function (socket) {
  socket.on("connected", function (userId) {
    console.log(userId + ":" + socket.id);
    users[userId] = socket.id;
  });

  socket.on("sendEvent", function (data) {
    console.log(data.message);
    socketIo.emit("alls", data.message);
  });
  socket.on('postoneuser', function (data) {
    console.log("user" + data.id);
    console.log(users[data.id]);

    socketIo.to(users[data.id]).emit("getoneuser", data.m);
  });













  socket.on('send_tesk', function (data) {

    const currentDate = new Date();

    const day = String(currentDate.getDate()).padStart(2, '0');
    const month = String(currentDate.getMonth() + 1).padStart(2, '0'); // Month is 0-based
    const year = currentDate.getFullYear();
    const hours = String(currentDate.getHours()).padStart(2, '0');
    const minutes = String(currentDate.getMinutes()).padStart(2, '0');
    const seconds = String(currentDate.getSeconds()).padStart(2, '0');

    const ampm = hours >= 12 ? 'PM' : 'AM';
    const twelveHourFormat = hours > 12 ? hours - 12 : hours;

    const formattedDateTime = `${day}/${month}/${year} ${twelveHourFormat}:${minutes}:${seconds} ${ampm}`;
    // var one_user = [data.name, data.send, formattedDateTime, data.image];
    console.log(data.list_task_id);

    data.users.forEach((element, index) => {
      socketIo.to(users[element]).emit("get_task", {
        "name": data.name,
        "send": data.send,
        "date": formattedDateTime,
        "image": data.image,
        "id": data.list_task_id[index]
      });

    });

  });


















  socket.on('send_cashmoney', function (data) {
    console.log(data);
    data.users.forEach((element, index) => {


      socket.to(users[element]).emit('get_CashMoney', {
        "money": data.money,
        "omlh": data.omlh,
        "opposite": data.opposite,
        "date": data.date,
        "createBy": data.createBy,
        "id": data.id,
        "image": data.images,
        "sendid": data.sendid,
        "sendname": data.sendname,
        "snderOfaskid": data.snderOfaskid,


      });
    });

  });



  socket.on('return_for_asker_money_cash', function (data) {
    socket.to(users[data.id]).emit('get_result_asker_money_cash', {
      "message": data.message,
      "image": data.image,
      "date": data.date,
      "send": data.send,
    });
    console.log(data);
  });


  socket.on('send_cashstore', function (data) {
    data.users.forEach((element, index) => {


      socket.to(users[element]).emit('get_cashstore', {
        "item": data.item,
        "num": data.num,
        "unite": data.unite,
        "note": data.note,
        "date": data.date,
        "createBy": data.createBy,
        "id": data.id,  
        "images": data.juserimage,
        "sendid": data.sendid,
        "sendname": data.sendname,

      });
    });
    console.log(data);
  });






  socket.on('send_askoff', function (data) {
    data.users.forEach((element, index) => {


      socket.to(users[element]).emit('get_askoff', {
        "from": data.fromDate,
        "to": data.toDate,
        "note": data.note,
        "date": data.date,
        "createBy": data.createBy,
        "id": data.id,  
        "images": data.juserimage,
        "sendid": data.sendid,
        "sendname": data.sendname,

      });
    });
    console.log(data);
  });




  socket.on('send_AskBuy', function (data) {
    data.users.forEach((element, index) => {


      socket.to(users[element]).emit('get_AskBuy', {
        "item": data.item,
        "num": data.num,
        "unite": data.unite,
        "note": data.note,
        "date": data.date,
        "createBy": data.createBy,
        "id": data.id,  
        "images": data.juserimage,
        "sendid": data.sendid,
        "sendname": data.sendname,

      });
    });
    console.log(data);
  });






  socket.on('send_mesages', function (data) {
    data.us.forEach((element, index) => {


      socket.to(users[element]).emit('get_mesages', {
        "sendname": data.sendname,
        "sendimage": data.sendimage,
        "tital": data.tital,
        "message": data.message,
        "type": data.type,
        "date": data.date,
       

      });
    });
    console.log(data);
  });
  



});

httpServer.listen(process.env.PORT || 3000, function () {
  console.log("server is started");
});


