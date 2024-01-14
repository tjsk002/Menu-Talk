package com.java.menu.controller;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;

@Controller
public class MenuController {

    // view file - //localhost:10040/menu/write
    @GetMapping("/menu/write")
   public String MenuWriteForm(){
        System.out.println("90900");
       return "menu/menu-write";
   }

   @PostMapping("/menu/write-process")
   public String MenuWriteProcess(String title, String content){
       System.out.println(title + content);
       return "";
   }
}