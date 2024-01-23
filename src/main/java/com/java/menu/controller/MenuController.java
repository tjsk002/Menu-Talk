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
   public String menuWriteForm(){
        System.out.println("90900");
       return "menu/menu-write";
   }

   @PostMapping("/menu/write-process")
   public String menuWriteProcess(MenuItems menuItems) throws Exception {
       menuService.write(menuItems);
       return "menu/menu-complete";
   }

   // GetMapping - endpoint
   @GetMapping("/menu/list")
   public String menuList(){
        return "menu/menu-list"; //uri
   }
}