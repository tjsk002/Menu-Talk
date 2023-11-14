package com.java.menu.controller;

import org.springframework.stereotype.Controller;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ResponseBody;

@Controller
public class MenuController {
    @GetMapping("/")
    @ResponseBody
    public String main(){
        return "Hello world";
    }
}