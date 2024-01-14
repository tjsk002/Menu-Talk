package com.java.menu.controller;

import com.java.menu.entity.MenuItems;
import com.java.menu.service.MenuService;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;

@Controller
public class MenuController {
   @Autowired
   private MenuService menuService;
    // view file - //localhost:10040/menu/write
   @GetMapping("/menu/write")
   public String MenuWriteForm(){
        System.out.println("90900");
       return "menu/menu-write";
   }

   @PostMapping("/menu/write-process")
   public String MenuWriteProcess(MenuItems menuItems){
       System.out.println(menuItems.getTitle());
       System.out.println(menuItems.getContent());
       System.out.println(menuItems.getTag());
       System.out.println(menuItems.getCategoryId());
       menuService.write(menuItems);
       return "";
   }
}