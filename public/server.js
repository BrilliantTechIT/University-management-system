// var express=require("express");
import express from 'express';
import http from 'http';
import { Server as SocketIO } from 'socket.io';
import mysql from 'mysql';
import { async } from 'regenerator-runtime';


var app=express();
const httpServer = http.createServer(app);


const socketIo = new SocketIO(httpServer,{
  cors:{
    origin:"*"
  }
});



var users=[];
socketIo.on("connection",function(socket){
  socket.on("connected",function(userId){
    console.log(userId+":"+socket.id);
    users[userId]=socket.id;
  });

  socket.on("sendEvent",function(data){
    console.log(data.message);
    socketIo.emit("alls",data.message);
  });
  socket.on('postoneuser',function(data){
    console.log("user"+data.id);
    console.log(users[data.id]);

    socketIo.to(users[data.id]).emit("getoneuser",data.m);
  });

  
  
});

httpServer.listen(process.env.PORT||3000,function(){
console.log("server is started")
});


